<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ShippingBoxInfo]].
 *
 * @see ShippingBoxInfo
 */
class ShippingBoxInfoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ShippingBoxInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShippingBoxInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
