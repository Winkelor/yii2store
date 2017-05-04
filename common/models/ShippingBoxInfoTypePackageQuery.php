<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ShippingBoxInfoTypePackage]].
 *
 * @see ShippingBoxInfoTypePackage
 */
class ShippingBoxInfoTypePackageQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ShippingBoxInfoTypePackage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShippingBoxInfoTypePackage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
