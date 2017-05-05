<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TransAttributesCategories]].
 *
 * @see TransAttributesCategories
 */
class TransAttributesCategoriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TransAttributesCategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransAttributesCategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
