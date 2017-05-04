<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[OrdersDetailsStatus]].
 *
 * @see OrdersDetailsStatus
 */
class OrdersDetailsStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return OrdersDetailsStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return OrdersDetailsStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
