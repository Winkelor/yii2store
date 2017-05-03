<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[AttributesCategories]].
 *
 * @see AttributesCategories
 */
class AttributesCategoriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return AttributesCategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AttributesCategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
