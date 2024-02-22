<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\forms\StockCreateForm $model */
/** @var ActiveForm $form */
?>
<div class="site-stockcreateform">

    <?php $form = ActiveForm::begin(); ?>

  <?php  $brandList = ArrayHelper::map(app\models\Brands::find()->all(), 'id','name');
    $colorList = ArrayHelper::map(app\models\Colors::find()->all(), 'id','name')?>
    <?= $form->field($model, 'stock_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand_id')->widget(Select2::classname(),[
        'data'=>$brandList,
        'options'=>[
            'placeholder' => 'Выберите бренд...'
        ]
    ]) ?>

    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'available')->textInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-stockcreateform -->
