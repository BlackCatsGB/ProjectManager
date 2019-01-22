<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class DemandsAsset extends AssetBundle
{
    public $sourcePath = '@frontend/assets/DemandApp';

    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $css = [
        'react_demands.css',
    ];
    public $js = [
        'react_demands.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
