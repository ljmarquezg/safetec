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
    '/css/site.css',
    '/css/font-awesome.css',
    'css/bootstrap/css/bootstrap.min.css',
    '/css/bootstrap-datepicker3.css',
    '/css/bootstrap-select.min.css',
    '/css/toggle-switch.css',
    '/css/inputforms.css',
    /*'css/menu.css',*/
    '/css/gridview.css',
    '/css/ionicons.min.css',
    '/css/AdminLTE.min.css',
    '/css/skins/_all-skins.min.css',
    '/css/plugins/iCheck/flat/blue.css',
    '/css/plugins/morris/morris.css',
    '/css/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
    '/css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
    '/css/style.css',
    ];
    public $js = [
    'http://code.jquery.com/ui/1.11.2/jquery-ui.js',
    /*'/js/bootstrap-select.js',
    '/js/bootstrap-datepicker3',
    '/js/bootstrap-datepicker.min.js',*/
    '/js/bootstrap.js',
    '/js/window-beforeunload.js',
    '/js/modal.js',
    '/js/slider-checkbox.js',
    '/js/plugins/raphael/raphael2.1.0-min.js',
    '/js/plugins/morris/morris.min.js',
    '/js/plugins/sparkline/jquery.sparkline.min.js',
    '/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
    '/js/plugins/knob/jquery.knob.js',
    '/js/moment/moment2.11.2.min.js',
    '/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
    '/js/plugins/slimScroll/jquery.slimscroll.min.js',
    '/js/plugins/fastclick/fastclick.js',
    '/js/dist/app.min.js',
    '/js/cropbox.js',
    
    ];
    public $depends = [
    'yii\web\YiiAsset',
    //'yii\bootstrap\BootstrapAsset',
    ];
}
