<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FrontendInfo;

/**
 * FrontendDemandSearch represents the model behind the search form about `backend\models\FrontendDemand`.
 */
class FrontendInfoSearch extends FrontendInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code','content','created_at', 'updated_at'], 'safe'],
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
        //$sql = "SELECT * FROM frontent_info WHERE code like '%2%'";
        $query = FrontendInfo::find();
        
        // add conditions that should always apply here
        // $query->joinWith(['id']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        //


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions

        //页面中的查询框，，可以模糊查询
        
        $query->andFilterWhere(['like','code',$this->code])
              ->andFilterWhere(['like','content',$this->content])
              ->andFilterWhere(['like','created_at',$this->created_at])
              ->andFilterWhere(['like','updated_at',$this->updated_at]);

/*
'id' => $this->id,
            'code' => $this->code,
            'content' => $this->content,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
*/
        return $dataProvider;
    }
}