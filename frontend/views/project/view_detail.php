<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProjectModel */

?>
<div class="project-model-view col-2">
    <h4>Short view of project:</h4>
    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'title',
            'description:ntext',
            ['attribute' => 'fkStage.title', 'label' => 'Stage',],
            ['attribute' => 'createdBy.username', 'label' => 'Creator',], //обращаемся к результату выполнения  метода getCreatedBy(), но через точку
            ['attribute' => 'updatedBy.username', 'label' => 'Updater',],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>
</div>
