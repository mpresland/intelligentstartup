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
               
                <label for="regionSelected">Choose your region</label>
                <select v-model="regionSelected" name="region" id="region">
                    <option v-for="(region, index) in regions" :key="index" :value="region.id">{{region.region}} {{region.state}}</option>
                </select> <br>
                <label for="occupation1">Choose types of people you need</label>
                <select v-model="occupation1" name="occupation1" id="occupation1">
                    <option v-for="(occupation, index) in occupations" :key="index" :value="occupation.id">{{occupation.occupation}}</option>
                </select><p>How many?</p><input v-model="occupation1qty" type="number"> <br>
                <label for="occupation2">Choose types of people you need</label>
                <select v-model="occupation2" name="occupation2" id="occupation2">
                    <option v-for="(occupation, index) in occupations" :key="index" :value="occupation.id">{{occupation.occupation}}</option>
                </select><p>How many?</p><input v-model="occupation2qty" type="number">  <br>
                <label for="occupation3">Choose types of people you need</label>
                <select v-model="occupation3" name="occupation3" id="occupation3">
                    <option v-for="(occupation, index) in occupations" :key="index" :value="occupation.id">{{occupation.occupation}}</option>
                </select><p>How many?</p><input v-model="occupation3qty" type="number">  <br>
            </form>
            <button @click="getResults">Compare locations</button>
            
        </div>
    </div>
    <div class="row result_row">
        <div class="col-12">
            <h1 v-html="searchJSON"></h1>
        </div>
        <div class="col-12 result" v-for="(result, index) in results" :key="index">
            <p>{{index}} : {{result}}</p>
            <h3>{{index}}</h3>
            <p class="score">Wage Score: {{result.wage_score}}/100</p>
            <p class="score">Property Score: {{result.property_score}}/100</p>
            
        </div>
    </div>
    <div v-html="results"></div>

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