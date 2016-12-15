<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Like;

/**
 * LikeSearch represents the model behind the search form about `app\models\Like`.
 */
class LikeSearch extends Like
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['share_owner_id', 'share_id', 'from_customer_id'], 'integer'],
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
        $query = Like::find();

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
            'share_owner_id' => $this->share_owner_id,
            'share_id' => $this->share_id,
            'from_customer_id' => $this->from_customer_id,
        ]);

        return $dataProvider;
    }
}
