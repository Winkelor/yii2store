<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TransCurrencies]].
 *
 * @see TransCurrencies
 */
class TransCurrenciesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TransCurrencies[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransCurrencies|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
