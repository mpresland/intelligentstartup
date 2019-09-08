<template>
<div class="landing_container container">
    <div class="row blue_row">
        <div class="col-12 title_block">
            <img src="img/ChainLinksWhite.png" alt="" class="logo_img">
             <h1 class='home_title'>Start<span class="blue">Link</span></h1>
        </div>
    </div>
    <div class="row form_row">
        <div class="col-12">
            <form action="" method="post">
                <label for="region">Choose your region</label>
                <select name="region" id="region">
                    <option v-for="(region, index) in regions" :key="index" :value="region.region+'_'+region.state">{{region.region}} {{region.state}}</option>
                </select> <br>
                <label for="occupations">Choose types of people you need</label>
                <select name="occupations" id="occupations" multiple>
                    <option v-for="(occupation, index) in occupations" :key="index" :value="occupation.occupation">{{occupation.occupation}}</option>
                </select> <br>
                <input type="submit" value="Search" name="submit">
            </form>
            
        </div>
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
.blue_row{
      border-bottom-left-radius: 50% 20%;
  border-bottom-right-radius: 50% 20%;
  background-color: #252e59;
  display: flex;
  justify-content: center;
  align-content: center;
  align-items: center;
  padding-top: 10px;
}
.form_row{
    padding: 50px 0px;
}
.row{
    width: 100%;
}
.logo_img{
    width: 5vw;
    height: auto;
    max-width: 200px;
}
.title_block{
    padding-bottom: 100px;
    display: flex;
    flex-direction: row;
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
    name: 'results'
}
</script>