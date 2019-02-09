<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class ProjectDemandsAsset extends AssetBundle
{
    public $sourcePath = '@frontend/assets/ProjectDemands';

    public $css = [
        //'project_demands.css',
    ];
    public $js = [
        'project_demands.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];


}
