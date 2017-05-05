<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TransImageInfo]].
 *
 * @see TransImageInfo
 */
class TransImageInfoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TransImageInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransImageInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
