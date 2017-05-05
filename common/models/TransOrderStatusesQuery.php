<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TransOrderStatuses]].
 *
 * @see TransOrderStatuses
 */
class TransOrderStatusesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TransOrderStatuses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransOrderStatuses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
