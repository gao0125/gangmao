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
 * This is the model class for table "frontend_product_process".
 *
 * @property integer $id
 * @property integer $userid
 * @property string $company_name
 * @property string $contacts
 * @property string $tel
 * @property integer $warehouseid
 * @property integer $cataid
 * @property integer $m_process_methodid
 * @property string $product_title
 * @property string $specification
 * @property string $material
 * @property string $weight
 * @property string $price
 * @property string $created_at
 * @property string $updated_at
 */


class FrontendProductProcess extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'frontend_product_process';
    }
    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid','id','orderid','status','tel'],'integer'],
            [['company_name','contacts','tel', 'total_price','status','mem',
                'created_at','updated_at'], 'safe'],
            [['company_name'],'string'],
            [['contacts'],'string'],
            [['tel'],'string'],
            [['total_price'],'string'],
//            [['imgurls'],'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',]
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'            => 'ID',
            'userid'        => '用户ID',
            'orderid'        => '订单ID',
            'company_name' => '公司名称',
            'contacts'      => '联系人',
            'tel'           => '电话',
            'status'     => '状态',
            'transactionid' =>'处理ID',
            'total_price'         => '价格',
            'created_at'    => '创建时间',
            'updated_at'    => '更新时间',
        ];
    }
    public static $isStatus = [ ''=> '全部',0=>'待审核', 1=>'已审核'];

    public function getIsStatusText($state)
    {
        return isset(self::$isStatus[$state]) ? self::$isStatus[$state] : '未知';
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