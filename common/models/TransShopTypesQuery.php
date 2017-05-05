<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TransShopTypes]].
 *
 * @see TransShopTypes
 */
class TransShopTypesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TransShopTypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransShopTypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
