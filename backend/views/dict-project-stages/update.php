<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DictProjectStages */

$this->title = 'Update project stage: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Dict Project Stages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dict-project-stages-update container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
