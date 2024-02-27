<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[CategoriesOfStock]].
 *
 * @see CategoriesOfStock
 */
class CategoriesOfStockQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CategoriesOfStock[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CategoriesOfStock|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
