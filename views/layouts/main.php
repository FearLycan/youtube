<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,900|Dancing+Script:400,700|Raleway:400,100,300,700,900|Reenie+Beanie&subset=latin,latin-ext'
          rel='stylesheet' type='text/css'>
</head>
<body class="top-navigation pushy-right-side regular-nav">

<!-- Site Overlay -->
<div class="site-overlay"></div>

<div id="master-wrapper">

    <div class="preloader">
        <div class="preloader-img">
            <span class="loading-animation animate-flicker">
                <img src="<?= Url::to('@web/lib/images/loading.gif') ?>" alt="loading"/></span>
        </div>
    </div>

    <div id="top-bar" class="hidden-xs">
        <div class="container">
            <div class="col-sm-4">
                <ul class="header-social list-inline">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a class="blog" href="#"><i class="fa fa-rss"></i></a></li>
                    <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                </ul>
            </div>
            <div class="col-sm-8">
                <ul class="secondary-menu list-inline pull-right">
                    <li><a href="#">Travel</a></li>
                    <li><a href="#">Food</a></li>
                    <li><a href="#">Motors</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="navbar nav-wrapper smoothie">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <a class="logo" href="index.html">
                        <img alt="" class="logo img-responsive" src="<?= Url::to('@web/lib/images/logo-light.png') ?>"></a>
                </div>
                <div class="col-sm-8">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse-1" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">Home <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="index-magazine.html">Home Magazine</a></li>
                                    <li><a href="index-masonry.html">Home Masonry</a></li>
                                    <li><a href="index-agency.html">Home Agency</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">Portfolio <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="portfolio-grid.html">Portfolio Grid</a></li>
                                    <li><a href="portfolio-grid-fullwidth.html">Portfolio Grid Fullwidth</a></li>
                                    <li><a href="single-portfolio.html">Single Portfolio</a></li>
                                    <li><a href="single-portfolio-video.html">Single Portfolio Video</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">News <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="news-list.html">News List</a></li>
                                    <li><a href="news-grid.html">News Grid</a></li>
                                    <li><a href="news-tiles.html">News Tiles</a></li>
                                    <li><a href="single-post.html">Single Post</a></li>
                                    <li><a href="single-post-video.html">Single Post Video</a></li>
                                    <li><a href="single-post-no-sidebar.html">Single Post No Sidebar</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="contact-us.html">Contact Us</a></li>
                                    <li><a href="404.html">404</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                            class="glyphicon glyphicon-search"></i></a>
                                <ul class="dropdown-menu">
                                    <form class="form-inline">
                                        <button type="submit" class="btn btn-default pull-right"><i
                                                    class="glyphicon glyphicon-search"></i></button>
                                        <input type="text" class="form-control pull-left" placeholder="Search">
                                    </form>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->beginBody() ?>

    <footer id="footer-wrapper" class="dark-wrapper">
        <div class="container">
            <div class="row mb90">
                <div class="col-md-3 col-xs-6">
                    <div class="text-widget widget">
                        <div class="widget-content">
                            <img alt="" class="img-responsive" src="<?= Url::to('@web/lib/images/logo-light.png') ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="text-widget widget">
                        <h4 class="widget-title mb40">Location</h4>
                        <div class="widget-content">
                            <p>Conveniently enhance high-quality imperatives vis-a-vis team driven technologies.
                                Intrinsicly fashion economically sound communities rather than principle-centered
                                deliverables. Synergistically impact.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="useful-link-widget widget">
                        <h4 class="widget-title mb40">Pages</h4>
                        <div class="widget-content">
                            <div class="useful-link-list">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <ul class="list-unstyled">
                                            <li>
                                                <i class="fa fa-angle-right"></i><a href="#">404</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-right"></i><a href="#">Blog</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-right"></i><a href="#">About Us</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-right"></i><a href="#">Contact</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-right"></i><a href="#">Social Media</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <ul class="list-unstyled">
                                            <li>
                                                <i class="fa fa-angle-right"></i><a href="#">Company</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-right"></i><a href="#">Latest Courses</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-right"></i><a href="#">Partners</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-right"></i><a href="#">Blog Post</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-right"></i><a href="#">Help Topic</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="mailing-widget widget">
                        <h4 class="widget-title mb40">Mailing List</h4>
                        <div class="content-wiget">
                            <p class="mb40">Subscribe to our newsletter for the latest updates and offers.</p>
                            <form action="index.html">
                                <div class="input-group">
                                    <input class="form-control form-email-widget" placeholder="Email address"
                                           type="text"><span class="input-group-btn"><input class="btn btn-email"
                                                                                            type="submit"
                                                                                            value="✓"></span>
                                </div>
                            </form>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row sub-footer">
                <div class="col-md-6 footer-social">
                    <a class="facebook" href="#">Facebook</a>
                    <a class="google" href="#">Google</a>
                    <a class="twitter" href="#">Twitter</a>
                    <a class="pinterest" href="#">Pinterest</a>
                </div>
                <div class="col-md-6 text-right">
                    <p class="copyright">
                        <small>© <?= date('Y') ?>. <?= Yii::$app->name ?>, All Rights Reserved</small>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <a href="#" id="back-to-top"><i class="fa fa-angle-up"></i></a>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
