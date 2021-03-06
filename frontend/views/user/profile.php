<?php

use common\models\User;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Profile: ' . $model->username;
$this->params['breadcrumbs'][] = 'Profile';
?>
<div class="user-update container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
