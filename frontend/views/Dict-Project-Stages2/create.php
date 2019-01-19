<?php

use macgyer\yii2materializecss\lib\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DictProjectStages */

$this->title = 'Create project stage';
$this->params['breadcrumbs'][] = ['label' => 'Project stages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dict-project-stages-create container">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
