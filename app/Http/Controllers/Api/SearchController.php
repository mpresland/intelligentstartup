<?php

namespace App\Http\Controllers\Api;

use App\Region;
use App\Occupation;
use App\NeisEnterprise;
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
                $stateData['wages'] = $occupationWages;
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
                $neisStat['enterprises'] = $neis->enterprises;
                $neisStat['success_rate'] = round($neis->successes / $neis->enterprises, 2) * 100;
                $stateData['neis'][] = $neisStat;
            }

            $searchData[$state->state] = $stateData;
        }

        return json_encode($searchData);
    }
}
