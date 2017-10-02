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
//        'css/bootstrap3-wysihtml5.min.css',
//        'css/bootstrap-datepicker.min.css',
//        'css/daterangepicker.css',
        'css/font-awesome.min.css',
        'css/ionicons.min.css',
        'css/jquery-jvectormap.css',
        'css/morris.css'
    ];

    public $js = [


        'js/adminlte.min.js',
        'js/bootstrap.min.js',
        'js/bootstrap3-wysihtml5.all.min.js',
        'js/bootstrap-datepicker.min.js',
        'js/dashboard.js',
        'js/daterangepicker.js',
        'js/demo.js',
        'js/fastclick.js',
        'js/jquery.knob.min.js',
        'js/jquery.min.js',
        'js/jquery.slimscroll.min.js',
        'js/jquery.sparkline.min.js',
        'js/jquery-jvectormap-1.2.2.min.js',
        'js/jquery-jvectormap-world-mill-en.js',
        'js/jquery-ui.min.js',
        'js/main.js',
        'js/moment.min.js',
        'js/morris.min.js',
        'js/raphael.min.js'

    ];
    public $img = [

        'dist/img/avatar.png',
        'dist/img/avatar2.png',
        'dist/img/avatar3.png',
        'dist/img/avatar04.png',
        'dist/img/avatar5.png',
        'dist/img/boxed-bg.jpg',
        'dist/img/boxed-bg.png',
        'dist/img/default-50x50.gif',
        'dist/img/icons.png',
        'dist/img/photo1.png',
        'dist/img/photo2.png',
        'dist/img/photo3.jpg',
        'dist/img/photo4.jpg',
        'dist/img/user1-128X128.jpg',
        'dist/img/user2-160X160.jpg',
        'dist/img/user3-128X128.jpg',
        'dist/img/user4-128X128.jpg',
        'dist/img/user5-128X128.jpg',
        'dist/img/user6-128X128.jpg',
        'dist/img/user7-128X128.jpg',
        'dist/img/user8-128X128.jpg',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset'

    ];
}