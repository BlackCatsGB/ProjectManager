<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class DemandsAsset extends AssetBundle
{
    //public $sourcePath = '@frontend/assets/DemandApp';

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'main.2aa74023e014dc8a8662.css',
    ];
    public $js = [
        'bundle.2aa74023e014dc8a8662.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
