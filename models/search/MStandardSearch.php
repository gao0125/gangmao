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
use backend\models\MStandard;

class MStandardSearch extends MStandard{
    public function rules()
    {
        return [
            [['id','userid','class'],'integer'],
            [['title','hash','filename','type','size','location','created_at','updated_at'],'safe'],

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
        $query = MStandard::find();

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
            'title' => $this->title,
            'userid' => $this->userid,
            'hash' => $this->hash,
            'filename' => $this->filename,
            'type' => $this->type,
            'size' => $this->size,
            'location' => $this->location,
            'class' => $this->class,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
        return $dataProvider;
    }

}