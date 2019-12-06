<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'lib/bootstrap/css/bootstrap.css',
        'css/font-awesome.min.css',
        'lib/pe-icons/css/pe-icon-7-stroke.css',
        'lib/css/animate.css',
        'lib/css/plugins.css',
        'lib/css/style.css',
        'css/site.css',
    ];
    public $js = [
        'lib/js/jquery.min.js',
        'js/jquery.pjax.js',
        'lib/bootstrap/js/bootstrap.min.js',
        'lib/js/owl-carousel.js',
        'lib/js/plugins.js',
        'lib/js/init.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}