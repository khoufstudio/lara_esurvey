<template>
          <div class="col-md-6 offset-md-3">
                <div class="card blog-horizontal blog-horizontal-xs">
                    <!-- <div class="card-header">Example Component</div> -->

                   <div class="card-body">
                    
                     <div class="mb-4">
                      <div class="mb-3 text-center">
                        <a href="#" class="d-inline-block">
                          <img alt="" class="img-fluid" :src="'/'+blog.file_foto">
                          
                        </a>
                      </div>

                      <h4 class="font-weight-semibold mb-1">
                        <a href="#" class="text-default">{{ blog.blog_name }}</a>
                      </h4>

                      <ul class="list-inline list-inline-dotted text-muted mb-3">
                        <li class="list-inline-item">By <a href="#" class="text-muted">{{ blog.create_author }}</a></li>
                        <li class="list-inline-item">{{ blog.created_at }}</li>
                        <li class="list-inline-item"><a href="#" class="text-muted">12 comments</a></li>
                        <li class="list-inline-item"><a href="#" class="text-muted"><i class="icon-heart6 font-size-base text-pink mr-2"></i> 281</a></li>
                      </ul>

                      <div class="mb-3">
                        <p v-html="blog.blog_desc"></p>
                      </div>

                    </div>

                    </div>
                 
                </div>
        </div>
</template>

<script>
    export default {
        data(){
          return{
            blog: {},
            loader: this.$loading.show(),
          }
        },
        methods: {
          
          loadBlog(){
             this.loader;
              axios.get('http://localhost:8000/api/berita/'+this.$route.params.id+'/baca')
              .then(({ data }) => {
                
                this.blog = data.data ;
                this.loader.hide();
              })
              .catch(() => {
                this.loader.hide();
              })
          
          },
        },
        mounted() {
            console.log('Component mounted.')

        },

        created() {
            this.loadBlog();
            Fire.$on('AfterCreated', () => {
              this.loadBlog();
            });
            // setInterval(() => this.loadUsers(), 3000);
        }
    }
</script>