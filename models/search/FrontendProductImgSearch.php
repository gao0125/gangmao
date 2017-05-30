<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FrontendProductImg;

/**
 * FrontendProductImgSearch represents the model behind the search form about `backend\models\FrontendProductImg`.
 */
class FrontendProductImgSearch extends FrontendProductImg
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'productid', 'pos'], 'integer'],
            [['hash', 'filename', 'filetype', 'location', 'created_at', 'updated_at'], 'safe'],
            [['size'], 'number'],
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
        $query = FrontendProductImg::find();

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
            'productid' => $this->productid,
            'pos' => $this->pos,
            'size' => $this->size,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'hash', $this->hash])
            ->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['like', 'filetype', $this->filetype])
            ->andFilterWhere(['like', 'location', $this->location]);

        return $dataProvider;
    }
}
