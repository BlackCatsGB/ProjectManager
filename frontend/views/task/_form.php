<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TaskModel */
/* @var $form yii\widgets\ActiveForm */

$projects = \common\models\ProjectModel::find()
    ->byUser(Yii::$app->user->identity, \common\models\ProjectUserModel::ROLE_MANAGER)//задачи можно прикрепить только к проектам, где пользователь - менеджер
    ->select('title')
    ->indexBy('id')
    ->column();
?>

<div class="task-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <ul class="nav nav-tabs" id="userTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#projects-tab" role="tab">Содержание</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#invites-tab" role="tab">Участники <span class="badge badge-primary badge-pill">7</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#settings-tab" role="tab">Результат</a>
        </li>
    </ul>

    <div id="part_general" class="active">
        <div class="head-top">
            <div class="head-left">
                <div class="area-author">
                    <div class="txt-status">Project:</div>
                    <div class="txt-value"><?= $model->getProjectById($model->project_id)[0]['title'] ?></div>
                </div>
                <div class="area-name">
                    <div class="txt-status">Title:</div>
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'name' => 'task_name', 'class' => 'form-control', 'id' => 'inputTaskName', 'placeholder' => 'Название задачи'])->label(false)?>
                </div>
                <div class="area-type">
                    <div class="txt-status">Task type:</div>
                    <?php
                    $types = $model->getArrTypes();
                    $arr_types = [];
                    foreach ($types as $type) {
                        $arr_types[$type->id] = $type->name;
                    };
                    echo $form->field($model, 'type_id')->dropDownList($arr_types)->label(false)
                    ?>
                </div>
            </div>
            <div class="head-right">
                <div class="area-status">
                    <div class="txt-status">Status:</div>
                    <?php
                        $statuses = $model->getArrStatuses();
                        $arr_status = [];
                        foreach ($statuses as $status) {
                            $arr_status[$status->id] = $status->name;
                        };
                        echo $form->field($model, 'status_id')->dropDownList($arr_status)->label(false)
                    ?>

                </div>
                <div class="area-dateline">
                    <div class="txt-status">Deadline:</div>
                    <?= $form->field($model, 'deadline')->textInput(['name' => 'task_dateline', 'class' => 'form-control', 'id' => 'inputTaskDateline', 'type' => 'date'])->label(false)?>
                </div>
                <?php
                    if (!$model->isNewRecord) {
                ?>
                        <div class="area-author">
                            <div class="txt-status">Author:</div>
                            <div class="txt-value"><?= $model->created_at ?> (<?= $model->getUserById($model->created_at)[0]['username'] ?>, <?= $model->getUserById($model->created_at)[0]['email'] ?>)</div>
                        </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <br>
        <div class="head-second">
            <div class="txt-status">Description:</div>
            <?= $form->field($model, 'description')->textarea(['name' => 'task_description', 'class' => 'form-control-full', 'id' => 'inputTaskDescription'])->label(false)?>
        </div>

        <div class="line_separate_main"></div>

        <div class="subtitle"><h3>Решение</h3></div>
        <div class="process_table">
            <div class="font_Title">
                <div class="pr_number">№</div>
                <div class="pr_idea">Идея</div>
                <div class="pr_author">Автор</div>
                <div class="pr_date">Дата добавления</div>
                <div class="pr_delete"></div>
            </div>
            <div class="line_separate"></div>
            <div class="process_row">
                <input type="hidden" name="idea_id" value=1 class="idea_id">
                <div class="pr_number">
                    <div class="idea_number_value"> 1 </div>
                </div>
                <a href="/" class="area_href"><div class="pr_idea area_href">
                        <div class="idea_number_value"> Моя идея </div>
                        <i class="fa fa-id-card-o idea_open"></i>
                    </div></a>
                <div class="pr_author">
                    <div class="idea_number_value">Черняков С.И.</div>
                </div>
                <div class="pr_date">
                    <div class="idea_number_value"> 01.10.2017 16:41:00 </div>
                </div>
                <div class="pr_delete">
                    <i class="fa fa-times-circle idea_delete"></i>
                </div>
            </div>

            <div class="line_separate"></div>
            <div id="idea_add" class="pr_add">
                <i class="fa-plus-square idea_add"></i>
            </div>
        </div>

        <div class="line_separate_main"></div>

        <h3 class="subtitle">Коментарии</h3>
        <div class="process_table">
            <div class="current_comment">
                <div class="comment_avatar">
                    <img src="../project/img/avatar.jpg" class="avatar_pic">
                </div>
                <div class="comment_content">
                    <div class="comment_author">Черняков Станислав:</div>
                    <div class="comment__message">
                        <textarea name="comment_new" class="comment_text" id="inputComment_new">Мой комментарий</textarea>
                    </div>
                    <div id="msg_add" class="comment_add">
                        <i class="fa fa-plus-square msg_add"></i>
                    </div>
                </div>
            </div>
            <div class="line_separate"></div>
            <div class="comment_row">
                <input type="hidden" name="comment_id" value=1 class="comment_id">
                <div class="comment_avatar">
                    <img src="../project/img/avatar.jpg" class="avatar_pic">
                </div>
                <div class="comment_content">
                    <div class="comment__message">
                        <div class="comment_author">[08.10.2017 17:45:00] Черняков Станислав:</div>
                        <div class="comment_delete">
                            <i class="fa fa-times-circle msg_delete"></i>
                        </div>
                    </div>
                    <div class="comment__message">
                        <div class="comment_text">Мой комментарий</div>
                    </div>
                </div>
            </div>
            <div class="line_separate"></div>
            <div class="comment_row">
                <input type="hidden" name="comment_id" value=2 class="comment_id">
                <div class="comment_avatar">
                    <img src="../project/img/avatar.jpg" class="avatar_pic">
                </div>
                <div class="comment_content">
                    <div class="comment__message">
                        <div class="comment_author">[08.10.2017 17:00:00] Черняков Станислав:</div>
                        <div class="comment_delete">
                            <i class="fa fa-times-circle msg_delete"></i>
                        </div>
                    </div>
                    <div class="comment__message">
                        <div class="comment_text">Мой комментарий первый Мой комментарий первый Мой комментарий первый Мой комментарий первый Мой комментарий первый Мой комментарий первый Мой комментарий первый Мой комментарий первый Мой комментарий первый </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
