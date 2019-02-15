<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Demands */
/* @var $form yii\widgets\ActiveForm */
/* @var $is_group boolean */
?>

<div class="demands-form container">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'id_parent')->textInput(); ?>

    <?php
    if ($is_group === false) echo $form->field($model, 'id_parent')->dropDownList(\common\models\Demands::getGroups())->label('Group name');
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
