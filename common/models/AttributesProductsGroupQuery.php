<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[AttributesProductsGroup]].
 *
 * @see AttributesProductsGroup
 */
class AttributesProductsGroupQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return AttributesProductsGroup[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AttributesProductsGroup|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
