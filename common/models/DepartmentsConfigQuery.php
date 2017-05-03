<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[DepartmentsConfig]].
 *
 * @see DepartmentsConfig
 */
class DepartmentsConfigQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return DepartmentsConfig[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DepartmentsConfig|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
