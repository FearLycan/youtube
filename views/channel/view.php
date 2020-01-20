<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Channel */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Channels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="channel-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'slug',
            'youtube_id',
            'description:ntext',
            'thumbnails:ntext',
            'banners:ntext',
            'viewCount',
            'subscriberCount',
            'videoCount',
            'status',
            'last_activity',
            'synchronized_at',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
