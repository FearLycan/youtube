<?php

use yii\helpers\Url;

?>
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