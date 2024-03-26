<?php

use app\models\Categories;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2;
use app\models\Brands;

/** @var yii\web\View $this */
/** @var app\models\forms\StockCreateForm $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="stock-form">

    <?php $form = ActiveForm::begin();
    $brands=ArrayHelper::map(Brands::find()->all(), 'id', 'name');
    $categories=ArrayHelper::map(Categories::find()->all(), 'id', 'name_ru');
    ?>

    <?= $form->field($model, 'stock_id')->textInput() ?>

    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_kz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'desc')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'available')->textInput() ?>

    <?= $form->field($model, 'categoriesOfStock')->widget(select2\Select2::classname(), [
            'data'=>$categories,
            'options'=>[
                    'multiple'=>true,
                    'placeholder'=>'тегории'],
            'pluginOptions'=>[
                    'allowClear'=>true,
            ],
        ]) ?>

    <?= $form->field($model, 'brand_id')->widget(select2\Select2::className(), [
            'data'=>$brands,
            'options'=>['placeholder'=> Yii::t('app', 'Выберите бренд...')],

    ]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
