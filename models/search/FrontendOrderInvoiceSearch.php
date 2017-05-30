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
use backend\models\FrontendOrderInvoice;

class FrontendOrderInvoiceSearch extends FrontendOrderInvoice{
    public function rules()
    {
        return [
            [['id','userid','orderid','status'],'integer'],
            [['company_name','duty_paragraph','bank','bank_account',
              'address','tel','consignee','consignee_tel','zip_code',
              'fax','consignee_address','detail','created_at', 'updated_at'], 'safe'],
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
        $query = FrontendOrderInvoice::find();
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
            'userid' => $this->userid,
            'orderid' => $this->orderid,
            'company_name' => $this->company_name,
            'duty_paragraph' => $this->duty_paragraph,
            'bank' => $this->bank,
            'bank_account' => $this->bank_account,
            'address' => $this->address,
            'tel' => $this->tel,
            'consignee' => $this->consignee,
            'consignee_tel' => $this->consignee_tel,
            'zip_code' => $this->zip_code,
            'fax' => $this->fax,
            'consignee_address' => $this->consignee_address,
            'detail' => $this->detail,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

//        $query->andFilterWhere(['like', 'm_shippingid', $this->m_shippingid])
//            ->andFilterWhere(['like', 'merchant_note', $this->merchant_note]);

        return $dataProvider;
    }

}