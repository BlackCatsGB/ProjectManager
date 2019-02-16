<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Demands */
/* @var $is_group boolean */

/*$this->title = 'Update Demand';
$this->params['breadcrumbs'][] = ['label' => 'Demands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';*/

const max_len = 74;

$this->title = 'Update demand';
$crumb = $model->id . '. ' . substr($model->text, 0, max_len);
if (strlen($model->text) > max_len) $crumb .= '..';
$this->params['breadcrumbs'][] = ['label' => 'Demands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $crumb, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="demands-update container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'is_group'=>$model->is_group,
    ]) ?>

</div>
