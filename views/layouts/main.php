<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Button;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\Dropdown;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;


AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<header>

    <?php
    NavBar::begin(['class'=>'hatbuttons']);
    echo Nav::widget(
        ['items' =>
            [['label' => 'Home',
                'url' => ['site/index'],
                'linkOptions' => ['style' => 'color: #FFFFFF;'],
            ],
                ['label' => 'Dropdown',
                    'items' => [
                        ['label' => 'English', 'url' => array_merge(Yii::$app->request->get(), [Yii::$app->controller->getRoute(), 'language' => 'en'])],
                        ['label' => 'Казакша', 'url' => array_merge(Yii::$app->request->get(), [Yii::$app->controller->getRoute(), 'language' => 'kz'])],
                        ['label' => 'Русский', 'url' => array_merge(Yii::$app->request->get(), [Yii::$app->controller->getRoute(), 'language' => 'ru'])],
                        ],
                    'linkOptions' => ['style' => 'color: #FFFFFF;'],
                    ],
                ['label' => 'Login',
                'url' => ['site/login'],
                'visible' => Yii::$app->user->isGuest],
                ],

            'options' => ['class' => 'navbar-nav hatbuttons'],
        ]);
        NavBar::end();
?>
</header>
<!--<header id="header">-->
<!--    --><?php
//    NavBar::begin([
//        'brandLabel' => Yii::$app->name,
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
//    ]);
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav'],
//        'items' => [
//            ['label' => 'Home', 'url' => ['/site/index']],
//            ['label' => 'About', 'url' => ['/site/about']],
//            ['label' => 'Contact', 'url' => ['/site/contact']],
//            Yii::$app->user->isGuest
//                ? ['label' => 'Login', 'url' => ['/site/login']]
//                : '<li class="nav-item">'
//                    . Html::beginForm(['/site/logout'])
//                    . Html::submitButton(
//                        'Logout (' . Yii::$app->user->identity->username . ')',
//                        ['class' => 'nav-link btn btn-link logout']
//                    )
//                    . Html::endForm()
//                    . '</li>'
//        ]
//    ]);
//    NavBar::end();
//    ?>
<!--</header>-->

<main id="main" class="flex-shrink-0" role="main">
<!--    <div class="container">-->
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
<!--    </div>-->
</main>

<!--<footer id="footer" class="mt-auto py-3 bg-light">-->
<!--    <div class="container">-->
<!--        <div class="row text-muted">-->
<!--            <div class="col-md-6 text-center text-md-start">&copy; My Company --><?php //= date('Y') ?><!--</div>-->
<!--            <div class="col-md-6 text-center text-md-end">--><?php //= Yii::powered() ?><!--</div>-->
<!--        </div>-->
<!--    </div>-->
<!--</footer>-->
<!--<footer>-->
<!--    <div class="media">-->
<!--    <a href="http://facebook.com"><img src="--><?php //= AppAsset::register($this)->baseUrl.'/sas/fb-logo.png'?><!--" style="height: 30px; width: 30px; border-radius: 100%; margin: 7px;"></a>-->
<!--    <a href="http://vk.com"><img src="--><?php //= AppAsset::register($this)->baseUrl.'/sas/vk-logo.png'?><!--" style="height: 30px; width: 30px; border-radius: 100%; margin: 7px;"></a>-->
<!--    <a href="http://instagram.com"><img src="--><?php //= AppAsset::register($this)->baseUrl.'/sas/insta-logo.png'?><!--" style="height: 30px; width: 30px; border-radius: 100%; margin: 7px;"></a><br>-->
<!--    </div>-->
<!--    <p>© 2035 «Три товарища». Сайт создан вручную. помогите</p>-->
<!--</footer>-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
