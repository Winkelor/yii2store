<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Cultures]].
 *
 * @see Cultures
 */
class CulturesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Cultures[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Cultures|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
