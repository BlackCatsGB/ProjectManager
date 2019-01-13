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
        'main.384e8faa742b6ed1102a.css',
    ];
    public $js = [
        'bundle.384e8faa742b6ed1102a.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
