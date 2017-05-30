<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FrontendProductInspection;

/**
 * FrontendProductInspectionSearch represents the model behind the search form about `backend\models\FrontendProductInspection`.
 */
class FrontendProductInspectionSearch extends FrontendProductInspection
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['product_inspectionid','m_inspectionid','m_inspection_methods'],'required'],
            [['id','userid','orderid','tel','status'],'integer'],
            [['imgs','mem','total_price','created_at','updated_at'], 'safe'],
//            [['m_inspection_methods'],'string','max'=>300],
            [['imgs'],'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',]
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
        $query = FrontendProductInspection::find();

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
            'id'            => $this->id,
            'userid'        => $this->userid,
            'orderid'        => $this->orderid,
            'tel' =>$this->tel,
            'total_price' =>$this->total_price,
            'status' => $this->status,
            'imgs'           =>$this->imgs,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);
//              ->andFilterWhere(['like', 'package', $this->package])
//              ->andFilterWhere(['like', 'imgurls', $this->imgurls])
//              ->andFilterWhere(['like', 'mem', $this->mem]);

        return $dataProvider;
    }
}
