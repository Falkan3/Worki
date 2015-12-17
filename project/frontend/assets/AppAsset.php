<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $sourcePath='@bower/emmeline/';
    public $css = [
        'css/style.css',
        'css/magnific-popup.css',
        'css/slider.css',
        'css/lightbox.css'
    ];
    public $js = [
        'js/jquery.cslider.js',
        'js/modernizr.custom.28468.js',
        'js/jquery.wmuSlider.js',
        'js/nav.js',
        'js/jquery.magnific-popup.js',
        'js/jquery.min.js',
        'js/jquery.lightbox.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
