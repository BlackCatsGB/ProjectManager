<?php

use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DictProjectStagesSearch2 */
/* @var $form macgyer\yii2materializecss\widgets\form\ActiveForm */
?>

<div class="dict-project-stages-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'ord') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
