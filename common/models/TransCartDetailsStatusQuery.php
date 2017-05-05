<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TransCartDetailsStatus]].
 *
 * @see TransCartDetailsStatus
 */
class TransCartDetailsStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TransCartDetailsStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransCartDetailsStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
