<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FrontendDemand;

/**
 * FrontendDemandSearch represents the model behind the search form about `backend\models\FrontendDemand`.
 */
class FrontendDemandSearch extends FrontendDemand
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','status','userid','type','cataid','m_materialid'],'integer'],
            [['product_title','specification','quantity',
                'img_urls','voice','mem','consignee','cellphone',
                'address','created_at', 'updated_at'], 'safe'],
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
        $query = FrontendDemand::find();

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
            'userid' => $this->userid,
            'type' => $this->type,
            'cataid' => $this->cataid,
            'm_materialid' => $this->m_materialid,
            'product_title' => $this->product_title,
            'specification' => $this->specification,
            'quantity' => $this->quantity,
            'img_urls' => $this->img_urls,
            'voice' => $this->voice,
            'mem' => $this->mem,
            'consignee' => $this->consignee,
            'cellphone' => $this->cellphone,
            'address' => $this->address,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);


        return $dataProvider;
    }
}