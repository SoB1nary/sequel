
<?php

/** @var yii\web\View $this */

use app\assets\AppAsset;


use yii\validators\BooleanValidator;
use yii\validators\NumberValidator;
use yii\validators\StringValidator;
use kartik\select2\Select2;
use app\models\Countries;
use app\models\Colors;


$this->title = Yii::t('app','Три товрища');

?>
<div class="site-index">



    <div class="body-content">

        <div class="name">
            <img src="<?= AppAsset::register($this)->baseUrl."/sas/logo.png"?>" style="height: 200px; width: 200px; margin-bottom: 50px;">
            <h1><?=Yii::t('app', 'ТРИ ТОВАРИЩА')?></h1>
            <h2><?=Yii::t('app', 'РЕМОНТ АВТОМОБИЛЕЙ')?></h2>
            <div class="media">
                <a href="http://facebook.com"><img src="<?= AppAsset::register($this)->baseUrl."/sas/fb-logo.png"?>" style="height: 45px; width: 45px; border-radius: 100%; margin: 15px;"></a>
                <a href="http://vk.com"><img src="<?= AppAsset::register($this)->baseUrl."/sas/vk-logo.png"?>" style="height: 45px; width: 45px; border-radius: 100%; margin: 15px;"></a>
                <a href="http://instagram.com"><img src="<?= AppAsset::register($this)->baseUrl."/sas/insta-logo.png"?>" style="height: 45px; width: 45px; border-radius: 100%; margin: 15px;"></a>
            </div>
        </div>
    </div>

    <div class="service">
        <h3><?=Yii::t('app', 'УСЛУГИ')?></h3>
        <div class="servline"></div>
        <div class="servtypes">
            <div class="servtype">
                <img src="/sas/fix.png">
                <h4><?=Yii::t('app', 'РЕМОНТ')?></h4>
                <?=Yii::t('app', 'Это текст. Кликните дважды, чтобы отредактировать')?>
            </div>
            <div class="servtype">
                <img src="/sas/skin.png">
                <h4><?=Yii::t('app', 'ОБШИВКА')?></h4>
                <?=Yii::t('app', 'Мы обшиваем сидення')?>
            </div>
            <div class="servtype">
                <img src="/sas/paint.png">
                <h4><?=Yii::t('app', 'ПОКРАСКА')?></h4>
                <?=Yii::t('app', 'Мы красем машины.')?>
            </div>
        </div>
    </div>
    <div class = "works">
        <h3><?=Yii::t('app', 'НАШИ РАБОТЫ')?></h3>
        <div class="hline" style="background-color: grey"></div> <br>
        <h4><?=Yii::t('app', 'Коллекция автомобилей, преобразившихся благодаря нам')?></h4><br>
        <div class="workstable">
            <div class="workline">
                <img src="/sas/6_0.jpg" width="426px" height="320px">
                <img src="/sas/6_0.jpg" width="426px" height="320px">
                <img src="/sas/6_0.jpg" width="426px" height="320px">
            </div>
            <div class="workline">
                <img src="/sas/6_0.jpg" width="426px" height="320px">
                <img src="/sas/6_0.jpg" width="426px" height="320px">
                <img src="/sas/6_0.jpg" width="426px" height="320px">
            </div>
        </div>
    </div>
    <div class="about">
        <div class="aboutins">
            <h3><?=Yii::t('app', 'О НАС')?></h3><br>
            <div class="hline" style="background-color: grey"></div><br>
            <h4><?=Yii::t('app', 'Это текст. Нажмите один раз и выберите «Редактировать текст» или просто кликните дважды, чтобы добавить свое содержание и настроить шрифт. Текстовый блок можно перетащить в любое место на странице.')?>

                <br>

                <?=Yii::t('app', 'Используйте эту возможность, чтобы выгодно представить себя и свою компанию клиентам. Расскажите интересную историю, например, как вам в голову пришла идея собственного дела, и объясните, в чем заключается ваше преимущество перед конкурентами.')?></h4>
        </div>
    </div>
    <div class="abyss">


    <div class="formsthing">
        <img src="/sas/car3.webp">
        imagine there are things here
    </div>

    </div>
</div>
