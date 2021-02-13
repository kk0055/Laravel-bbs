
new Vue({ 
    el: '#app',
    vuetify: new Vuetify(),
    data: {
        image: { url: ""},
        number:0,
    },
    created(){
        this.loadNextImage();
    } ,
    methods:{
        async loadNextImage()
        {
            try{
             
                let response = await axios.get('https://api.thecatapi.com/v1/images/search', { params: { limit:1, size:"full" } } )
        
                  this.image = response.data[0]
             
                //  dog API URL
                //  https://api.thedogapi.com/v1/images/search

               

                console.log(this.image )
                console.log("id:", this.image.id)
                console.log("url:", this.image.url)

            }catch(err){
                console.log(err)
            }
        },count:function(){
      this.number = this.number + 1
    }
    }

});
