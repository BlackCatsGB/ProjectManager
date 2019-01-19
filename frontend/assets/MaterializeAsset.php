<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MaterializeAsset extends AssetBundle
{
    public $sourcePath = '@frontend/assets/Materialize';

    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $css = [
        'materialize.min.css',
    ];
    public $js = [
        'materialize.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
