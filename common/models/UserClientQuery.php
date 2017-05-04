<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UserClient]].
 *
 * @see UserClient
 */
class UserClientQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UserClient[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserClient|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
