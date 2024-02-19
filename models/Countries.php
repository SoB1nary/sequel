<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "countries".
 *
 * @property int $id
 * @property string $name
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'countries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return CountriesQuery the active query used by this AR class.
     */
    public static function find(): CountriesQuery
    {
        return new CountriesQuery(get_called_class());
    }
    public static function createCountry(string $name) : ActiveRecord|null
    {
        $country = new Countries;
        $country->name = $name;
        return $country->save() ? $country : null;

    }

}
