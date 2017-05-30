<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [        
        'vendors/bootstrap/dist/css/bootstrap.min.css',
        //'vendors/iCheck/skins/flat/green.css',
        'vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css',
        'vendors/font-awesome/css/font-awesome.min.css',
       // 'css/maps/jquery-jvectormap-2.0.3.css',
        'css/custom.min.css'
       // 'css/font-awesome.min.css',
        //'css/dashboard.css',
    ];
    public $js = [     
       // "vendors/jquery/dist/jquery.min.js",
        "vendors/bootstrap/dist/js/bootstrap.min.js",
        'js/custom.js',
        "vendors/fastclick/lib/fastclick.js",
        // "vendors/jquery/dist/jquery.min.js",
        //"vendors/bootstrap/dist/js/bootstrap.min.js",
        //'js/custom.js',
        'js/country.js',
        //"vendors/fastclick/lib/fastclick.js",
        'vendors/laydate/laydate.js',
        'vendors/jquery.cookie.js',
        'vendors/echarts.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
      //  'yii\bootstrap\BootstrapAsset',
    ];
}
