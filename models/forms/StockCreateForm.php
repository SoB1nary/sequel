<?php

namespace app\models\forms;

use app\models\Brands;
use app\models\CategoriesOfStock;
use app\models\Stock;
use yii\base\InvalidConfigException;
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
 *
 * */
class StockCreateForm extends Model
{
    public string $name_ru;
    public string|null $name_kz;
    public string|null $name_en;
    public int $stock_id;
    public string|null $desc;
    public int $brand_id;
    public int $amount;
    public int $available;
    public string $updated_at;
    public array $categoriesOfStocks;

    public function rules(): array
    {
        return [
            [['stock_id', 'name_ru', 'created_at', 'updated_at'], 'required'],
            [['stock_id', 'amount', 'available', 'brand_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name_ru', 'name_kz', 'name_en'], 'string', 'max' => 255],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::class, 'targetAttribute' => ['brand_id' => 'id']],
        ];
    }
    public function loadData(Stock|null $stock ):void
    {
        if (!$stock){
            return;
        }
        $this->id = $stock->id;
        $this->stock_id = $stock->stock_id;
        $this->desc = $stock->desc;
        $this->name_ru = $stock->name_ru;
        $this->name_kz = $stock->name_kz;
        $this->name_en = $stock->name_en;
        $this->created_at = $stock->created_at;
        $this->updated_at = $stock->updated_at;


    }

    /**
     * @throws InvalidConfigException
     */
    public function save(): bool
    {
    $stock = Yii::createObject(Stock::className());
    $stock->stock_id = $this->stock_id;
    $stock->name_ru = $this->name_ru;
    $stock->name_kz = $this->name_kz;
    $stock->name_en = $this->name_en;
    $stock->available = $this->available;
    $stock->brand_id = $this->brand_id;
    $stock->desc = $this->desc;
    $stock->created_at = $this->created_at;
    $stock->updated_at = $this->updated_at;
    $stock->save();
    foreach ($this->categoriesOfStocks as $cat) {
        $cos = new CategoriesOfStock();
        $cos->stock_id = $this->stock_id;
        $cos->category_id = $cat;
        $cos->save();
    }
    return true;
}








}