<?php

use app\models\Stock;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */



$this->title = Yii::t('app', 'Stocks');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="stock-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Stock'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'stock_id',
            [
                'attribute'=>'name_'.$suffix,
                'format'=>'raw',
            ],
            ['attribute'=> 'categoriesOfStock',
                'format'=>'raw',
                'contentOptions'=>['class'=>'text-center align-mode'],
                'headerOptions'=>['class'=>'text-center align-mode'],
                'value'=> static function(Stock $model)use ($suffix) {
                    $cur_gen =[];
                    foreach ($model->categoriesOfStock as $cat)  {
                        $cur_gen['en'][] = $cat->getCategories()->one()->name_en;
                        $cur_gen['ru'][] = $cat->getCategories()->one()->name_ru;
                        $cur_gen['kz'][] = $cat->getCategories()->one()->name_kz;
                    }
                    return implode(', ', $cur_gen[$suffix]??[]);
                }],
            //'amount',
            //'created_at',
            //'updated_at',
            //'available',
            //'brand_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Stock $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
