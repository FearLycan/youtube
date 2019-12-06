<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searches\ChannelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="channel-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'slug') ?>

    <?= $form->field($model, 'youtube_id') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'thumbnails') ?>

    <?php // echo $form->field($model, 'banners') ?>

    <?php // echo $form->field($model, 'viewCount') ?>

    <?php // echo $form->field($model, 'subscriberCount') ?>

    <?php // echo $form->field($model, 'videoCount') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'last_activity') ?>

    <?php // echo $form->field($model, 'synchronized_at') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
