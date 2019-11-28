<?php

use app\components\WebUser;
use yii\web\Application;
use  yii\BaseYii;

class Yii extends BaseYii
{
    /**
     * @var BaseApplication|WebApplication|ConsoleApplication the application instance
     */
    public static $app;
}

abstract class BaseApplication extends Application
{
}

class WebApplication extends Application
{
    /**
     * @var WebUser
     */
    public $user;
}

class ConsoleApplication extends \yii\console\Application
{
}
