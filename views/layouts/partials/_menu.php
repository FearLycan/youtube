<?php

use app\components\MenuItems;
use yii\helpers\Url;
use yii\widgets\Menu;

?>
<div class="navbar nav-wrapper smoothie">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <a class="logo" href="<?= Yii::$app->homeUrl ?>">
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
                    <?= Menu::widget(MenuItems::get()) ?>
                </div>
            </div>
        </div>
    </div>
</div>