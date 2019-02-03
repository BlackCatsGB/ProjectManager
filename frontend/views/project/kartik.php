<?php

use kartik\form\ActiveForm;
use kartik\builder\TabularForm;
use kartik\grid\GridView;
use kartik\helpers\Html;
use kartik\widgets\SwitchInput;

/* @var $model common\models\ProjectModel */
?>
<div class="container project-model-index">
    <?php
    $form = ActiveForm::begin();
    $attribs = $model->getFormAttribs();
    $attribs ['active'] = array(
        'type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => SwitchInput::classname(),
    );

    echo TabularForm::widget([
        'dataProvider' => $dataProvider,
        'form' => $form,
        'attributes' => $attribs,
        'gridSettings' => [
            'condensed' => true,
            'floatHeader' => true,
            'panel' => [
                'heading' => '<i class="fas fa-project-diagram"></i> Manage projects',
                'before' => false,
                'type' => GridView::TYPE_PRIMARY,
                'after' =>
                    Html::button('<i class="fas fa-plus"></i> Add New', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create']) . ' ' .
                    Html::button('<i class="fas fa-times"></i> Delete', ['type' => 'button', 'class' => 'btn btn-danger kv-batch-delete']) . ' ' .
                    Html::button('<i class="fas fa-save"></i> Save', ['type' => 'button', 'class' => 'btn btn-primary kv-batch-save',
                        'formaction'=>'/project/kartik-update',
                        'formmethod'=>'post',
                    ])
            ]
        ],
    ]);
    // Add other fields if needed or render your submit button
    echo '<div class="text-right">' .
        Html::submitButton('Submit', ['class' => 'btn btn-primary']) .
        '<div>';
    ActiveForm::end();
    ?>
</div>

