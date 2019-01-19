<?php

use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\DictProjectStagesSearch2 */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project stages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dict-project-stages-index container">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create project stage', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'ord',

            ['class' => 'macgyer\yii2materializecss\widgets\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
