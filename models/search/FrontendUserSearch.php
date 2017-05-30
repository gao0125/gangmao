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
use backend\models\FrontendUser;

class FrontendUserSearch extends FrontendUser{
    public function rules()
    {
        return [
            [['id','sex','groupid','status','m_user_levelid'],'integer'],
            [['cid','headimgurl','nickname','real_name','birth','company_name',
                'job_title','city','province','country','language','remark',
                'privilege','auth_key','created_at', 'updated_at'], 'safe'],

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
        $query = FrontendUser::find();

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
            'cid' => $this->cid,
            'nickname' => $this->nickname,
            'real_name' => $this->real_name,
            'birth' => $this->birth,
            'groupid' => $this->groupid,
            'company_name' => $this->company_name,
            'status' => $this->status,
            'm_user_levelid' => $this->m_user_levelid,
        ]);
        return $dataProvider;
    }

}