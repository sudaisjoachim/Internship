<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        'css/_all-skins.min.css',
        'css/AdminLTE.min.css',
        'css/bootstrap.min.css',
        'css/bootstrap.css',
        'css/font-awesome.min.css',
        'css/morris.css',
    ];

    public $js = [

        'js/bootstrap.min.js',
        'js/dashboard.js',
        'js/demo.js',
        'js/jquery.knob.min.js',
        'js/jquery.min.js',
        'js/jquery-ui.min.js',
        'js/main.js',
        'js/moment.min.js',
        'js/morris.min.js',
        'js/raphael.min.js',

    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',

    ];
}