<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $name_ru
 * @property string|null $name_kz
 * @property string|null $name_en
 *
 * @property CategoriesOfStock[] $categoriesOfStocks
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_ru'], 'required'],
            [['name_ru', 'name_kz', 'name_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_ru' => Yii::t('app', 'Name Ru'),
            'name_kz' => Yii::t('app', 'Name Kz'),
            'name_en' => Yii::t('app', 'Name En'),
        ];
    }

    /**
     * Gets query for [[CategoriesOfStocks]].
     *
     * @return \yii\db\ActiveQuery|CategoriesOfStockQuery
     */
    public function getCategoriesOfStock()
    {
        return $this->hasMany(CategoriesOfStock::class, ['category_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoriesQuery(get_called_class());
    }
}
