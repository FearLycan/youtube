<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */

$this->title = $name;

?>

<header class="fullheight dark-text">
    <div class="fullheight">
        <div class="container fullheight text-center">
            <div class="vertical-center-js">
                <h1>
                    <small>Oh no, this is an</small>
                    <br>
                    404 Error
                </h1>
                <p>
                    <a class="btn btn-white btn-lg" href="<?= Yii::$app->homeUrl ?>" role="button">
                        Wróć na stronę główną
                    </a>
                </p>
            </div>
        </div>
    </div>
</header>
