<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 13:02
 */
namespace backend\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "frontend_demand".
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $status
 * @property string $img_urls
 * @property integer $type
 * @property integer $cataid
 * @property integer $m_materialid
 * @property string $product_title
 * @property string $specification
 * @property string $quantity
 * @property string $voice
 * @property string $mem
 * @property string $consignee
 * @property string $cellphone
 * @property string $address
 * @property string $created_at
 * @property string $updated_at
 */


class FrontendDemand extends \yii\db\ActiveRecord {
    public $f_imgurl = '';

    public static function tableName(){
        return 'frontend_demand';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status','userid'],'required'],
            [['id','status','userid','type','cataid','m_materialid'],'integer'],
            [['product_title','specification','quantity',
                'img_urls','voice','mem','consignee','cellphone',
                'address','created_at', 'updated_at'], 'safe'],
            [['status'],'integer','max'=>4],
            [['userid'],'integer'],
            [['img_urls'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],

        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'      => 'ID',
            'status'  => 'Status',
            'userid' => '用户',
            'type' => '类型',
            'cataid'      => '产品',
            'm_materialid' => '材质',
            'product_title'    => '产品名称',
            'specification'    => '规格',
            'quantity'       => '数量',
            'img_urls'       => '图片',
            'voice'       => '语音',
            'mem'       => 'Mem',
            'consignee'       => '收货人',
            'cellphone'       => '手机号',
            'address'       => '地址',
            'created_at' => '上传时间',
            'updated_at' => '更新时间',
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
}