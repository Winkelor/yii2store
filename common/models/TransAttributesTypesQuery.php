<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TransAttributesTypes]].
 *
 * @see TransAttributesTypes
 */
class TransAttributesTypesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TransAttributesTypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransAttributesTypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
