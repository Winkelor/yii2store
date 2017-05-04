<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ImageInfoGlobalCategories]].
 *
 * @see ImageInfoGlobalCategories
 */
class ImageInfoGlobalCategoriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ImageInfoGlobalCategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ImageInfoGlobalCategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
