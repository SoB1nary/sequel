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
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

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
    public ?int $id = null;
    public string|null $name_ru = null;
    public string|null $name_kz=null;
    public string|null $name_en=null;
    public int|null $stock_id=null;
    public string|null $desc=null;
    public int|null $brand_id=null;
    public int|null $amount=null;
    public int|null $available=null;
    public string|null $created_at=null;
    public string|null $updated_at=null;
    public ?array $categoriesOfStock=[];



    public function rules(): array
    {
        return [
            [['stock_id', 'name_ru', 'created_at', 'updated_at'], 'required'],
            [['stock_id', 'amount', 'available', 'brand_id'], 'integer'],
            ['categoriesOfStock', 'each', 'rule'=>'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name_ru', 'name_kz', 'name_en'], 'string', 'max' => 255],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::class, 'targetAttribute' => ['brand_id' => 'id']],
            ['id', 'integer', 'min' => 1],
        ];
    }
    public function loadData(Stock|null $stock ):void
    {
        if (!$stock){
            return;
        }
       $this->id = $stock->id;
       $this->stock_id = $stock->stock_id;
       $this->name_ru = $stock->name_ru;
       $this->name_kz = $stock->name_kz;
       $this->name_en = $stock->name_en;
       $this->amount = $stock->amount;
       $this->created_at = $stock->created_at;
       $this->updated_at = $stock->updated_at;
       $this->available = $stock->available;
       $this->brand_id = $stock->brand_id;
       $this->desc = $stock->desc;
       $this->categoriesOfStock = $stock->categoriesOfStock;



    }


    /**
     * @throws InvalidConfigException
     */
    public function save(): bool
    {
    $stock = $this->id ? Stock::findOne($this->id) : \Yii::createObject(Stock::class);

    $stock->stock_id = $this->stock_id;
    $stock->name_ru = $this->name_ru;
    $stock->name_kz = $this->name_kz;
    $stock->name_en = $this->name_en;
    $stock->available = $this->available;
    $stock->brand_id = $this->brand_id;
    $stock->desc = $this->desc;
    $stock->amount = $this->amount;
    $stock->created_at = $this->created_at;
    $stock->updated_at = $this->updated_at;
    $stock->save();

    $catsToSave = array_map(function ($v) {
        return intval($v);
    }, $this->categoriesOfStock);

    $modelCOS=CategoriesOfStock::find()->indexBy('id')->andWhere(['stock_id'=>$this->stock_id])->all();

    $this->id = $stock->id;
    if($this->categoriesOfStock) {
        $to_add= array_diff($catsToSave, ArrayHelper::getColumn($modelCOS,'category_id'));
        $to_delete = array_diff(ArrayHelper::getColumn($modelCOS,'category_id'), $catsToSave);

        VarDumper::dump($to_delete);

        if($to_add) {
            foreach ($to_add as $cat) {
                $cos = new CategoriesOfStock();
                $cos->stock_id = $stock->stock_id;
                $cos->category_id = $cat;
                $cos->save();
            }
    }

        if($to_delete) {

                foreach ($modelCOS as $cos) {
                    if (in_array($cos->category_id, $to_delete)){
                        $cos->delete();
                    }
                }
        }
    }



    return true;

}









}