<?php

//use Yii;
use common\models\ProjectModel;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use common\models\ProjectsOnStages;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $dataProviderProjectStages yii\data\ActiveDataProvider */
/* @var $dataProviderProjectStagesByUser yii\data\ActiveDataProvider */
/* @var $dataProviderStageTitle yii\data\ActiveDataProvider */
/* @var $fk_stage int */
/* @var $id int */

$this->title = 'Projects';

if ($fk_stage == -1) $this->params['breadcrumbs'][] = $this->title;
else {
    $this->params['breadcrumbs'][] = [
        'label' => $this->title,
        'url' => '/project'
    ];
    $this->params['breadcrumbs'][] = $dataProviderStageTitle->getModels()[0]['title'];
}
?>
<div class="row justify-content-md-center">
    <div class="col col-md-2">LEFT</div>
    <div class="col col-md-8">CENTER</div>
    <div class="col col-md-2">RIGHT</div>
</div>
