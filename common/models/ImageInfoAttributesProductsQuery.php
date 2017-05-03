<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ImageInfoAttributesProducts]].
 *
 * @see ImageInfoAttributesProducts
 */
class ImageInfoAttributesProductsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ImageInfoAttributesProducts[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ImageInfoAttributesProducts|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
