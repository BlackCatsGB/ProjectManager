<?php

//use Yii;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\ProjectModel;

use frontend\assets\DemandsAsset;

DemandsAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Demands';
$this->params['breadcrumbs'][] = $this->title;

//<div style="margin: 0px; padding: 0px" id="app"></div>
?>

<div id="app" class="home"></div>