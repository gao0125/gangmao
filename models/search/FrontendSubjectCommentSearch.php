<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FrontendSubjectComment;

/**
 * FrontendSubjectCommentSearch represents the model behind the search form about `backend\models\FrontendSubjectComment`.
 */
class FrontendSubjectCommentSearch extends FrontendSubjectComment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at','comment', 'updated_at'], 'safe'],
            [['subject_contentid', 'userid', 'agree'], 'integer'],
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
        $query = FrontendSubjectComment::find();

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
            'subject_contentid' => $this->subject_contentid,
            'userid' => $this->userid,
            //'comment' => $this->comment,
            'agree' => $this->agree,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment]);
//              ->andFilterWhere(['like', 'package', $this->package])
//              ->andFilterWhere(['like', 'imgurls', $this->imgurls])
              //->andFilterWhere(['like', 'mem', $this->mem]);

        return $dataProvider;
    }
}
