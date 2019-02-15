<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Demands */
/* @var $is_group boolean */

if ($is_group) $this->title = 'Create group';
else $this->title = 'Create demand';
$this->params['breadcrumbs'][] = ['label' => 'Demands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demands-create container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'is_group'=>$is_group,
    ]) ?>

</div>
