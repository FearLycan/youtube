<?php

use app\components\Helper;
use app\models\Channel;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var $model Channel
 */
?>

<div class="hover-effect smoothie channel">
    <a href="<?= Url::to(['channel/view', 'slug' => $model->slug]) ?>" class="smoothie">
        <!--<img src="http://lorempixel.com/1200/800" alt="Image" class="img-responsive smoothie">-->
       <img src="https://yt3.ggpht.com/_NGHPmqhf_LvYKKmZU_Ef15gGgKrOnhv2lAto5I8N-estNqEQP0cgYAKpVilKDC3dSZ5tb_U=w1280-fcrop64=1,00000000ffffffff-k-c0xffffffff-no-nd-rj" alt="<?= $model->title ?>" class="img-responsive smoothie" style="height: 100%;">
    </a>
    <div class="hover-overlay smoothie">
        <div class="vertical-align-bottom">
            <h3><?= $model->title ?></h3>

            <?php foreach ($model->categories as $category): ?>
                <span class="item-category-span"><?=Html::encode($category->name) ?></span>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="hover-caption dark-overlay smoothie text-center">
        <div class="vertical-align-top">
            <p class="mb20">
                <small>
                    <?= Helper::cutThis($model->description, 240); ?>
                </small>
            </p>
        </div>
        <div class="vertical-align-bottom">
            <a href="<?= Url::to(['channel/view', 'slug' => $model->slug]) ?>" class="btn btn-primary pull-right mb20">Read now</a>
        </div>
    </div>
</div>