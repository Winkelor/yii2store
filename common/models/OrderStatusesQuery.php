<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[OrderStatuses]].
 *
 * @see OrderStatuses
 */
class OrderStatusesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return OrderStatuses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return OrderStatuses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
