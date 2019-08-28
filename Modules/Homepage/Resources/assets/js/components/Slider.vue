<template>
  <div>
     
      
     <!-- NEWS GRID -->
        <section class="p-t-40 p-b-40" style="padding-bottom: 0px !important">
            <div class="container">
                <div class="grid-articles">
                    <article class="post-entry" style="height: 370px"> 

                        <a href="#" class="post-image"><img alt="" src="https://www.kemendagri.go.id/thumbnail/timthumb.php?src=https://www.kemendagri.go.id/application/modules/slide/files/Ramadhan_1440_H.png&w=762&h=260&q=100" style="height: 100%"></a>
                        
                        
                        
                        <div class="post-entry-overlay">
                            <div class="post-entry-meta">
                                <!-- <div class="post-entry-meta-category">
                                    <span class="badge badge-danger">NEWS</span>
                                </div>
                                <div class="post-entry-meta-title">
                                    <h2><a href="#">Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor</a></h2>
                                </div> -->
                            </div>
                        </div>
                        <!-- ////// -->

                         

                        <!-- //////// -->
                    </article>
                    <article class="post-entry">
                        <a href="#" class="post-image"><img alt="" src="frontend_assets/images/magazine/images/news/grid/2.jpg"></a>
                        <div class="post-entry-overlay">
                            <div class="post-entry-meta">
                                <div class="post-entry-meta-category">
                                    <span class="badge badge-danger">LIFESTYLE</span>
                                </div>
                                <div class="post-entry-meta-title">
                                    <h2><a href="#">Venenatis eu, sodales vel dolor</a></h2>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="post-entry">
                        <a href="#" class="post-image"><img alt="" src="frontend_assets/images/magazine/images/news/grid/3.jpg"></a>
                        <div class="post-entry-overlay">
                            <div class="post-entry-meta">
                                <div class="post-entry-meta-category">
                                    <span class="badge badge-danger">LIFESTYLE</span>
                                </div>
                                <div class="post-entry-meta-title">
                                    <h2><a href="#">A true story, that never been told!</a></h2>
                                </div>
                            </div>
                        </div>
                    </article>
                  
                </div>
            </div>
        </section>



        <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:60px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:60px;overflow:hidden;">
            <div>
                <img data-u="image" src="https://www.kemendagri.go.id/application/modules/link/files/capaian_target_landscape-012.jpg" />
            </div>
            <div>
                <img data-u="image" src="https://www.kemendagri.go.id/application/modules/link/files/COVER_KORPRI_I_19.png  " />
            </div>
            <div>
                <img data-u="image" src="https://www.kemendagri.go.id/application/modules/link/files/Dapok-17-Mendagri1.png " />
            </div>
            <div>
                <img data-u="image" src="https://www.kemendagri.go.id/application/modules/link/files/banner_DAPOK_2016.png" />
            </div>
            <div>
                <img data-u="image" src="https://www.kemendagri.go.id/application/modules/link/files/Banner_Prodeskel.png" />
            </div>
            <div>
                <img data-u="image" src="https://www.kemendagri.go.id/application/modules/link/files/2.png" />
            </div>
            <div>
                <img data-u="image" src="https://www.kemendagri.go.id/application/modules/link/files/12.png" />
            </div>
            <div>
                <img data-u="image" src="https://www.kemendagri.go.id/application/modules/link/files/banner-saber.png" />
            </div>
            
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb057" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5000"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora073" style="width:50px;height:60px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <i class="fas fa-chevron-circle-left" style="color: #fff;margin-left: -10px;margin-top: 25px;"></i>
        </div>
        <div data-u="arrowright" class="jssora073" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
             <i class="fas fa-chevron-circle-right" style="color: #fff;margin-left: 50px;margin-top: 20px;"></i>
        </div>
    </div>
        
        <!-- end: NEWS GRID -->
  </div>
</template>

<script>
  export default {
    mounted() {
        console.log('slider mounted');
    }
  }
</script>


<script type="text/javascript">
        jQuery(document).ready(function ($) {

            var jssor_1_options = {
              $AutoPlay: 0,
              $AutoPlaySteps: 1,
              $SlideDuration: 160,
              $SlideWidth: 200,
              $SlideSpacing: 0,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 1
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 1110;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        });
    </script>
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 057 css*/
        .jssorb057 .i {position:absolute;cursor:pointer;}
        .jssorb057 .i .b {fill:none;stroke:#fff;stroke-width:2000;stroke-miterlimit:10;stroke-opacity:0.4;}
        .jssorb057 .i:hover .b {stroke-opacity:.7;}
        .jssorb057 .iav .b {stroke-opacity: 1;}
        .jssorb057 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 073 css*/
        .jssora073 {display:block;position:absolute;cursor:pointer;}
        .jssora073 .a {fill:#ddd;fill-opacity:.7;stroke:#000;stroke-width:160;stroke-miterlimit:10;stroke-opacity:.7;}
        .jssora073:hover {opacity:.8;}
        .jssora073.jssora073dn {opacity:.4;}
        .jssora073.jssora073ds {opacity:.3;pointer-events:none;}
    </style>

    