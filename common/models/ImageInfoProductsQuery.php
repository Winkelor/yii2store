<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ImageInfoProducts]].
 *
 * @see ImageInfoProducts
 */
class ImageInfoProductsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ImageInfoProducts[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ImageInfoProducts|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
