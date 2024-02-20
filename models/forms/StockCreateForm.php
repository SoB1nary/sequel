<?php

namespace app\models\forms;

use app\models\Brands;
use yii\base\Model;
use Yii;
use yii\db\Exception;

/**
* @property int $id
* @property string $name
* @property int $brand_id
* @property string|null $desc
* @property int $amount
* @property int $available
* @property string $updated_at
* @property array $raw_colors
 *
 * */
class StockCreateForm extends Model
{
    public function rules()
    {
        return [
            [['name', 'brand_id', 'amount', 'available', 'colors'], 'required'],
            [['brand_id', 'amount', 'available'], 'integer'],
            [['desc'], 'string'],
            [['updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::class, 'targetAttribute' => ['brand_id' => 'id']],
        ];
    }

    /**
     * @throws Exception
     */
    public function save() : void
    {
        Yii::$app->db->createCommand()
            ->insert('stock', [
                'name'=>$this->name,
                'brand_id'=>$this->brand_id,
                'amount'=>$this->amount,
                'desc'=>$this->desc,
                'updated_at'=>date('Y-m-d h:m:s')
                ])->execute();
        foreach ($this->raw_colors as $color_id){

            Yii::$app->db->createCommand()
                ->insert('colorsOfStock', [
                    'color_id' => $color_id,
                ])->execute();
            unset($color_id);
    }
    }
}