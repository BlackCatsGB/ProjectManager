<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProjectUser2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-user2-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_id')->dropDownList($model->getProjects()) ?>

    <?= $form->field($model, 'user_id')->dropDownList($model->getUsers()) ?>

    <?php //echo $form->field($model, 'role')->textInput(); ?>

    <?php //echo $form->field($model, 'fk_project_role')->textInput(); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
