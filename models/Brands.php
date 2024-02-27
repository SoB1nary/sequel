<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "brands".
 *
 * @property int $id
 * @property string $name
 *
 * @property CarModel[] $carModels
 * @property Stock[] $stocks
 */
class Brands extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brands';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * Gets query for [[CarModels]].
     *
     * @return \yii\db\ActiveQuery|CarModelQuery
     */
    public function getCarModels()
    {
        return $this->hasMany(CarModel::class, ['brand_id' => 'id']);
    }

    /**
     * Gets query for [[Stocks]].
     *
     * @return \yii\db\ActiveQuery|StockQuery
     */
    public function getStocks()
    {
        return $this->hasMany(Stock::class, ['brand_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return BrandsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BrandsQuery(get_called_class());
    }
}
