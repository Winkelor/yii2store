<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ImageTypes]].
 *
 * @see ImageTypes
 */
class ImageTypesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ImageTypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ImageTypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
