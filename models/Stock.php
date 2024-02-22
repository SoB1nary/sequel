<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "stock".
 *
 * @property int $id
 * @property int $stock_id
 * @property string $name
 * @property string $desc
 * @property int $amount
 * @property int $brand_id
 * @property int $available
 * @property string $updated_at
 * @property string $created_at
 * @property array $raw_colors
 * @property Brands $brand
 */
class Stock extends \yii\db\ActiveRecord
{

    public array $raw_colors=[];
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
            [['stock_id', 'name', 'desc', 'amount', 'brand_id', 'available'], 'required'],
            [['stock_id', 'amount', 'brand_id', 'available'], 'integer'],
            [['stock_id'], 'unique'],
            [['desc'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::class, 'targetAttribute' => ['brand_id' => 'id']],
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => date('Y-m-d H:i:s'),
            ],
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
            'name' => Yii::t('app', 'Name'),
            'desc' => Yii::t('app', 'Desc'),
            'amount' => Yii::t('app', 'Amount'),
            'brand_id' => Yii::t('app', 'Brand ID'),
            'available' => Yii::t('app', 'Available'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_at' => Yii::t('app', 'Created At'),
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

    public function beforeSave($insert) {
        foreach ($this->raw_colors as $color_id) {
            ColorsOfStock::createCOS($this->stock_id, $color_id);
        }
        $this->raw_colors=[];

        parent::beforeSave($insert);
    }



}
