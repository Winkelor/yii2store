<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ShopConfig]].
 *
 * @see ShopConfig
 */
class ShopConfigQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ShopConfig[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShopConfig|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
