<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TransShopsDepartmentsStatuses]].
 *
 * @see TransShopsDepartmentsStatuses
 */
class TransShopsDepartmentsStatusesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TransShopsDepartmentsStatuses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransShopsDepartmentsStatuses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
