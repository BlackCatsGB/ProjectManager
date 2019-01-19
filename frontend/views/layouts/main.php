<?php

/* @var $this \yii\web\View */

/* @var $content string */

use frontend\assets\MaterializeAsset;
use yii\helpers\Html;

//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
use macgyer\yii2materializecss\widgets\navigation\Nav;
use macgyer\yii2materializecss\widgets\navigation\NavBar;
use macgyer\yii2materializecss\widgets\navigation\Breadcrumbs;
use frontend\assets\AppAsset;
//use common\widgets\Alert;
use macgyer\yii2materializecss\widgets\Alert;

//MaterializeAsset::register($this);
//AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header class="page-header">
    <?php
    NavBar::begin([
        'brandLabel' => 'Project manager ++',
        'brandUrl' => Yii::$app->homeUrl,
        'fixed' => true,
        'renderSidenav' => false,
        'wrapperOptions' => [
            'class' => 'container'
        ],
    ]);

    $menuItems = [
        ['label' => 'TEST MATERIALIZE FORMS', 'url' => ['/dict-project-stages2']],
        ['label' => 'Demand', 'url' => ['/demand']],
        ['label' => 'Project', 'url' => ['/project']],
        ['label' => 'Task', 'url' => ['/task']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'waves-effect waves-light btn-large white-text']
            )
            . Html::endForm()
            . '</li>';
    }

    echo Nav::widget([
        'options' => ['class' => 'right'],
        'items' => $menuItems,
    ]);

    NavBar::end();
    ?>
</header>
<div class="wrap">


    <div class="container_my">
        <main class="content">
            <div class="container-fluid">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'containerOptions' => ['class' => 'red lighten-3'],
                    'options' => ['class' => 'container'],
                ]) ?>

                <?= Alert::widget() ?>

                <?= $content ?>
            </div>
        </main>
    </div>

</div>

<footer class="footer page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer
                    content.</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            &copy; My Company <?= date('Y') ?>
            <?= Yii::powered() ?>
        </div>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
