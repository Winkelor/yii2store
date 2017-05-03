<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[CartDetailsStatus]].
 *
 * @see CartDetailsStatus
 */
class CartDetailsStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return CartDetailsStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CartDetailsStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
