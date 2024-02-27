<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property int $id
 * @property int $stock_id
 * @property string $name_ru
 * @property string|null $name_kz
 * @property string|null $name_en
 * @property int|null $amount
 * @property string $created_at
 * @property string $updated_at
 * @property int|null $available
 * @property int|null $brand_id
 *
 * @property Brand $brand
 * @property CategoriesOfStock[] $categoriesOfStocks
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stock_id', 'name_ru', 'created_at', 'updated_at'], 'required'],
            [['stock_id', 'amount', 'available', 'brand_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name_ru', 'name_kz', 'name_en'], 'string', 'max' => 255],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::class, 'targetAttribute' => ['brand_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'stock_id' => Yii::t('app', 'Stock ID'),
            'name_ru' => Yii::t('app', 'Name Ru'),
            'name_kz' => Yii::t('app', 'Name Kz'),
            'name_en' => Yii::t('app', 'Name En'),
            'amount' => Yii::t('app', 'Amount'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'available' => Yii::t('app', 'Available'),
            'brand_id' => Yii::t('app', 'Brand ID'),
        ];
    }

    /**
     * Gets query for [[Brand]].
     *
     * @return \yii\db\ActiveQuery|BrandQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }

    /**
     * Gets query for [[CategoriesOfStocks]].
     *
     * @return \yii\db\ActiveQuery|CategoriesOfStockQuery
     */
    public function getCategoriesOfStocks()
    {
        return $this->hasMany(CategoriesOfStock::class, ['stock_id' => 'stock_id']);
    }

    /**
     * {@inheritdoc}
     * @return StockQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StockQuery(get_called_class());
    }
}
