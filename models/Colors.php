<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "colors".
 *
 * @property int $id
 * @property string $name
 * @property string $hex
 */
class Colors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'colors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'hex'], 'required'],
            [['name', 'hex'], 'string', 'max' => 255],
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
            'hex' => Yii::t('app', 'Hex'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ColorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ColorsQuery(get_called_class());
    }

    public static function createColor($name, $hex): Colors
    {
        $color = new Colors;
        $color->name = $name;
        $color->hex = $hex;
        return $color;
    }
}
