<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 15:37
 */
namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FrontendOrder;

class FrontendOrderSearch extends FrontendOrder{
    public function rules()
    {
        return [
            [['id','status','shopid','userid','type','consignee_cellphone','total_price','origin_price','discounted_price','couponid','m_shippingid'],'integer'],
            [['consignee','consignee_address','trackingid','customer_note','merchant_note','transactionid','created_at', 'updated_at'], 'safe'],
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
        $query = FrontendOrder::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'shopid' => $this->shopid,
            'userid' => $this->userid,
            'type' => $this->type,
            'consignee_cellphone' => $this->consignee_cellphone,
            'couponid' => $this->couponid,
            'total_price' => $this->total_price,
            'origin_price' => $this->origin_price,
            'discounted_price' => $this->discounted_price,
            'consignee' => $this->consignee,
            'consignee_address' => $this->consignee_address,
            'trackingid' => $this->trackingid,
            'customer_note' => $this->customer_note,
            'transactionid' => $this->transactionid,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'm_shippingid', $this->m_shippingid])
              ->andFilterWhere(['like', 'merchant_note', $this->merchant_note]);

        return $dataProvider;
    }

}