<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[CarModels]].
 *
 * @see CarModels
 */
class CarModelsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CarModels[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CarModels|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
