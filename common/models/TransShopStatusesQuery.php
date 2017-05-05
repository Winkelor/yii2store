<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TransShopStatuses]].
 *
 * @see TransShopStatuses
 */
class TransShopStatusesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TransShopStatuses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransShopStatuses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
