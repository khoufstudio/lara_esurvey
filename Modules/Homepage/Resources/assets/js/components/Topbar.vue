<template>
   <div id="topbar" class="d-none d-xl-block d-lg-block">
      <div class="container-fluid" style="padding: 0px">
          <div class="row" style="height:25px">
              <div class="col-md-11" style="background-color: #f8a70f">
                  <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="3">
                   <a href="https://www.kemendagri.go.id/pages/detail/112" style="font-size: 11px"><b> HIMBAUAN NETRALITAS PEGAWAI APARATUR SIPIL NEGARA (ASN), KAMPANYE OLEH PEJABAT NEGARA LAINNYA SERTA LARANGAN PENGGUNAAN FASILITAS NEGARA</b></a>
                    </marquee>
                  <!-- <div class="topbar-dropdown">                  
                      <a class="title">English <i class="fa fa-caret-down"></i></a>
                      <div class="dropdown-list">
                          <a class="list-entry" href="#">French</a>
                          <a class="list-entry" href="#">Spanish</a>
                      </div>
                  </div>
                  <div class="topbar-dropdown">
                      <div class="title"><i class="fa fa-user"></i><a href="#">Login</a></div>
                      <div class="topbar-form">
                          <form>
                              <div class="form-group">
                                  <label class="sr-only">Username or Email</label>
                                  <input type="text" placeholder="Username or Email" class="form-control">

                              </div>
                              <div class="form-group">
                                  <label class="sr-only">Password</label>
                                  <input type="password" placeholder="Password" class="form-control">
                              </div>
                              <div class="form-inline form-group">
                                  <div class="form-check">
                                      <label>
                                          <input type="checkbox">
                                          <small class="m-l-10"> Remember me</small> </label>
                                  </div>
                                  <button type="button" class="btn btn-primary btn-block">Login</button>
                              </div>
                          </form>
                      </div>
                  </div> -->
                  <!-- <div class="topbar-dropdown">
                      <div class="title"></div>
                  </div>  -->

              </div>
              <div class="col-md-1 d-none d-sm-block" style="background-color: rgb(216, 39, 49);">
                  <div class="social-icons social-icons-colored-hover">
                      <ul>
                          <li class="social-facebook"><a style="color:white" href="#"><i style="vertical-align: super" class="fab fa-facebook-f"></i></a></li>
                          <li class="social-twitter"><a  style="color:white"  href="#"><i style="vertical-align: super" class="fab fa-twitter"></i></a></li>
                         
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
    export default {
        mounted() {
            console.log('top mounted.')
        }
    }
</script>
