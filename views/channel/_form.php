<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Channel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="channel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'youtube_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'thumbnails')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'banners')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'viewCount')->textInput() ?>

    <?= $form->field($model, 'subscriberCount')->textInput() ?>

    <?= $form->field($model, 'videoCount')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'last_activity')->textInput() ?>

    <?= $form->field($model, 'synchronized_at')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
