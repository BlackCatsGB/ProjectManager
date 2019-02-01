<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Demands */

$this->title = 'Create Demands';
$this->params['breadcrumbs'][] = ['label' => 'Demands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demands-create container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
