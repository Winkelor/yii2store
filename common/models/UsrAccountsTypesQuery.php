<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UsrAccountsTypes]].
 *
 * @see UsrAccountsTypes
 */
class UsrAccountsTypesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UsrAccountsTypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UsrAccountsTypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
