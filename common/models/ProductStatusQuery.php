<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ProductStatus]].
 *
 * @see ProductStatus
 */
class ProductStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ProductStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProductStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
