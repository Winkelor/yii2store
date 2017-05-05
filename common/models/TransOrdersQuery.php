<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TransOrders]].
 *
 * @see TransOrders
 */
class TransOrdersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TransOrders[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransOrders|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
