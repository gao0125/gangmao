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
 * This is the model class for table "frontend_order_refund".
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $orderid
 * @property integer $productid
 * @property string $num
 * @property integer $status
 * @property integer $reason
 * @property string $explain
 * @property string $created_at
 * @property string $updated_at
 */


class FrontendOrderRefund extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'frontend_order_refund';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid','orderid','productid','num','status','reason','explain'],'required'],

            [['userid','orderid','productid','status'],'integer'],
            [['num','reason','explain','created_at', 'updated_at'], 'safe'],


//            [['userid'],'integer','max'=>10],
//            [['orderid'],'integer','max'=>10],
//            [['productid'],'integer','max'=>10],
            [['num'],'string','max'=>12],
            [['status'],'integer','max'=>4],
            [['reason'],'string','max'=>200],
            [['explain'],'string','max'=>200],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'        => 'ID',
            'userid'    => '用户d',
            'orderid'   => '订单id',
            'productid' => '产品id',
            'num'        => '数量',
            'status'     => '状态',
            'reason'     => '理由',
            'explain'    => '说明',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public static $isStatus =[''=>'全部',0=>'待审核',1=>'已退款',2=>'拒绝退款'];
    public function getIsStatusText($state)
    {
        return isset(self::$isStatus[$state])?self::$isStatus[$state] : '未知';

    }

    public function behaviors(){

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