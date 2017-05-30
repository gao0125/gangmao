<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FrontendResource;

/**
 * FrontendResourceSearch represents the model behind the search form about `backend\models\FrontendResource`.
 */
class FrontendResourceSearch extends FrontendResource
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','userid','status','cataid','m_warehouseid','cnt'],'integer'],
            [['company_name','sub_cata','steel_factory','phone','desc',
                'url','created_at','updated_at'], 'safe'],
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
        $query = FrontendResource::find();

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
            'userid' => $this->userid,
            'status' => $this->status,
            'company_name' => $this->company_name,
            'cataid' => $this->cataid,
            'sub_cata' => $this->sub_cata,
            'm_warehouseid' => $this->company_name,
            'steel_factory' => $this->steel_factory,
            'contact' => $this->contact,
            'phone' => $this->phone,
            'desc' => $this->desc,
            'url' => $this->url,
            'cnt' => $this->cnt,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

//        $query->andFilterWhere(['like', 'status', $this->status])
//              ->andFilterWhere(['like', 'package', $this->package])
//              ->andFilterWhere(['like', 'imgurls', $this->imgurls])
//              ->andFilterWhere(['like', 'mem', $this->mem]);

        return $dataProvider;
    }
}
