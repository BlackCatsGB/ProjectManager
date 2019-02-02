<?php

use kartik\form\ActiveForm;
use kartik\builder\TabularForm;
use kartik\helpers\Html;
use kartik\widgets\SwitchInput;

/* @var $model common\models\ProjectModel */
?>
<div class="project-model-index container row">
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
        'gridSettings' => ['condensed' => true]
    ]);
    // Add other fields if needed or render your submit button
    echo '<div class="text-right">' .
        Html::submitButton('Submit', ['class' => 'btn btn-primary']) .
        '<div>';
    ActiveForm::end();
    ?>
</div>

