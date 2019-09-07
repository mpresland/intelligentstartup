<template>
<div class="landing_container container">
    <div class="row">
        <div class="col-12 title_block">
             <h1 class='home_title'>StartLink</h1>
             <p class='subtitle'>Before we get started, who are you?</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 button_block">
            <a href="#" class="start_link">Person</a>
            <a href="#" class="start_link">Startup</a>
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
    justify-content: center;
    align-items: center;
    align-content: center;
    text-align: center;
}
.row{
    width: 100%;
}
.title_block{
    padding-bottom: 100px;
}
 .home_title{
     font-family: 'oxanium';
     font-size: 4rem;
 }
 .subtitle{
     text-align: center;
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
    name: 'home'
}
</script>