<?php

use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DictProjectStages */
/* @var $form macgyer\yii2materializecss\widgets\form\ActiveForm */
?>

<div class="dict-project-stages-form container">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ord')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
