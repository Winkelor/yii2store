<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UserAdmin]].
 *
 * @see UserAdmin
 */
class UserAdminQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UserAdmin[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserAdmin|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
