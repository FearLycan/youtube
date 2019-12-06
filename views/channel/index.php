<?php

use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searches\ChannelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Channels';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="white-wrapper">
    <div class="section-inner">
        <div class="container">
            <div class="row mb60 text-center">
                <div class="col-sm-12">
                    <h1 class="section-title"><?= Yii::$app->name ?></h1>
                    <h2 class="section-sub-title">A Warm welcome to you.</h2>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <?php Pjax::begin(); ?>
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_channel',
                    'summary' => false,
                    'itemOptions' => ['class' => 'col-md-4 match-height mb30'],
                    //'itemOptions' => ['class' => 'col-md-4 mb30 channel'],
                ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</section>











