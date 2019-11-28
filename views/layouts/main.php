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
<?php $this->beginBody() ?>

<!-- Site Overlay -->
<div class="site-overlay"></div>

<div id="master-wrapper">

    <div class="preloader">
        <div class="preloader-img">
            <span class="loading-animation animate-flicker">
                <img src="<?= Url::to('@web/lib/images/loading.gif') ?>" alt="loading"/></span>
        </div>
    </div>

    <?= $this->render('partials/_top-bar') ?>

    <?= $this->render('partials/_menu') ?>

    <?= $content ?>

    <?= $this->render('partials/_footer') ?>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
