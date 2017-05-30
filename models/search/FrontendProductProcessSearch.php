<?php
namespace backend\models\search;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FrontendProductProcess;

/**
 * FrontendProductProcessSearch represents the model behind the search form about `backend\models\FrontendProduct`.
 */
class FrontendProductProcessSearch extends FrontendProductProcess
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid','id','orderid','status','tel'],'integer'],
            [['company_name','contacts','tel', 'total_price','status','imgurls','mem',
                'created_at','updated_at'], 'safe'],
            [['company_name'],'string','max'=>100],
            [['contacts'],'string','max'=>100],
            [['tel'],'string','max'=>15],
            [['total_price'],'string','max'=>12],
//            [['imgurls'],'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',]
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
        $query = FrontendProductProcess::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'userid' => $this->userid,
            'orderid' => $this->orderid,
            'company_name' => $this->company_name,
            'contacts' => $this->contacts,
            'tel' => $this->tel,
            'status' => $this->status,
            'transactionid' => $this->transactionid,
            'total_price' => $this->total_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
