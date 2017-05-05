<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TransShippingInfoStatus]].
 *
 * @see TransShippingInfoStatus
 */
class TransShippingInfoStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TransShippingInfoStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransShippingInfoStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
