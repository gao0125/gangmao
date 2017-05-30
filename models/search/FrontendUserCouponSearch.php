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
use backend\models\FrontendUserCoupon;

class FrontendUserCouponSearch extends FrontendUserCoupon{
    public function rules()
    {
        return [
            [['id','couponid','userid','status','shopid','cataid','productid','type'],'integer'],
            [['name','discount','created_at', 'updated_at','expired_at','started_at'], 'safe'],

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
        $query = FrontendUserCoupon::find();
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
            'couponid' => $this->couponid,
            'userid' => $this->userid,
            'status' => $this->status,
            'shopid' => $this->shopid,
            'cataid' => $this->cataid,
            'productid' => $this->productid,
            'name' => $this->name,
            'type' => $this->type,
            'discount' => $this->discount,
            'started_at' => $this->started_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'expired_at', $this->expired_at]);
        return $dataProvider;
    }

}