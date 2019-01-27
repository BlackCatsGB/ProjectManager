<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TaskModel */

$this->title = 'Create task';
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-model-create">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <div class="task-model-index row">
        <div class="left_panel">left_panel</div>
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
        <div class="right_panel">right_panel</div>
    </div>

</div>
