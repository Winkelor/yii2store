<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ProductsAttributesLogisticsInfo]].
 *
 * @see ProductsAttributesLogisticsInfo
 */
class ProductsAttributesLogisticsInfoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ProductsAttributesLogisticsInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProductsAttributesLogisticsInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
