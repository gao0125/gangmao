<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FrontendOrderPayment;

/**
 * FrontendOrderPaymentSearch represents the model behind the search form about `backend\models\FrontendAdContent`.
 */
class FrontendOrderPaymentSearch extends FrontendOrderPayment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'orderid', 'type'], 'integer'],
            [['transactionid','amount','mem','receipt_imgs','created_at', 'updated_at'], 'safe'],
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
        $query = FrontendOrderPayment::find();

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
            'status' => $this->status,
            'orderid' => $this->orderid,
            'type' => $this->type,
            'transactionid' => $this->transactionid,
            'amount' => $this->amount,
            'mem' => $this->mem,
            'receipt_imgs' => $this->receipt_imgs,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}