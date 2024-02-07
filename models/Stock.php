<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property int $id
 * @property string $name
 * @property string $brand
 * @property string $desc
 * @property string $amount
 * @property string $available
 * @property string $updated_at
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
            [['name', 'brand', 'desc', 'amount', 'available', 'updated_at'], 'required'],
            [['available', 'updated_at'], 'safe'],
            [['name', 'brand', 'desc', ], 'string', 'max' => 255],
            [['amount'], 'integer'],
            [['available'], 'boolean']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'brand' => Yii::t('app', 'Brand'),
            'desc' => Yii::t('app', 'Description'),
            'amount' => Yii::t('app', 'Amount'),
            'available' => Yii::t('app', 'Available'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
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
