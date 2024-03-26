<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car_models".
 *
 * @property int $id
 * @property int $brand_id
 * @property string $name
 * @property int $year
 * @property string|null $desc_ru
 * @property string|null $desc_kz
 * @property string|null $desc_en
 * @property int|null $body_type
 *
 * @property CarBodyType $bodyType
 * @property Brand $brand
 */
class CarModels extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_models';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand_id', 'name', 'year'], 'required'],
            [['brand_id', 'year', 'body_type'], 'integer'],
            [['desc_ru', 'desc_kz', 'desc_en'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::class, 'targetAttribute' => ['brand_id' => 'id']],
            [['body_type'], 'exist', 'skipOnError' => true, 'targetClass' => CarBodyType::class, 'targetAttribute' => ['body_type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'brand_id' => Yii::t('app', 'Brand ID'),
            'name' => Yii::t('app', 'Name'),
            'year' => Yii::t('app', 'Year'),
            'desc_ru' => Yii::t('app', 'Desc Ru'),
            'desc_kz' => Yii::t('app', 'Desc Kz'),
            'desc_en' => Yii::t('app', 'Desc En'),
            'body_type' => Yii::t('app', 'Body Type'),
        ];
    }

    /**
     * Gets query for [[BodyType]].
     *
     * @return \yii\db\ActiveQuery|CarBodyTypeQuery
     */
    public function getBodyType()
    {
        return $this->hasOne(CarBodyType::class, ['id' => 'body_type']);
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
     * @return CarModelsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CarModelsQuery(get_called_class());
    }
}
