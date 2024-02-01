
<?php

/** @var yii\web\View $this */

use app\assets\AppAsset;
use app\models\Stock;
use MongoDB\BSON\ObjectId;
use yii\mongodb\ActiveRecord;
use yii\validators\BooleanValidator;
use yii\validators\NumberValidator;
use yii\validators\StringValidator;

$this->title = 'Три товарищащ';
?>
<div class="site-index">



    <div class="body-content">

        <div class="name">
            <img src="<?= AppAsset::register($this)->baseUrl."/
            sas/logo.png"?>" style="height: 200px; width: 200px; margin-bottom: 50px;">
            <h1>ТРИ ТОВАРИЩА</h1>
            <h2>РЕМОНТ АВТОМОБИЛЕЙ</h2>
            <div class="media">
                <a href="http://facebook.com"><img src="<?= AppAsset::register($this)->baseUrl."/sas/fb-logo.png"?>" style="height: 45px; width: 45px; border-radius: 100%; margin: 15px;"></a>
                <a href="http://vk.com"><img src="<?= AppAsset::register($this)->baseUrl."/sas/vk-logo.png"?>" style="height: 45px; width: 45px; border-radius: 100%; margin: 15px;"></a>
                <a href="http://instagram.com"><img src="<?= AppAsset::register($this)->baseUrl."/sas/insta-logo.png"?>" style="height: 45px; width: 45px; border-radius: 100%; margin: 15px;"></a>
            </div>
        </div>
    </div>
    <div class="service">
        <h3>УСЛУГИ</h3>
        <div class="servline"></div>
        <div class="servtypes">
            <div class="servtype">
                <img src="sas/fix.png">
                <h4>РЕМОНТ</h4>
                Это текст. Кликните дважды, чтобы отредактировать
            </div>
            <div class="servtype">
                <img src="sas/skin.png">
                <h4>ОБШИВКА</h4>
                Это текст. Кликните дважды, чтобы отредактировать.
            </div>
            <div class="servtype">
                <img src="sas/paint.png">
                <h4>ПОКРАСКА</h4>
                Это текст. Кликните дважды, чтобы отредактировать.
            </div>
        </div>
    </div>
    <div class = "works">
        <h3>НАШИ РАБОТЫ</h3>
        <div class="hline" style="background-color: grey"></div> <br>
        <h4>Коллекция автомобилей, преобразившихся благодаря нам</h4><br>
        <div class="workstable">
            <div class="workline">
                <img src="sas/6_0.jpg" width="426px" height="320px">
                <img src="sas/6_0.jpg" width="426px" height="320px">
                <img src="sas/6_0.jpg" width="426px" height="320px">
            </div>
            <div class="workline">
                <img src="sas/6_0.jpg" width="426px" height="320px">
                <img src="sas/6_0.jpg" width="426px" height="320px">
                <img src="sas/6_0.jpg" width="426px" height="320px">
            </div>
        </div>
    </div>
    <div class="about">
        <div class="aboutins">
            <h3>О НАС</h3><br>
            <div class="hline" style="background-color: grey"></div><br>
            <h4>Это текст. Нажмите один раз и выберите «Редактировать текст» или просто кликните дважды, чтобы добавить свое содержание и настроить шрифт. Текстовый блок можно перетащить в любое место на странице.

                <br>

                Используйте эту возможность, чтобы выгодно представить себя и свою компанию клиентам. Расскажите интересную историю, например, как вам в голову пришла идея собственного дела, и объясните, в чем заключается ваше преимущество перед конкурентами.</h4>
        </div>
    </div>
    <div class="abyss">


    <div class="formsthing">
        <img src="sas/car3.webp">
        imagine there are things here
    </div>

    </div>
</div>
