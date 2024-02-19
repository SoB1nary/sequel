<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property int $id
 * @property string $name
 * @property int $brand_id
 * @property string|null $desc
 * @property int $amount
 * @property int $available
 * @property string $updated_at
 *
 * @property Brands $brand
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
            [['name', 'brand_id', 'amount', 'available', 'updated_at'], 'required'],
            [['brand_id', 'amount', 'available'], 'integer'],
            [['desc'], 'string'],
            [['updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::class, 'targetAttribute' => ['brand_id' => 'id']],
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
            'brand_id' => Yii::t('app', 'Brand ID'),
            'desc' => Yii::t('app', 'Desc'),
            'amount' => Yii::t('app', 'Amount'),
            'available' => Yii::t('app', 'Available'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Brand]].
     *
     * @return \yii\db\ActiveQuery|BrandsQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brands::class, ['id' => 'brand_id']);
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
