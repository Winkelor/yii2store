<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[AttributesTypes]].
 *
 * @see AttributesTypes
 */
class AttributesTypesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return AttributesTypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AttributesTypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
