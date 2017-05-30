<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FrontendProductComment;

/**
 * FrontendProductCommentSearch represents the model behind the search form about `backend\models\FrontendProduct`.
 */
class FrontendProductCommentSearch extends FrontendProductComment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderid','productid','userid','level','logistics',
              'same','delivery','service'],'integer'],
            [['nickname','comment','imgs','created_at','updated_at'], 'safe'],
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
        $query = FrontendProductComment::find();

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
        $query->andFilterWhere([
            'id' => $this->id,
            'orderid' => $this->orderid,
            'productid' => $this->productid,
            'userid' => $this->userid,
            //'nickname' => $this->nickname,
            'level' => $this->level,
            'logistics' => $this->logistics,
            'same' => $this->same,
            'delivery' => $this->delivery,
            'service' => $this->service,
            'comment' => $this->comment,
            'imgs' => $this->imgs,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
        $query->andFilterWhere(['like','nickname',$this->nickname]);
        return $dataProvider;
    }
}
