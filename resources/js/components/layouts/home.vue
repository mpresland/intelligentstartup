<template>
<div class="landing_container container">
    <div class="row home_blue_row">
        <div class="col-12 home_title_block">
            <img src="img/ChainLinksWhite.png" alt="" class="logo_img">
             <h1 class='home_title'>Start<span class="blue">Link</span></h1>
             <p class='subtitle'>Find the best locations to build your startup</p>
        </div>
    </div>
    <div class="row form_row">
        <div class="col-12">
            <form action="" method="post">
               
                <label for="regionSelected">Where are you? </label>
                <select v-model="regionSelected" name="region" id="region">
                    <option v-for="(region, index) in regions" :key="index" :value="region.id">{{region.region}} {{region.state}}</option>
                </select> <br>
                <label for="occupation1">Choose types of people you need</label>
                <select v-model="occupation1" name="occupation1" id="occupation1">
                    <option v-for="(occupation, index) in occupations" :key="index" :value="occupation.id">{{occupation.occupation}}</option>
                </select><p>How many do you need? <input v-model="occupation1qty" type="number"></p><br>
                <label for="occupation2">Choose types of people you need</label>
                <select v-model="occupation2" name="occupation2" id="occupation2">
                    <option v-for="(occupation, index) in occupations" :key="index" :value="occupation.id">{{occupation.occupation}}</option>
                </select><p>How many do you need?<input v-model="occupation2qty" type="number"></p><br>
                <label for="occupation3">Choose types of people you need</label>
                <select v-model="occupation3" name="occupation3" id="occupation3">
                    <option v-for="(occupation, index) in occupations" :key="index" :value="occupation.id">{{occupation.occupation}}</option>
                </select><p>How many do you need?<input v-model="occupation3qty" type="number"></p><br>
            </form>
            <button @click="getResults">Compare locations</button>
            
        </div>
    </div>
    <div class="row result_row">
        <div class="col-12 result" v-for="(result, index) in results" :key="index">
            <h3>{{result.state}}</h3>
            <p class="score">Wage Score: {{result.wage_score}}/100</p>
            <p class="score">Property Score: {{result.property_score}}/100</p>
            <h4>Salary Averages</h4>
            <table>
                <tr>
                    <th>Occupation</th>
                    <th>Avg. Salary</th>
                    <th>Quantity</th>
                    <th>Estimated Cost</th>
                </tr>
                <tr v-for="(wage, index) in result.wages" :key="index">
                    <td>{{wage.occupation}}</td>
                    <td>${{wage.individual}}</td>
                    <td>{{wage.quantity}}</td>
                    <td>${{wage.total}}</td>
                </tr>
            </table>
            <p>Total Salary Cost: ${{result.state_total_wages}}</p>
            <h4>NEIS Summary</h4>
            <table>
                <tr>
                    <th>Area</th>
                    <th>Number of NEIS Businesses</th>
                    <th>NEIS Sucess Rate (%)</th>
                </tr>
                <tr v-for="(area, index) in result.neis" :key="index">
                    <td>{{area.region}}</td>
                    <td>{{area.enterprises}}</td>
                    <td>{{area.success_rate}}</td>
                </tr>
            </table>
            <h4>House Price Averages</h4>
            <p>Metro: ${{result.property.metro}}</p>
            <p>All: ${{result.property.all}}</p>
        </div>
        <div class="row">
            <div class="col-12">
                <h4>Our Recommendation</h4>
                <p>With all of these factors considered, our favourite location for launching a startup is Launceston TAS. This is because there is access to free coworking office space for startups called Enterprize, some of the lowest commute times in the country, world class natural tourist attractions within 20 minutes of the CBD and friendly locals. Launceston is also where this project was made! Check out <a target="_blank" href="https://enterprize.space">Enterprize</a> for more information on the coworking space, and the <a target="_blank" href="https://vandiemenproject.com.au/">Van Diemen Project</a> for free business support and advice in the heart of the Launceston CBD. If you're considering moving to Launceston, take a look at the <a href="https://www.launceston.tas.gov.au/Home" target="_blank">Launceston City Council website </a> for more information </p>
            </div>
        </div>
    </div>
    <div class="row data_row">
        <h2>Datasets used</h2>
        <p><a target="_blank" href="https://data.gov.au/dataset/ds-dga-932648b1-7ca1-46c4-99ba-d9a41f98d42f/details?q=NEIS">New Business Assistance with NEIS data
</a></p>
<p>
    <a target="_blank" href="https://data.gov.au/data/dataset/taxation-statistics-2016-17/resource/7c206d6a-b113-40dd-8580-3e097710a907?inner_span=True">ATO Taxation Statistics 2016-17</a>
</p>
<p>
    <a href="http://lmip.gov.au/default.aspx?LMIP/EmploymentRegion/TAS/HobartandSouthernTasmania" target="_blank">Labor Market Information Portal</a>
</p>
    </div>
</div>

</template>
<style>
/* light_blue: #25a9e0 */
/* dark: #252e59; */
/* General */ 
.landing_container{
    height: 100vh;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: stretch;
    align-items: center;
    align-content: center;
    text-align: center;
    margin: 0px;
    max-width: 100vw;
    padding: 0px;
}
.home_blue_row{
    min-height: 50vh;
      border-bottom-left-radius: 50% 20%;
  border-bottom-right-radius: 50% 20%;
  background-color: #252e59;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-content: center;
  align-items: center;
  padding-top: 100px;
}
.form_row{
    padding: 50px 0px;
}
.row{
    width: 100%;
}
.result{
    padding: 100px 0px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    align-content: center;
}
.result table{
    margin-bottom: 10px;
}
.result td{
    padding: 10px;
}
.logo_img{
    width: 50vw;
    height: auto;
    max-width: 200px;
}
.home_title_block{
    padding-bottom: 100px;
    flex-direction: column;
}
 .home_title{
     font-family: 'oxanium';
     font-size: 4rem;
     color: white;
 }
 .blue{
     color: #25a9e0;
 }
 .subtitle{
     text-align: center;
     color: white;
     opacity: .8;
 }
 .button_block{
     padding: 20px;
     display: flex;
     flex-direction: row;
     justify-content: center;
     align-items: center;
     align-content: center;
 }
 .start_link{
     text-align: center;
     background-color: #252e59;
     color: white;
     padding: 10px 40px;
     transition-duration: .2s;
     cursor: pointer;
     margin: 20px;
 }
 .start_link{
     color: white;
 }
 .start_link:hover{
     background-color: #25a9e0;
     color: white;
 }
 .start_link:hover{
     text-decoration: none;
 }
/* Mobile */
@media screen and (max-width: 600px){
 
}
/* Tablet */
@media screen and (min-width:600px) and (max-width: 960px){
 
}
/* Laptop */
@media screen and (min-width: 960px) and (max-width: 1264px){
 
}
/* Large Screens */
@media screen and (min-width: 1264px){
 
}
</style>
<script>
export default {
    name: 'home',
    data(){
        return{
    regions:[],
    occupations:[],
    testinput:'',
    regionSelected:'',
    occupation1:'',
    occupation1qty:'',
    occupation2:'',
    occupation2qty:'',
    occupation3:'',
    occupation3qty:'',
    searchdata:{},
    searchJSON:'',
    results:[]
    }},
    mounted(){
axios.all([
  axios.get('api/regions'),
  axios.get('api/occupations')
])
.then(responseArr => {
  this.regions = responseArr[0].data.data,
  this.occupations = responseArr[1].data.data
});
    },
    methods:{
        getResults: function(){
            this.searchdata ={
        "region":{
            "id": this.regionSelected
        },
        "occupations":[
            {
                "id": this.occupation1,
                "quantity": this.occupation1qty
            },
            {
                "id": this.occupation2,
                "quantity": this.occupation2qty
            },
            {
                "id": this.occupation3,
                "quantity": this.occupation3qty
            }
        ]
    }
        this.searchJSON = JSON.stringify(this.searchdata);
           axios.post('api/search', this.searchJSON, {headers: {'Accept': 'application/json'}})
        .then(response =>(
            this.results = response.data
        ))
        .catch(function (error) {
            console.log(error);
    });
        } 
    }

}
</script>