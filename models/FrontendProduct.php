<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "frontend_product".
 *
 * @property integer $id
 * @property string $code
 * @property string $shopid
 * @property string $cataid
 * @property integer $is_recommendation
 * @property string $title
 * @property string $imgurl
 * @property integer $m_materialid
 * @property string $specification
 * @property string $production_tech
 * @property string $standard
 * @property integer $m_warehouseid
 * @property integer $manufacturerid
 * @property string $min_quantity
 * @property string $quantity
 * @property string $price
 * @property integer $m_unitid
 * @property string $created_at
 * @property string $updated_at
 * @property integer $updated_by
 */
class FrontendProduct extends \yii\db\ActiveRecord
{
    public $f_imgurl = '';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'frontend_product';
    }
    
    public function init() {
        
        
       // var_dump($_POST);
        $frontendProduct = Yii::$app->request->post('FrontendProduct', []);
        $code = '';
        if(isset($frontendProduct['code'])){
            $code = $frontendProduct['code'];
            $codeArr = explode('-', $code);
            $code = array_shift($codeArr);
        }

        $productCode =  \backend\models\FrontendProductCode::getGroupidByCode($code);
        $this->groupid = $productCode->id;
        
  
        //查询groupid
        return parent::init();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'shopid', 'cataid', 'title', 'm_materialid', 'specification', 'm_warehouseid', 'manufacturerid', 'quantity', 'price', 'm_unitid', 'weight'], 'required'],
            [['shopid', 'cataid', 'is_recommendation', 'm_materialid', 'm_warehouseid', 'manufacturerid', 'm_unitid', 'updated_by'], 'integer'],
            [['min_quantity', 'quantity', 'price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['code'], 'string', 'max' => 15],
            [['title'], 'string', 'max' => 200],
            [['production_tech'], 'string', 'max' => 255],
            [['specification'], 'string', 'max' => 100],
            [['standard'], 'string', 'max' => 300],
            [['code'], 'unique'],
            [['imgurl'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'shopid' => '商家',
            'cataid' => '分类',
            'is_recommendation' => '推荐',
            'title' => '标题',
            'imgurl' => '图像',
            'm_materialid' => '材质',
            'specification' => '规格',
            'production_tech' => '工艺',
            'standard' => '标准',
            'm_warehouseid' => '仓库',
            'manufacturerid' => '厂家',
            'min_quantity' => '起订量',
            'quantity' => '库存',
            'price' => '单价',
            'm_unitid' => '单位',
            'weight' => '重量',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
