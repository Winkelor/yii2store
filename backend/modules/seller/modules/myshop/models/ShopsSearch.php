<?php

namespace backend\modules\seller\modules\myshop\models;


use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Shops;

/**
 * ShopsSearch represents the model behind the search form about `common\models\Shops`.
 */
class ShopsSearch extends Shops
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'main_user_id', 'type_id', 'status_id', 'address_id', 'contact_id', 'created_at', 'updated_at', 'country_id'], 'integer'],
            [['name', 'short_name'], 'safe'],
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
        $query = Shops::find()
            ->joinWith('userAdmins')
            ->joinWith('shopsManagers')
            ->Where(['like', 'manager_id', Yii::$app->user->id]);

        // echo $query->createCommand()->sql : SELECT `shops`.* FROM `shops` LEFT JOIN `user_admin` ON `shops`.`id` = `user_admin`.`active_shop_id` LEFT JOIN `shops_managers` ON `shops`.`id` = `shops_managers`.`shop_id` WHERE `manager_id` LIKE :qp0

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
            'main_user_id' => $this->main_user_id,
            'type_id' => $this->type_id,
            'status_id' => $this->status_id,
            'address_id' => $this->address_id,
            'contact_id' => $this->contact_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'country_id' => $this->country_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'short_name', $this->short_name]);

        return $dataProvider;
    }
}
