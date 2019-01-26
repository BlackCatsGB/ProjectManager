<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RBAC\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'type')->hiddenInput(['value' => 2])->label(false); ?>

    <?php echo $form->field($model, 'description')->textarea(['rows' => 6]); ?>

    <?php //echo  $form->field($model, 'rule_name')->textInput(['maxlength' => true]); ?>

    <?php //echo  $form->field($model, 'data')->textInput(); ?>

    <?php //echo  $form->field($model, 'created_at')->textInput(); ?>

    <?php //echo $form->field($model, 'updated_at')->textInput(); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
