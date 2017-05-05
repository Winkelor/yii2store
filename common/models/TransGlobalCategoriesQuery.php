<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TransGlobalCategories]].
 *
 * @see TransGlobalCategories
 */
class TransGlobalCategoriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TransGlobalCategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransGlobalCategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
