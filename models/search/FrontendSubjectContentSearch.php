<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FrontendSubjectContent;

/**
 * FrontendSubjectContentSearch represents the model behind the search form about `backend\models\FrontendSubjectContent`.
 */
class FrontendSubjectContentSearch extends FrontendSubjectContent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title','imgs','created_at','content', 'updated_at'], 'safe'],
            [['agree'], 'integer'],
            [['subjectid','userid'],'string']
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
        $query = FrontendSubjectContent::find();

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
            'subjectid' => $this->subjectid,
            'userid' => $this->userid,
            //'title' => $this->title,
            //'content' => $this->content,
            'imgs' => $this->imgs,
            'agree' => $this->agree,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

       $query->andFilterWhere(['like', 'content', $this->content])
             ->andFilterWhere(['like', 'title', $this->title]);
             // ->andFilterWhere(['like', 'imgurls', $this->imgurls])
             // ->andFilterWhere(['like', 'mem', $this->mem]);

        return $dataProvider;
    }
}
