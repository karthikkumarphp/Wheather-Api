<?php
require 'header.php';
?>
  <div id="app">

<v-app v-cloak>
  <v-toolbar dark height="40" fixed class="black">
    <v-toolbar-title><h1>Weather</h1></v-toolbar-title>

  </v-toolbar>
  
  <br>
<v-content>
  <v-container grid-list-lg xs15 >
    <v-layout row wrap>

    <v-flex sm6 xs15 >
       <v-card  id='content'  flat >
        <span>
          <v-card-title   class="display-2"><v-icon dark large>location_on</v-icon>{{name}}</v-card-title>
          <v-card-title class="headline">India</v-card-title>
          <v-card-title class="headline"> {{ month }}  &nbsp; {{date}}    &nbsp;   {{time}}</v-card-title> 
          <v-card-title> <h1>  <i  class="material-icons">cloud</i>   {{ desc}}</h1></v-card-title>.
          <v-card-title> <h2><i class="material-icons">arrow_upward</i>{{temp_max }}<sup>o</sup></h2> &nbsp; 
          <h2><i class="material-icons">arrow_downward</i>{{temp_min }}<sup>o</sup></h2>
                    
             </v-card-title>
                 <v-card-title>
                    <span id="temp">
                      {{temp}}
                    </span>
                      <sup style="font-size: 40px" >O</sup>
                      &nbsp;&nbsp;
                     <div  style="font-size: 30px">
                     <span><a :class="colorF" :disabled="disabledF" @click="changeCtoF('F')">F</a></span>
                      <br>
                      <span ><a :class="colorC" :disabled="disabledC"  @click="changeCtoF('C')">C</a></span>
                    </div>
              </v-card-title>
      </span>
        </v-card>
        </v-flex>
         <v-flex sm6 >
        <v-card dark id='content' >
          <v-card-title><h2>Details</h2>
          </v-card-title>
          <v-divider class="white"></v-divider>
          <center> <span v-html="wetIcon"></span>
          </center>
                <v-spacer></v-spacer>
          <v-card-text>  Feels like <span class="right">{{temp_max }}<sup>o</sup></span></v-card-text>
          <v-divider></v-divider>
         <v-card-text>  Humidity <span class="right">{{humidity}}</span></v-card-text>
          <v-divider></v-divider>
            <v-card-text>  Visibility <span class="right">{{visibility/1000}} Km</span></v-card-text>
          <v-divider></v-divider>
           <v-card-text>  UV Index <span class="right">4 (Moderate)</span></v-card-text>
              <v-divider></v-divider>
          <v-card-text >Today - {{desc}} with a high of 80 <sup>o</sup>F (26.7 <sup>o</sup> C) and a 25% chance of precipitation. Winds SSE at 7 to 9 mph (11.3 to 14.5 kph).
            <br>
            <br>
        Tonight - Cloudy with a 50% chance of precipitation. Winds variable at 2 to 7 mph (3.2 to 11.3 kph). The overnight low will be 68 <sup>o</sup>F (20.0 <sup>o</sup>C).</v-card-text>
        <br>
        </v-card>
      </v-flex>
  </v-layout>
   <v-layout row wrap>
    <v-flex sm6 >
       <v-card  id='content'  flat >
          <v-card-text>
            <img style="position: absolute" src="https://s.yimg.com/os/weather/1.0.1/windmill/bigpole@2x.png">
            <img id="wind" src="https://s.yimg.com/os/weather/1.0.1/windmill/blade_big@2x.png">
        
            <v-card-text style="position: relative;margin-left: 30px">Wind <span class="right">{{wind_speed }} mph SE </span>
            </v-card-text>
            <v-divider></v-divider>
            <v-card-text style="position: relative;margin-left: 30px">  deg <span class="right">{{wind_deg }}
            </v-card-text>
     </v-card-text>
   </v-card>
   <br>
           <v-card  id='content'  flat >
          <v-card-text>
             <br>
             <span><img src="http://icons.iconarchive.com/icons/icons-land/weather/256/Sunrise-icon.png" height="50px"></span> <span class="right"><img src="https://i0.wp.com/kabiza.com/kabiza-wilderness-safaris/wp-content/uploads/2016/04/sunset-islands.png?resize=254%2C191" height="50px"></span>
             <v-progress-linear

        :value="sunSetRiseValue"
        height="40"
        color="orange">  </v-progress-linear>
      <span>Sun Rise({{sunrise}})</span> 
       <span class="right">Sun Set({{sunset}})</span>
     </v-card-text>
   </v-card>
      </v-flex>
       <v-flex sm6  class="hidden-sm-and-down">
        <v-card  id='content' flat >
          <v-card-media>
            <center>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63687.285678387976!2d77.55706301179612!3d12.975188148708979!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1670c9b44e6d%3A0xf8dfc3e8517e4fe0!2sBengaluru%2C+Karnataka!5e1!3m2!1sen!2sin!4v1521175517508" width="600" height="350" frameborder="0" style="border:1" allowfullscreen></iframe>
          </center>
          </v-card-media>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>

</v-layout>
</v-container>
</v-content>
</v-app>
  </div>
  <script>
    var vm=new Vue({
      el:"#app",
      data:({
        // -- Declare:  Declare all variable here
        clouds:'',
        humidity:'',
        pressure:'',
        temp:'',
        temp_max:'',
        temp_min:'',
        name:'',
        desc:'',
        main:'',
        wind_deg:'',
        wind_speed:'',
        country:'',
        sunrise:'',
        sunset:'',
        time:'',
        date:'',
        month:'',
        visibility:'',
        wetIcon:'',
        sunSetRiseValue:0,
        disabledF:true,
        disabledC:false,
        colorF:"white--text",
        colorC:"grey--text"
      }),
      // mounted function : its same as Constructor
      mounted(){
    
        // time,date,month: declare and use date and time

        var month= ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December" ]
        var today = new Date(); 
        this.date=today.getDate()
        this.month= month[today.getMonth()]
        var amOrPm=today.getHours()>12 ? "PM" : "Am"
        var time = today.getHours()-12 + ":" + today.getMinutes()+" " +amOrPm
        this.time= time

        // api : get json data from openweathermap api

        axios.get(`http://openweathermap.org/data/2.5/weather?q=bangalore&appid=b6907d289e10d714a6e88b30761fae22`)
              .then(response => {
                this.clouds=response.data.clouds
                this.humidity=response.data.main.humidity
                this.pressure=response.data.main.pressure
                this.temp=response.data.main.temp
                this.temp_max=response.data.main.temp_max
                this.temp_min=response.data.main.temp_min
                this.name=response.data.name
                this.wind_deg=response.data.wind.deg
                this.wind_speed=response.data.wind.speed
                this.country=response.data.country
                this.sunrise=response.data.sys.sunrise
                this.sunset=response.data.sys.sunset
                this.desc=(response.data.weather[0].main)
                this.visibility=response.data.visibility
                this.wetIcon=response.data.weather[0].icon
                this.wetIcon="<img src='http://openweathermap.org/img/w/"+this.wetIcon+".png' width='100px'>"
                this.getSunstTime(this.sunrise,this.sunset);
              })
              .catch(e => {
                // error: if have any Error its Will be here
                this.errors.push(e)
              })

      },
      // methods :vue Methods Declaration.. all methods will be here ..

      methods:{
        // getSunstTime: get sunset and sunrice and calculate difference time also 

        getSunstTime(sunrise,sunset){
            var d = new Date()
            var date = new Date(sunrise * 1000)
            this.sunrise = date.toLocaleTimeString()
            var date = new Date(sunset * 1000)
            this.sunset = date.toLocaleTimeString()

            var todayDate = new Date().toISOString().slice(0,10)
            var sunrise = new Date(todayDate +" " + this.sunrise ).getHours()
            var sunset = new Date(todayDate +" " + this.sunset).getHours()
            var sunRise_SetDiffer = Math.abs(sunrise - sunset)
            var sunsetMines=(new Date(todayDate +" " + this.time).getHours())- (new Date(todayDate +" " + this.sunrise ).       getHours())
            this.sunSetRiseValue=  (sunsetMines*100)/sunRise_SetDiffer
        },

        //changeCtoF: change (celsius to fahrenheit) or (fahrenheit to celsius )
        changeCtoF(value){
         
            if (value == "C") {
              if(!this.disabledC){
                  this.temp = (this.temp * 9 / 5 + 32).toFixed(1)
                  this.temp_max=(this.temp_max * 9 / 5 + 32).toFixed(1);
                  this.temp_min=(this.temp_min * 9 / 5 + 32).toFixed(1)
                  this.disabledF=false // disable click
                  this.disabledC=true // disable click
                  this.colorF="grey--text" // change text color
                  this.colorC="white--text" // change text color
              }
            } else {
               if(!this.disabledF){
                  this.temp =  ((this.temp -32) * 5 / 9).toFixed(1)
                  this.temp_max = ((this.temp_max -32) * 5 / 9).toFixed(1)
                  this.temp_min = ((this.temp_min -32) * 5 / 9).toFixed(1)
                  this.disabledF=true // disable click
                  this.disabledC=false // disable click
                  this.colorF="white--text" // change text color
                  this.colorC="grey--text" // change text color
              }
            }
        }
      }
      
  });
  </script>
  <script>

</script>