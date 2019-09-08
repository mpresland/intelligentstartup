<?php

namespace App\Http\Controllers\Api;

use App\Region;
use App\Occupation;
use App\NeisEnterprise;
use App\MedianHousePrice;
use App\IncomeByOccupation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $json = json_decode($request->getContent());

        $region = Region::findOrFail($json->region->id);

        $occupations = [];
        foreach ($json->occupations as $occupationData) {
            $occupation = Occupation::findOrFail($occupationData->id);
            $occupation->quantity = $occupationData->quantity;
            $occupations[] = $occupation;
        }

        $incomeByOccupations = [];
        foreach ($occupations as $occupation) {
            $incomeData = IncomeByOccupation::where('occupation', $occupation->occupation)->get();
            foreach ($incomeData as $income) {
                $income->quantity = $occupation->quantity;
                $incomeByOccupations[] = $income;
            }
        }

        // NEIS Stats
        $neisStats = NeisEnterprise::all();

        // property prices
        $housePrices = MedianHousePrice::where('date', 'Mar-2019')->first();

        $states = Region::select('state')->distinct()->get();

        $searchData = [];

        $wagesByState = [];
        foreach ($states as $state) {
            $stateData = [];

            /**
             * Wages
             */
            $totalWages = 0;

            $stateOccupations = array_filter($incomeByOccupations, function ($occ) use ($state) {
                return $occ->state == $state->state;
            });

            $occupationWages = [];
            foreach ($stateOccupations as $stateOccupation) {
                $occupationWages['occupation'] = $stateOccupation->occupation;
                $occupationWages['individual'] = (int) $stateOccupation->median_total_income * 1000;
                $occupationWages['quantity'] = $stateOccupation->quantity;
                $occupationWages['total'] = $stateOccupation->quantity * (int) $stateOccupation->median_total_income * 1000;
                $totalWages += $occupationWages['total'];
                $stateData['wages'][] = $occupationWages;
            }
            $stateData['state_total_wages'] = $totalWages;

            /**
             * NEIS Success
             */

            $stateNeisStats = array_filter($neisStats->all(), function ($neis) use ($state) {
                return $neis->state == $state->state;
            });

            $stateJSONStats = [];
            foreach ($stateNeisStats as $neis) {
                $neisStat = [];
                if (strpos($neis->region, '_metro')) {
                    $neisStat['region'] = $state->state.' Metro Areas';
                } else {
                    $neisStat['region'] = $state->state.' All Areas';
                }
                $neisStat['enterprises'] = (int) $neis->enterprises;
                $neisStat['success_rate'] = round($neis->successes / $neis->enterprises, 2) * 100;
                $stateData['neis'][] = $neisStat;
            }


            /**
             * House price
             */
            $stateProperty = [];
            switch ($state->state) {
                case 'QLD':
                    $stateProperty['metro'] = $housePrices->median_price_brisbane * 1000;
                    $stateProperty['all'] = $housePrices->median_price_qld * 1000;
                    break;
                case 'NSW':
                    $stateProperty['metro'] = $housePrices->median_price_sydney * 1000;
                    $stateProperty['all'] = $housePrices->median_price_nsw * 1000;
                    break;
                case 'VIC':
                    $stateProperty['metro'] = $housePrices->median_price_melbourne * 1000;
                    $stateProperty['all'] = $housePrices->median_price_vic * 1000;
                    break;
                case 'TAS':
                    $stateProperty['metro'] = $housePrices->median_price_hobart * 1000;
                    $stateProperty['all'] = $housePrices->median_price_tas * 1000;
                    break;
                case 'SA':
                    $stateProperty['metro'] = $housePrices->median_price_adelaide * 1000;
                    $stateProperty['all'] = $housePrices->median_price_sa * 1000;
                    break;
                case 'WA':
                    $stateProperty['metro'] = $housePrices->median_price_perth * 1000;
                    $stateProperty['all'] = $housePrices->median_price_wa * 1000;
                    break;
                case 'NT':
                    $stateProperty['metro'] = $housePrices->median_price_darwin * 1000;
                    $stateProperty['all'] = $housePrices->median_price_nt * 1000;
                    break;
                case 'ACT':
                    $stateProperty['metro'] = $housePrices->median_price_canberra * 1000;
                    $stateProperty['all'] = $housePrices->median_price_canberra * 1000;
            }
            $stateData['property'] = $stateProperty;



            $searchData[$state->state] = $stateData;
        }

        /**
         * Calculate wage, property and neis scores
         */

        $bestWages = null;
        $bestProperty = null;

        // find best value wages and property
        foreach ($searchData as $state => $stateData) {
            if (is_null($bestWages) || ($stateData['state_total_wages'] < $bestWages)) {
                $bestWages = $stateData['state_total_wages'];
            }

            if (is_null($bestProperty) || ($stateData['property']['metro'] < $bestProperty)) {
                $bestProperty = $stateData['property']['metro'];
            }
        }

        // calculate state scores
        foreach ($searchData as $state => $stateData) {
            // calculate wage score
            $searchData[$state]['wage_score'] = round(round($bestWages / $stateData['state_total_wages'], 2) * 100);

            // calculate property score
            $searchData[$state]['property_score'] = round(round($bestProperty / $stateData['property']['metro'], 2) * 100);
        }

        usort($searchData, function ($a, $b) {
            return ($a['wage_score'] + $a['property_score']) <=> ($b['wage_score'] + $b['property_score']);
        });



        return json_encode($searchData);
    }
}
