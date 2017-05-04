<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ProductsAttributesLogisticsInfoStatuses]].
 *
 * @see ProductsAttributesLogisticsInfoStatuses
 */
class ProductsAttributesLogisticsInfoStatusesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ProductsAttributesLogisticsInfoStatuses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProductsAttributesLogisticsInfoStatuses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
