<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[AttributesGroups]].
 *
 * @see AttributesGroups
 */
class AttributesGroupsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return AttributesGroups[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AttributesGroups|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
