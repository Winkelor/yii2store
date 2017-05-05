<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TransContacts]].
 *
 * @see TransContacts
 */
class TransContactsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TransContacts[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransContacts|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
