<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[AttributesProducts]].
 *
 * @see AttributesProducts
 */
class AttributesProductsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return AttributesProducts[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AttributesProducts|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
