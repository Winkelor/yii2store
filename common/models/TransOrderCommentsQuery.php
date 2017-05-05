<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TransOrderComments]].
 *
 * @see TransOrderComments
 */
class TransOrderCommentsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TransOrderComments[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransOrderComments|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
