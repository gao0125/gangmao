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
use backend\models\FrontendOrderDetail;

class FrontendOrderDetailSearch extends FrontendOrderDetail{
    public function rules()
    {
        return [

            [['orderid','productid','status','num'],'integer'],
            [['title','specification','price','unit_name','subtotal','created_at', 'updated_at'], 'safe'],
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
        $query = FrontendOrderDetail::find();
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
            'orderid' => $this->orderid,
            'productid' => $this->productid,
            'status' => $this->status,
            'title' => $this->title,
            'specification' => $this->specification,
            'price' => $this->price,
            'num' => $this->num,
            'unit_name' => $this->unit_name,
            'subtotal' => $this->subtotal,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
        return $dataProvider;
    }

}