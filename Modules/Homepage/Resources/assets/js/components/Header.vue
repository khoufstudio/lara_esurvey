<template>
    <!-- <div> -->
         <header id="header">
                        <div class="header-inner" style="background-color: #0d3a69">
                            <div class="container-fluid">
                              <div>
                                <!--Logo-->
                                <div id="logo">
                                    <a href="index.html" class="logo" data-src-dark="images/logo-kemendagri1.png">
                                        <img src="images/logo-kemendagri1.png" alt="Polo Logo" style="padding: 5px 0px">
                                    </a>
                                </div>
                                <!--End: Logo-->
                
                                                    <!-- Search -->
                                <div id="search">
                                    <div id="search-logo"><img src="images/logo-kemendagri1.png" alt="Polo Logo"></div>
                                    <button id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i
                                            class="icon-x"></i></button>
                                    <form class="search-form" action="search-results-page.html" method="get">
                                        <input class="form-control" name="q" type="search" placeholder="Search..."
                                            autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" />
                                        <span class="text-muted">Start typing & press "Enter" or "ESC" to close</span>
                                    </form>
                
                                    <div class="search-suggestion-wrapper">
                
                
                                        <div class="search-suggestion">
                                            <h3>News Articles</h3>
                                            <p><a href="#">Beautiful nature, and rare feathers!</a></p>
                                            <p><a href="#">New costs and rise of the economy!</a></p>
                                            <p><a href="#">A true story, that never been told!</a></p>
                                        </div>
                                        <div class="search-suggestion">
                                            <h3>Looking for these?</h3>
                                            <p><a href="#">New costs and rise of the economy!</a></p>
                                            <p><a href="#">AI can be trusted to take answer calls </a></p>
                                            <p><a href="#">Polo now lets you easily create any beautiful clean website</a></p>
                                        </div>
                                        <div class="search-suggestion">
                                            <h3>Blog Posts</h3>
                                            <p><a href="#">A true story, that never been told!</a></p>
                                            <p><a href="#">Beautiful nature, and rare feathers!</a></p>
                                            <p><a href="#">The most happiest time of the day!</a></p>
                                        </div>
                
                
                                    </div>
                                </div>
                                <!-- end: search -->
                
                                <!--Header Extras-->
                                <div class="header-extras">
                                    <ul>
                                        <li>
                                            <!--search icon-->
                                            <a id="btn-search" href="#"> <i class="icon-search1" style="color:white "></i></a>
                                            <!--end: search icon-->
                                        </li>
                                    </ul>
                                </div>
                                <!--end: Header Extras-->
                
                                <!--Navigation Resposnive Trigger-->
                                <div id="mainMenu-trigger">
                                    <button class="lines-button x"> <span class="lines"></span> </button>
                                </div>
                                <!--end: Navigation Resposnive Trigger-->
                                  <!--Navigation-->
                                  <div id="mainMenu" class="light">
                                        <div class="container-fluid">
                                            <nav v-html="menus" style="margin-left: -30px;">
                                            </nav>
                                        </div>
                                    </div>
                                    <!--end: Navigation-->
                                    </div>
                            </div>
                        </div>
                    </header>  
    <!-- </div> -->
</template>

<script>
    export default {
    
        data(){
          return{
            menus: '',
          }
        },
        methods: {

          loadHeaderMenus(){
                      
              axios.get("api/frontendnav")
              .then(({ data }) => {
                let menunav = '<ul>';
                for(let i=0; i < data.data.length; i++){
                  if(data.data[i].child != 0){
                    menunav += '<li class="dropdown"> <a href="#">'+data.data[i].nama_menu+'</a>';
                    menunav += this.getTreeChild(data.data[i].child);
                    menunav += '</li>';
                  }else{
                    menunav += '<li> <a href="#">'+data.data[i].nama_menu+'</a></li>';
                  }
                }
                menunav += '</ul>';
                this.menus = menunav;
              })
              .catch(() => {
             
              })
          

          },

          getTreeChild(child){
            let menunav = '<ul class="dropdown-menu">';
            for(let i=0; i < child.length; i++){
              
              if(child[i].child != 0){
                menunav += '<li class="dropdown-submenu"> <a href="#">'+child[i].nama_menu+'</a>';
                menunav += this.getTreeChild(child[i].child);
                menunav += '</li>';
              }else{
                menunav += '<li> <a href="#">'+child[i].nama_menu+'</a></li>';
              }
            }

            menunav += '</ul>';
            return menunav;
          },

         
        },

        mounted() {
           
        },
      
        created() {
            this.loadHeaderMenus();
            
            // Fire.$on('AfterCreated', () => {
            //   this.loadBlogs();
            // });
            // setInterval(() => this.loadUsers(), 3000);
        },

        
    }
</script>
