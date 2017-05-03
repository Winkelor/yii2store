<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[GlobalCategories]].
 *
 * @see GlobalCategories
 */
class GlobalCategoriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return GlobalCategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GlobalCategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
