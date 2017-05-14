<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductsAttributesLogisticsInfo;

/**
 * ProductsAttributesLogisticsInfoSearch represents the model behind the search form about `common\models\ProductsAttributesLogisticsInfo`.
 */
class ProductsAttributesLogisticsInfoSearch extends ProductsAttributesLogisticsInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'shop_id', 'department_id', 'product_id', 'count', 'shipping_box_info_id', 'status_id', 'is_action', 'created_at', 'updated_at'], 'integer'],
            [['purchase_price', 'selling_price'], 'number'],
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
        $query = ProductsAttributesLogisticsInfo::find();

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
            'purchase_price' => $this->purchase_price,
            'selling_price' => $this->selling_price,
            'count' => $this->count,
            'shipping_box_info_id' => $this->shipping_box_info_id,
            'status_id' => $this->status_id,
            'is_action' => $this->is_action,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
