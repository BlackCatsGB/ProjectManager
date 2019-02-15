<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form \yii\bootstrap\ActiveForm */
?>

<div class="user-form container">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-1',
                'offset' => 'col-sm-offset-4',
                'wrapper' => 'col-sm-3',
                'error' => '',
                'hint' => '',
            ],
        ],
        'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php /**echo $form->field($model, 'status')->textInput() */ ?>

    <div>
        <?= Html::img($model->getThumbUploadUrl('avatar', User::AVATAR_PREVIEW), ['class' => 'col-sm-offset-1']) ?>
        <?= Html::img($model->getThumbUploadUrl('avatar', User::AVATAR_ICO_BIG), ['class' => '']) ?>
        <?= Html::img($model->getThumbUploadUrl('avatar', User::AVATAR_ICO), ['class' => '']) ?>
        <?= Html::img($model->getThumbUploadUrl('avatar', User::AVATAR_ICO_MIN), ['class' => '']) ?>
    </div><br>
    <div>
        <?= $form->field($model, 'avatar')->fileInput(['accept' => 'image/*', 'class' => 'flex'])->label('Icon')
        /*->label(Html::img($model->getThumbUploadUrl('avatar', User::AVATAR_ICO))) */ ?>
    </div>
    <?php //echo Html::img($model->getThumbUploadUrl('avatar', User::AVATAR_ICO), ['class' => 'col-sm-offset-3']); ?>

    <?= $form->field($model, 'email') ?>
    <?php /**echo $form->field($model, 'status')->dropDownList(User::STATUSES; //пользователь не может себя выключить */ ?>


    <div class="form-group">
        <div class="col-sm-offset-5">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
