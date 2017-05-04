<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ShopStatuses]].
 *
 * @see ShopStatuses
 */
class ShopStatusesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ShopStatuses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShopStatuses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
