<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TransShippingInfo]].
 *
 * @see TransShippingInfo
 */
class TransShippingInfoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TransShippingInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransShippingInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
