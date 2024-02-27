<?php

namespace app\models\forms;

use app\models\Brands;
use app\models\ColorsOfStock;
use app\models\Stock;
use yii\base\Model;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Exception;

/**
* @property int $id
* @property int $stock_id
* @property string $name
* @property int $brand_id
* @property string|null $desc
* @property int $amount
* @property int $available
* @property string $updated_at
* @property array $raw_colors
 *
 * */
class StockCreateForm extends ActiveRecord
{
    public string $name = "";
    public int $stock_id;
    public string|null $desc;
    public int $brand_id;
    public int $amount;
    public int $available;
    public string $updated_at;
    public array $raw_colors;




    public function rules()
    {
        return [
            [['name', 'brand_id', 'amount', 'available', 'colors'], 'required'],
            [['brand_id', 'amount', 'available'], 'integer'],
            [['desc'], 'string'],
            [['stock_id'], 'unique'],
            [['updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::class, 'targetAttribute' => ['brand_id' => 'id']],
        ];
    }





}