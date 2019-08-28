<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="INSPIRO" />
    <meta name="description" content="Themeforest Template Polo">
    <!-- Document title -->
    <title>KEMENTERIAN DALAM NEGERI R.I</title>
    <link href="{{ asset('global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend_assets/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend_assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend_assets/css/responsive.css') }}" rel="stylesheet">


    <!-- Template color -->
    <link href="{{ asset('frontend_assets/css/color-variations/red-dark.css') }}" rel="stylesheet" type="text/css" media="screen" title="blue">
    <script src="{{ asset('js/backend/app.js') }}" defer></script>
    <script src="{{ asset('frontend_assets/js/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="{{ asset('frontend_assets/js/jssor.slider-27.5.0.min.js') }}"></script>
    {{-- <link href="{{ asset('global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css"> --}}

    

    <style>
            #mainMenu nav > ul > li > a {
            color: #fff;
            padding: 5px 3px;
            font-size: 11px;
        }

        #mainMenu nav > ul > li > a:hover {
            color: orange;
        }

        #header .header-inner #logo a > img, #header #header-wrap #logo a > img{
            height: 69px;
        }

        #header .header-inner #logo, #header #header-wrap #logo {
            height: 60px;
        }

        .grid-articles .post-entry:first-child{
            width: 75% !important;
        }
    </style>


</head>

<body>
    

    <!-- Body Inner -->    
    <div class="body-inner">
        <div id="app">
            <top-bar></top-bar>
            <header-bar></header-bar>  
            <router-view></router-view>
            <vue-progress-bar></vue-progress-bar>
        </div>
        
        <!-- CAROUSEL -->
        <section class="background-colored">
            <div class="container">
                <div class="text-medium text-light">HIGHTLIGHTS</div>
                <div class="grid-articles carousel post-carousel m-b-20">
                    <article class="post-entry">
                        <a href="#" class="post-image"><img alt="" src="frontend_assets/images/magazine/images/news/carousel/1.jpg"></a>
                        <div class="post-entry-overlay">
                            <div class="post-entry-meta">
                                <div class="post-entry-meta-category">
                                    <span class="badge badge-danger">NEWS</span>
                                </div>
                                <div class="post-entry-meta-title">
                                    <h2><a href="#">Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor</a></h2>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="post-entry">
                        <a href="#" class="post-image"><img alt="" src="frontend_assets/images/magazine/images/news/carousel/2.jpg"></a>
                        <div class="post-entry-overlay">
                            <div class="post-entry-meta">
                                <div class="post-entry-meta-category">
                                    <span class="badge badge-danger">LIFESTYLE</span>
                                </div>
                                <div class="post-entry-meta-title">
                                    <h2><a href="#">Beautiful nature, and rare feathers!</a></h2>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="post-entry">
                        <a href="#" class="post-image"><img alt="" src="frontend_assets/images/magazine/images/news/carousel/3.jpg"></a>
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
                    <article class="post-entry">
                        <a href="#" class="post-image"><img alt="" src="frontend_assets/images/magazine/images/news/carousel/4.jpg"></a>
                        <div class="post-entry-overlay">
                            <div class="post-entry-meta">
                                <div class="post-entry-meta-category">
                                    <span class="badge badge-danger">World</span>
                                </div>
                                <div class="post-entry-meta-title">
                                    <h2><a href="#">Fusce id mi diam, non ornare orci</a></h2>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="post-entry">
                        <a href="#" class="post-image"><img alt="" src="frontend_assets/images/magazine/images/news/carousel/5.jpg"></a>
                        <div class="post-entry-overlay">
                            <div class="post-entry-meta">
                                <div class="post-entry-meta-category">
                                    <span class="badge badge-danger">World</span>
                                </div>
                                <div class="post-entry-meta-title">
                                    <h2><a href="#">The most happiest time of the day!</a></h2>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="post-entry">
                        <a href="#" class="post-image"><img alt="" src="frontend_assets/images/magazine/images/news/carousel/6.jpg"></a>
                        <div class="post-entry-overlay">
                            <div class="post-entry-meta">
                                <div class="post-entry-meta-category">
                                    <span class="badge badge-danger">World</span>
                                </div>
                                <div class="post-entry-meta-title">
                                    <h2><a href="#">The most happiest time of the day!</a></h2>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="post-entry">
                        <a href="#" class="post-image"><img alt="" src="frontend_assets/images/magazine/images/news/carousel/7.jpg"></a>
                        <div class="post-entry-overlay">
                            <div class="post-entry-meta">
                                <div class="post-entry-meta-category">
                                    <span class="badge badge-danger">World</span>
                                </div>
                                <div class="post-entry-meta-title">
                                    <h2><a href="#">The most happiest time of the day!</a></h2>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="text-light text-right">
                    <a class="read-more" href="blog-post.html">
All stories in Highlights <i class="fa fa-long-arrow-alt-right"></i></a></div>
            </div>
        </section>
        <!-- end: CAROUSEL -->

        <!-- BOXES -->
        <section class="p-t-60 p-b-40">
            <div class="container">

                <div class="row">

                    <div class="col-lg-4">
                        <div class="heading-text heading-line">
                            <h4>FOOD</h4></div>
                        <div class="post-thumbnail">
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/7.jpg">
                                <div class="post-thumbnail-content">
                                    <span class="post-date"><i class="far fa-clock"></i> 6m ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Technology</span>
                                    <h3><a href="#">Morbi ac neque at mi</a></h3>
                                    <p>The most happiest time of the day!. Morbi ac neque at mi elementum gravida.</p>

                                </div>
                            </div>
                        </div>
                        <div class="post-thumbnail-list">
                            <div class="post-thumbnail-entry">
                                <div class="post-thumbnail-content">
                                    <a href="#">A true story, that never been told!</a>

                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <div class="post-thumbnail-content">
                                    <a href="#">Beautiful nature, and rare feathers!</a>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <div class="post-thumbnail-content">
                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing</a>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <div class="post-thumbnail-content">
                                    <a href="#">Consectetur ipsum dolor sit amet</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="heading-text heading-line">
                            <h4>TECHNOLOGY</h4></div>
                        <div class="post-thumbnail">
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/8.jpg">
                                <div class="post-thumbnail-content">
                                    <span class="post-date"><i class="far fa-clock"></i> 6m ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Technology</span>
                                    <h3><a href="#">Fringilla consectetur amet</a></h3>
                                    <p>The most happiest time of the day!. Morbi ac neque at mi elementum gravida.</p>

                                </div>
                            </div>
                        </div>
                        <div class="post-thumbnail-list">
                            <div class="post-thumbnail-entry">
                                <div class="post-thumbnail-content">
                                    <a href="#">A true story, that never been told!</a>

                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <div class="post-thumbnail-content">
                                    <a href="#">Beautiful nature, and rare feathers!</a>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <div class="post-thumbnail-content">
                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing</a>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <div class="post-thumbnail-content">
                                    <a href="#">Consectetur ipsum dolor sit amet</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="heading-text heading-line">
                            <h4>AUTO</h4></div>
                        <div class="post-thumbnail">
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/9.jpg">
                                <div class="post-thumbnail-content">
                                    <span class="post-date"><i class="far fa-clock"></i> 6m ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Technology</span>
                                    <h3><a href="#">Dolor sit amet ipsum</a></h3>
                                    <p>The most happiest time of the day!. Morbi ac neque at mi elementum gravida.</p>

                                </div>
                            </div>
                        </div>
                        <div class="post-thumbnail-list">
                            <div class="post-thumbnail-entry">
                                <div class="post-thumbnail-content">
                                    <a href="#">A true story, that never been told!</a>

                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <div class="post-thumbnail-content">
                                    <a href="#">Beautiful nature, and rare feathers!</a>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <div class="post-thumbnail-content">
                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing</a>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <div class="post-thumbnail-content">
                                    <a href="#">Consectetur ipsum dolor sit amet</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: BOXES -->

        <!-- ADVERTISEMENT -->
        <section class="p-t-20 p-b-40">
            <div class="container">
                <div class="marketing-box">ADVERTISEMENT</div>
            </div>
        </section>
        <!-- end: ADVERTISEMENT -->

        <!-- CATEGORIES -->
        <section class="p-t-0 p-b-40">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4">
                        <div class="heading-text heading-line">
                            <h4>TECH</h4></div>
                        <div class="post-thumbnail-list">
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/1.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">A true story, that never been told!</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 6m ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Technology</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/2.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">Beautiful nature, and rare feathers!</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 24h ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/3.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">The most happiest time of the day!</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 11h ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/4.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">Consectetur ipsum dolor sit amet</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 8h ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="heading-text heading-line">
                            <h4>SPORT</h4></div>
                        <div class="post-thumbnail-list">
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/5.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">A true story, that never been told!</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 6m ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Technology</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/6.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">Beautiful nature, and rare feathers!</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 24h ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/7.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">The most happiest time of the day!</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 11h ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/8.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">New costs and rise of the economy!</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 11h ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="heading-text heading-line">
                            <h4>FASHION</h4></div>
                        <div class="post-thumbnail-list">
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/1.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">A true story, that never been told!</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 6m ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Technology</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/2.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">Beautiful nature, and rare feathers!</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 24h ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/3.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">The most happiest time of the day!</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 11h ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/4.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">Consectetur ipsum dolor sit amet</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 8h ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: CATEGORIES -->

        <!-- ADVERTISEMENT -->
        <section class="p-t-0 p-b-40">
            <div class="container">
                <div class="marketing-box">ADVERTISEMENT</div>
            </div>
        </section>
        <!-- end: ADVERTISEMENT -->

        <!-- CATEGORIES -->
        <section class="p-t-0 p-b-40">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4">
                        <div class="heading-text heading-line">
                            <h4>ENTERTAINMENT</h4></div>
                        <div class="post-thumbnail-list">
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/1.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">A true story, that never been told!</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 6m ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Technology</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/2.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">Beautiful nature, and rare feathers!</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 24h ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/3.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">The most happiest time of the day!</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 11h ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/4.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">Consectetur ipsum dolor sit amet</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 8h ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="heading-text heading-line">
                            <h4>NATURE</h4></div>
                        <div class="post-thumbnail-list">
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/5.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">A true story, that never been told!</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 6m ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Technology</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/6.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">Beautiful nature, and rare feathers!</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 24h ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/7.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">The most happiest time of the day!</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 11h ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/8.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">New costs and rise of the economy!</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 11h ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="heading-text heading-line">
                            <h4>POLITICS</h4></div>
                        <div class="post-thumbnail-list">
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/1.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">A true story, that never been told!</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 6m ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Technology</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/2.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">Beautiful nature, and rare feathers!</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 24h ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/3.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">The most happiest time of the day!</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 11h ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <img alt="" src="frontend_assets/images/magazine/images/news/thumbnail/4.jpg">
                                <div class="post-thumbnail-content">
                                    <a href="#">Consectetur ipsum dolor sit amet</a>
                                    <span class="post-date"><i class="far fa-clock"></i> 8h ago</span>
                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: CATEGORIES -->
	
		<!-- CALL TO ACTION -->    
        <div class="call-to-action call-to-action-colored background-colored m-b-0">
            <div class="container">
                <div class="col-lg-10">
                   <h3>Ready to purchase POLO Template?</h3>
                    <p>This is a simple hero unit, a simple call-to-action-style component for calling extra attention to featured content.</p>
                </div>
                <div class="col-lg-2"> <a href="https://themeforest.net/item/polo-responsive-multipurpose-html5-template/13708923" class="btn btn-light btn-outline">Purchase</a> </div>
            </div>
        </div>
        <!-- END: CALL TO ACTION -->

        <!-- Footer -->
       <footer id="footer">
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                            <div class="col-lg-5">
                                    <div class="widget">
                                
                                            <div class="widget-title">Polo HTML5 Template</div>
                                                <p class="mb-5">Built with love in Fort Worth, Texas, USA<br>
                                                All rights reserved. Copyright © 2019. INSPIRO.</p>
                                                <a href="https://themeforest.net/item/polo-responsive-multipurpose-html5-template/13708923" class="btn btn-inverted">Purchase Now</a>
                                    </div>
                        </div> <div class="col-lg-7">
                            <div class="row">
                                <div class="col-lg-3">
                                        <div class="widget">
                                            <div class="widget-title">Discover</div>
                                            <ul class="list">                                           
                                                    <li><a href="#">Features</a></li>
                                                    <li><a href="#">Layouts</a></li>
                                                    <li><a href="#">Corporate</a></li>
                                                    <li><a href="#">Updates</a></li>
                                                    <li><a href="#">Pricing</a></li>
                                                    <li><a href="#">Customers</a></li>
                                                </ul>
                                        </div>  
                                    </div>

                                        <div class="col-lg-3">
                                                <div class="widget">
                                                    <div class="widget-title">Features</div>
                                                    <ul class="list">                                           
                                                            <li><a href="#">Layouts</a></li>
                                                            <li><a href="#">Headers</a></li>
                                                            <li><a href="#">Widgets</a></li>
                                                            <li><a href="#">Footers</a></li>
                                                        </ul>
                                                </div>  
                                            </div>
                                
                                                <div class="col-lg-3">
                                                        <div class="widget">
                                                            <div class="widget-title">Pages</div>
                                                            <ul class="list">                                           
                                                                    <li><a href="#">Portfolio</a></li>
                                                                    <li><a href="#">Blog</a></li>
                                                                    <li><a href="#">Shop</a></li>
                                                                </ul>
                                                        </div>  
                                                    </div>
                                                    <div class="col-lg-3">
                                                            <div class="widget">
                                                                <div class="widget-title">Support</div>
                                                                <ul class="list">                                           
                                                                        <li><a href="#">Help Desk</a></li>
                                                                        <li><a href="#">Documentation</a></li>
                                                                        <li><a href="#">Contact Us</a></li>
                                                                    </ul>
                                                            </div>  
                                                        </div>
                            </div>
                        </div>
                

                </div>
                </div>
            </div>
            <div class="copyright-content">
                <div class="container">
                    <div class="copyright-text text-center">&copy; 2019 POLO -  Responsive Multi-Purpose HTML5 Template. All Rights Reserved.<a href="http://www.inspiro-media.com" target="_blank"> INSPIRO</a> </div>
                </div>
            </div>
        </footer>
        <!-- end: Footer -->

    </div>
    <!-- end: Body Inner -->

    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up1"></i><i class="icon-chevron-up1"></i></a>
    <!--Plugins-->
    
    <script src="{{ asset('frontend_assets/js/plugins.js') }}"></script>

    <!--Template functions-->
    <script src="{{ asset('frontend_assets/js/functions.js') }}"></script>
    <script src="/js/app.js"></script>
  

</body>

</html>
