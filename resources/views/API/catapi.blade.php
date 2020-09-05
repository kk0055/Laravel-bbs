<!DOCTYPE html>
<html>
<head>
  <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <link rel="stylesheet" href="/css/api.css">
</head>
<body>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
  <div id="app">
    <v-app>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="/">ホーム <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">アルバム</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">相談ごと</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/cat">にゃんだー</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/dog">わんだー</a>
            </li>
          </ul>
        </div>
      </nav>
      
        <v-container>
     

            <v-layout row wrap>
                <v-flex xs12 >
                <v-card flat tile class="d-flex buddy"  >
                    <v-img :src="image.url"class="v-img avatar" contain  >
                    </v-img>
                </v-card>
                </v-flex>
            </v-layout>
            <v-layout align-center justify-center mt-5 >
              <!-- <v-btn class="v-btn v-btn--large  mr-5" color="red " dark large @click="loadNextImage" >
                  NOPE  &nbsp; <v-icon>thumb_down</v-icon>
              </v-btn> -->
              <btn class="rate-btn"  @click="loadNextImage" >
            </btn>

            <btn class="rate-btn"  @click="loadNextImage" >
            </btn>

              <!-- <v-btn class="v-btn v-btn--large  theme--light green mr-5" dark large @click="loadNextImage" >
                LIKE &nbsp; <v-icon>thumb_up</v-icon>
            </v-btn> -->
          </v-layout>
        </v-container>
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

                    let response = await axios.get('https://api.thecatapi.com/v1/images/search', { params: { limit:1, size:"full" } } ) // Ask for 1 Image, at full resolution
                    
                    //  dog API URL
                    //  https://api.thedogapi.com/v1/images/search

                    this.image = response.data[0] // the response is an Array, so just use the first item as the Image

                    console.log("-- Image from TheCatAPI.com")
                    console.log("id:", this.image.id)
                    console.log("url:", this.image.url)

                }catch(err){
                    console.log(err)
                }
            }
        }
    })
  </script>

</body>
</html>