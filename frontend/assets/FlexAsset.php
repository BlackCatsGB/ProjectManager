<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class FlexAsset extends AssetBundle
{
    public $sourcePath = '@frontend/assets/Flex';

    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $css = [
        'flex.css',
    ];
    public $js = [];

    public $depends = [];
}
