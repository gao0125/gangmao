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
use backend\models\FrontendUserCompany;

class FrontendUserCompanySearch extends FrontendUserCompany{
    public function rules()
    {
        return [
            [['id','userid','status'],'integer'],
            [['company_name','duty_paragraph','bank','back_account','refund_bank','refund_bank_account',
                'tel','address','status','created_at', 'updated_at'], 'safe'],

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
        $query = FrontendUserCompany::find();
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

            //'id' => $this->id,
            //'userid' => $this->userid,
            //'company_name' => $this->company_name,
            //'duty_paragraph' => $this->duty_paragraph,
            //'bank' => $this->bank,
            //'back_account' => $this->back_account,
            //'refund_bank' => $this->refund_bank,
            //'refund_bank_account' => $this->refund_bank_account,
           // 'tel' => $this->tel,
            //'address' => $this->address,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ])
        ->andFilterWhere(['like','id',$this->id])
        ->andFilterWhere(['like','userid',$this->userid])
        ->andFilterWhere(['like','company_name',$this->company_name])
        ->andFilterWhere(['like','duty_paragraph',$this->duty_paragraph])
        ->andFilterWhere(['like','bank',$this->bank])
        ->andFilterWhere(['like','back_account',$this->back_account])
        ->andFilterWhere(['like','refund_bank',$this->refund_bank])
        ->andFilterWhere(['like','refund_bank_account',$this->refund_bank_account])
        ->andFilterWhere(['like','tel',$this->tel])
        ->andFilterWhere(['like','address',$this->address]);
        return $dataProvider;
    }

}