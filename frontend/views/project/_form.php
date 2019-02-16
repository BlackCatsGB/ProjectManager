<?php

use common\models\ProjectUserModel;
use unclead\multipleinput\MultipleInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProjectModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php //echo $form->field($model, 'active')->dropDownList(\common\models\ProjectModel::STATUSES); ?>

    <?php //echo $form->field($model, 'fk_customer')->dropDownList($model->getUsers()); ?>

    <?php //echo $form->field($model, 'fk_project_manager')->dropDownList($model->getUsers()); ?>

    <?php //echo $form->field($model, 'fk_analyst')->dropDownList($model->getUsers()); ?>

    <?php //echo $form->field($model, 'fk_inspector')->dropDownList($model->getUsers()); ?>

    <?php
    //если вызвано обновление записи о проекте

    if (!$model->isNewRecord && -1==1) {
        echo $form->field($model, \common\models\ProjectModel::RELATION_PROJECT_USERS)->widget(MultipleInput::className(), [
            'id' => 'project-users-widget',
            'max' => 6,
            'min' => 0,
            'allowEmptyList' => true,
            'enableGuessTitle' => true,
            'addButtonPosition' => MultipleInput::POS_HEADER, // show add button in the header
            'columns' => [
                /**[
                 * 'name' => 'user_name',
                 * 'type' => \unclead\multipleinput\MultipleInputColumn::TYPE_STATIC,
                 * 'value' => function ($data) {
                 * return $data ? Html::a($data->user->username, ['user/view', 'id' => $data->user_id]) : '';
                 * }
                 * ],*/
                [
                    'name' => 'project_id',
                    'type' => 'hiddenInput',
                    'defaultValue' => $model->id,
                ],
                [
                    'name' => 'user_id',
                    'type' => 'dropDownList',
                    'title' => 'Username',
                    'items' => $model->getUsers(),
                ],
                /*[
                    'name' => 'role',
                    'type' => 'dropDownList',
                    'title' => 'Role by list',
                    'items' => ProjectUserModel::ROLES,
                ],*/
                /*[
                    'name' => 'role',
                    'type' => 'hiddenInput',
                    'title' => 'Role',
                    'defaultValue' => 'NULL',
                ],*/
                [
                    'name' => 'fk_project_role',
                    'type' => 'dropDownList',
                    'title' => 'Role in project',
                    'items' => $model->getRoles(),
                ],
            ],

        ]);
    }

    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
