<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ShopsDepartmentsTypes]].
 *
 * @see ShopsDepartmentsTypes
 */
class ShopsDepartmentsTypesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ShopsDepartmentsTypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShopsDepartmentsTypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
