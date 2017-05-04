<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ShippingInfoStatus]].
 *
 * @see ShippingInfoStatus
 */
class ShippingInfoStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ShippingInfoStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShippingInfoStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
