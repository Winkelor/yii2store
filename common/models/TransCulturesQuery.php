<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TransCultures]].
 *
 * @see TransCultures
 */
class TransCulturesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TransCultures[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransCultures|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
