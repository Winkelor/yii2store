<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AttributesProductsGroup;

/**
 * AttributesProductsGroupSearch represents the model behind the search form about `common\models\AttributesProductsGroup`.
 */
class AttributesProductsGroupSearch extends AttributesProductsGroup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'shop_id', 'department_id', 'product_id', 'products_attributes_logistics_inf_id', 'attribute_product_id', 'attribute_category_id', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AttributesProductsGroup::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'shop_id' => $this->shop_id,
            'department_id' => $this->department_id,
            'product_id' => $this->product_id,
            'products_attributes_logistics_inf_id' => $this->products_attributes_logistics_inf_id,
            'attribute_product_id' => $this->attribute_product_id,
            'attribute_category_id' => $this->attribute_category_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
