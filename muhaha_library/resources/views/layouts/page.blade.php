<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="no-js oldie" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Hannover Messe</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

    <!-- header
    ================================================== -->
    <header class="s-header">

        <div class="header-logo" style="left: 15%;">
            <a class="site-logo" href="http://www.bozhon.com"><img src="images/logo.png" alt="Homepage" style="max-width: 250%;"></a>
        </div>

        <nav class="header-nav-wrap" style="right: 15%;">
            <ul class="header-nav">
                <li class="current"><a class="smoothscroll"  href="#home" title="home">主页</a></li>
                <li><a class="smoothscroll"  href="#blog" title="精彩看点">精彩看点</a></li>
                <li><a class="smoothscroll"  href="#works" title="动态速递">动态速递</a></li>
                <li><a class="smoothscroll"  href="#blogx" title="大咖驾到">大咖驾到</a></li>
                <li><a class="smoothscroll"  href="en/index.html" title="en">en</a></li>
            </ul>
        </nav>

        <a class="header-menu-toggle" href="#0"><span>Menu</span></a>

    </header> <!-- end s-header -->


   @yield('content')


    <!-- footer
    ================================================== -->
    <footer>
        <div class="row">
            <div class="col-full">

                <div class="footer-logo">
                    <a class="footer-site-logo" href="http://www.bozhon.com"><img src="images/logo.png" alt="Homepage"></a>
                </div>

                <ul class="footer-social">
                    <li><a href="https://www.facebook.com/bozhon.bozhon.7">
                        <i class="fa fa-facebook-official" aria-hidden="true"></i>
                        <span>Facebook</span>
                    </a></li>
                    <li><a href="https://twitter.com/BOZHON_CN?lang=en">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        <span>Twitter</span>
                    </a></li>
                    <li><a href="https://www.linkedin.com/company/12936025/">
                        <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                        <span>linkedin</span>
                    </a></li>
                    <li><a href="https://www.youtube.com/channel/UCRL6WoK48JM-J0aRKITp1XA">
                        <i class="fa fa-youtube" aria-hidden="true"></i>
                        <span>youtube</span>
                    </a></li>
                    <li><a href="http://i.youku.com/u/UNDY1MTI2NzA0NA==?spm=a2h0k.8191407.0.0">
                        <b>优酷</b>
                        <span>youku</span>
                    </a></li>
                    <li><a href="images/wechat.jpg">
                        <i class="fa fa-wechat" aria-hidden="true"></i>
                        <span>Wechat</span>
                    </a></li>
                    <li><a href="images/weibo.jpg">
                        <i class="fa fa-weibo" aria-hidden="true"></i>
                        <span>Sina</span>
                    </a></li>
                </ul>
                    
            </div>
        </div>

        <div class="row footer-bottom">

            <div class="col-twelve">
                <div class="copyright">
                    <span>版权所有 © 2001-2018博众精工科技股份有限公司</span> 
                </div>

                <div class="go-top">
                <a class="smoothscroll" title="Back to Top" href="#top"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>
                </div>
            </div>

        </div> <!-- end footer-bottom -->

    </footer> <!-- end footer -->


    

    <div id="preloader">
        <div id="loader"></div>
    </div>


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery.flexslider.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>