<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "colorsOfStock".
 *
 * @property int $id
 * @property int $stock_id
 * @property int $color_id
 *
 * @property Color $color
 * @property Stock $stock
 */
class ColorsOfStock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'colorsOfStock';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stock_id', 'color_id'], 'required'],
            [['stock_id', 'color_id'], 'integer'],
            [['color_id'], 'exist', 'skipOnError' => true, 'targetClass' => Color::class, 'targetAttribute' => ['color_id' => 'id']],
            [['stock_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stock::class, 'targetAttribute' => ['stock_id' => 'id']],
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
            'color_id' => Yii::t('app', 'Color ID'),
        ];
    }

    /**
     * Gets query for [[Color]].
     *
     * @return \yii\db\ActiveQuery|ColorQuery
     */
    public function getColor()
    {
        return $this->hasOne(Color::class, ['id' => 'color_id']);
    }

    /**
     * Gets query for [[Stock]].
     *
     * @return \yii\db\ActiveQuery|StockQuery
     */
    public function getStock()
    {
        return $this->hasOne(Stock::class, ['id' => 'stock_id']);
    }

    /**
     * {@inheritdoc}
     * @return ColorsOfStockQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ColorsOfStockQuery(get_called_class());
    }
}
