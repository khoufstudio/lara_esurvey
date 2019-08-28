<template>
          <div class="col-md-12">
                <div class="card blog-horizontal blog-horizontal-xs">
                    <div class="card-header">Example Component</div>

                   <div class="card-body">
                     <div  v-for="blog in blogs.data" :key="blog.id" :idblog="blog">
                      <div class="card-img-actions mr-3">
                        <img class="card-img img-fluid" :src= "blog.file_foto" alt="">
                        <div class="card-img-actions-overlay card-img">
                          <a href="blog_single.html" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                            <i class="icon-link"></i>
                          </a>
                        </div>
                      </div>

                      <div class="mb-3">
                        <h5 class="font-weight-semibold my-1">
                          <!-- <router-link :to="`/berita/baca?id=${blog.id}`"  class="text-default">{{ blog.blog_name }}</router-link> -->

                          <router-link :to="{ name: 'baca', params: {id: blog.id, slug: blog.post_slug } }"  class="text-default">{{ blog.blog_name }}</router-link>
                        </h5>

                        <ul class="list-inline list-inline-dotted text-muted mb-0">
                          <li class="list-inline-item">By <a href="#" class="text-muted">{{ blog.create_author }}</a></li>
                          <li class="list-inline-item">{{ blog.created_at }}</li>
                          <li class="list-inline-item"><a href="#" class="text-muted"><i class="icon-heart6 font-size-base text-pink mr-2"></i> 281</a></li>
                        </ul>
                      <p v-html="blog.blog_desc"></p>
                      </div>

                    </div>
                      
                  </div>

                  <div class="card-footer">
                    <pagination :data="blogs" @pagination-change-page="getResults"></pagination>
                  </div>
                </div>
            </div>
</template>

<script>
    export default {
    
        data(){
          return{
            
            blogs: {},
            loader: this.$loading.show(),
          }
        },
        methods: {
          getResults(page = 1) {
            axios.get('api/blogs?page=' + page)
              .then(response => {
                this.blogs = response.data.data;
              });
          },
          loadBlogs(){
              this.loader;              
              axios.get("api/blogs")
              .then(({ data }) => {
                this.blogs = data.data ;
                this.$loading.hide();
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
            this.loadBlogs();
            Fire.$on('AfterCreated', () => {
              this.loadBlogs();
            });
            // setInterval(() => this.loadUsers(), 3000);
        }
    }
</script>
