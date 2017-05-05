<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TransShopsCommerceData]].
 *
 * @see TransShopsCommerceData
 */
class TransShopsCommerceDataQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TransShopsCommerceData[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransShopsCommerceData|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
