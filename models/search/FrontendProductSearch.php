<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FrontendProduct;

/**
 * FrontendProductSearch represents the model behind the search form about `backend\models\FrontendProduct`.
 */
class FrontendProductSearch extends FrontendProduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'shopid', 'cataid', 'is_recommendation', 'm_materialid', 'm_warehouseid', 'manufacturerid', 'm_unitid', 'updated_by'], 'integer'],
            [['code', 'title', 'imgurl', 'specification', 'production_tech', 'standard', 'created_at', 'updated_at'], 'safe'],
            [['min_quantity', 'quantity', 'price'], 'number'],
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
        $query = FrontendProduct::find();

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
            'shopid' => $this->shopid,
            'cataid' => $this->cataid,
            'is_recommendation' => $this->is_recommendation,
            'm_materialid' => $this->m_materialid,
            'm_warehouseid' => $this->m_warehouseid,
            'manufacturerid' => $this->manufacturerid,
            'min_quantity' => $this->min_quantity,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'm_unitid' => $this->m_unitid,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'imgurl', $this->imgurl])
            ->andFilterWhere(['like', 'specification', $this->specification])
            ->andFilterWhere(['like', 'production_tech', $this->production_tech])
            ->andFilterWhere(['like', 'standard', $this->standard]);

        return $dataProvider;
    }
}
