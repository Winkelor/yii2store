<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ImageInfoCategories]].
 *
 * @see ImageInfoCategories
 */
class ImageInfoCategoriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ImageInfoCategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ImageInfoCategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
