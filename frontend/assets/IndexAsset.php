<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/7/17
 * Time: 11:34 PM
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class IndexAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        'css/font-awesome.min.css',
        'css/prettyPhoto.css',
        'css/price-range.css',
        'css/responsive.css',
        'css/bootstrap.min.css',
        'css/animate.css',
//        'css/site.css'

    ];
    public $js = [

        'js/jquery.prettyPhoto.js',
        'js/price-range.js',
        'js/jquery.scrollUp.min.js',
        'js/html5shiv.js',
        'js/jquery.js',
        'js/bootstrap.min.js',
        'js/gmaps.js',
        'js/contact.js',
        'js/main.js',


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
