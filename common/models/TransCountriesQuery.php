<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TransCountries]].
 *
 * @see TransCountries
 */
class TransCountriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TransCountries[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransCountries|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
