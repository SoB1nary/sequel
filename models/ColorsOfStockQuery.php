<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ColorsOfStock]].
 *
 * @see ColorsOfStock
 */
class ColorsOfStockQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ColorsOfStock[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ColorsOfStock|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
