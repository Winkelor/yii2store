<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ShopsDepartments]].
 *
 * @see ShopsDepartments
 */
class ShopsDepartmentsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ShopsDepartments[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShopsDepartments|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
