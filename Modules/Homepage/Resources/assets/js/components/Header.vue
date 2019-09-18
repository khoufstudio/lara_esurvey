<template>
 	<header id="header">
    <div class="header-inner" style="background-color: #f8f8f8;border-color: #e7e7e7;">
      <div class="container-fluid">
        <!--Logo-->
        <div id="logo">
            <a href="index.html" class="logo" data-src-dark="images/logo_dephub.png">
                <img src="/images/logo_dephub.png" alt="Dephub Logo" style="padding: 5px 0px">
            </a>
        </div>
        <!--End: Logo-->
      </div>
    </div>
  </header>  
</template>

<script>
export default {

  data(){
    return{
      menus: '',
    }
  },
  methods: {
   
  },

  mounted() {
     
  },

  created() {
      // this.loadHeaderMenus();
  },

  
}
</script>
