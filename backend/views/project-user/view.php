<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProjectUser2 */

$this->title = $model->user_id.$model->project_id;
$this->params['breadcrumbs'][] = ['label' => 'Project team', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-user2-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'project_id' => $model->project_id, 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'project_id' => $model->project_id, 'user_id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'project_id',
            'user_id',
            //'role',
            //'fk_project_role',
        ],
    ]) ?>

</div>
