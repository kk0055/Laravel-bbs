<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <link rel="stylesheet" href="{{asset('css/api.css') }}">
</head>
<body>
 
<!-- JS-->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>

  <div id="app">
    <v-app>
      @include('inc.nav')
      
        <v-container>
     
            <v-layout >
                <v-flex class="d-flex justify-content-center" >
                <v-card flat tile class=" img-body" >
                    <v-img :src="image.url"  class="v-img avatar" contain id="img"   >
                    </v-img>
                </v-card>
                
            </v-layout>
            <v-layout align-center justify-center mt-5 >
            <button class="rate-btn" id="btn_count_up_no"  @click="loadNextImage" style="background-image: url('/images/delete.png');" >
            </button>
   
            <button class="rate-btn"  id="btn_count_up"  @click="loadNextImage" style="background-image: url('/images/heart.png');" >
            </button>
            
          </v-layout>
        </v-flex>
 
        </v-container>

        <div class="d-flex justify-content-center mt-2">
        <div id="disp_count_no" class="mr-15 ">0</div> 
        <div id="disp_count" class="ml-15">0</div> 
      </div>

      </v-content>
    </v-app>
  </div>
 
  <script>
    new Vue({ 
        el: '#app',
        vuetify: new Vuetify(),
        data: {
            image: { url: ""}
        },
        created(){
            this.loadNextImage();
        } ,
        methods:{
            async loadNextImage()
            {
                try{
                    axios.defaults.headers.common['x-api-key'] = "" // Replace this with your API Key
                    let response = await axios.get('https://api.thedogapi.com/v1/images/search', { params: { limit:1, size:"full" } } ) 
                    
                    this.image = response.data[0] 
                    console.log("id:", this.image.id)
                    console.log("url:", this.image.url)

                }catch(err){
                    console.log(err)
                }
            }
        }
    })
  </script>
<script >
  window.onload = function() {
    var count_disp = document.getElementById("disp_count");  
    var count_disp_no = document.getElementById("disp_count_no");  
    var count_up_btn = document.getElementById("btn_count_up");
    var count_up_btn_no = document.getElementById("btn_count_up_no");
    var count_value = 0;
    var count_value_no = 0;
  
  
   count_up_btn.onclick = function (){
        count_value += 1;
        count_disp.innerHTML = count_value;
   };
  
   count_up_btn_no.onclick = function (){
        count_value_no += 1;
        count_disp_no.innerHTML = count_value_no ;
        
   };
  }
  </script>
</body>
</html>