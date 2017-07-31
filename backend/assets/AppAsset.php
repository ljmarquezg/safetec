<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/font-awesome.css',
        /*'css/bootstrap/css/bootstrap.min.css',*/
        'css/bootstrap-datepicker3.css',
        'css/bootstrap-select.min.css',
        'css/toggle-switch.css',
        'css/inputforms.css',
        /*'css/menu.css',*/
        'css/style.css',
        'css/gridview.css'
    ];
    public $js = [
        /*'js/bootstrap.js',*/
        'js/bootstrap-select.js',
        'js/bootstrap-datepicker3',
        'js/bootstrap-datepicker.min.js',
        'js/inputforms.js',
        'js/modal.js',
        /*'js/jquery1.12.4.min.js',*/
        /*js/jquery-ui1.12.1.min.js'*/
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
