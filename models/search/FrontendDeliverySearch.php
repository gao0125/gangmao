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
use backend\models\FrontendDelivery;

class FrontendDeliverySearch extends FrontendDelivery{
    public function rules()
    {
        return [
//            [['id','userid','status','total_price'],'required'],
            [['id','userid','orderid','status'],'integer'],
            [['status'],'integer','max'=>4],
            [['address'],'string','max'=>200],
            [['consignee'],'string','max'=>10],
            [['created_at', 'updated_at'], 'safe']];
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
        $query = FrontendDelivery::find()->orderBy('id desc');

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
            'id'      =>$this->id,
            'userid'  => $this->userid,
            'orderid'  =>$this->orderid,
            'status'  => $this->status,
            'consignee' => $this->consignee,
            'address' => $this->address,
            'total_price'       => $this->total_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);


        return $dataProvider;
    }

}