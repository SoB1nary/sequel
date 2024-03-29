<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories_of_stock".
 *
 * @property int $id
 * @property int $stock_id
 * @property int $category_id
 *
 * @property Categories $category
 * @property Stock $stock
 */
class CategoriesOfStock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories_of_stock';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stock_id', 'category_id'], 'required'],
            [['stock_id', 'category_id'], 'integer'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['category_id' => 'id']],
            [['stock_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stock::class, 'targetAttribute' => ['stock_id' => 'stock_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'stock_id' => Yii::t('app', 'Stock ID'),
            'category_id' => Yii::t('app', 'Category ID'),
        ];
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery|CategoriesQuery
     */
    public function getCategories(): \yii\db\ActiveQuery|CategoriesQuery
    {
        return $this->hasOne(Categories::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Stock]].
     *
     * @return \yii\db\ActiveQuery|StockQuery
     */
    public function getStock()
    {
        return $this->hasOne(Stock::class, ['stock_id' => 'stock_id']);
    }

    /**
     * {@inheritdoc}
     * @return CategoriesOfStockQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoriesOfStockQuery(get_called_class());
    }

}
