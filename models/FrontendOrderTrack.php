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
 * This is the model class for table "frontend-order-track".
 *
 * @property integer $id
 * @property integer $orderid
 * @property integer $productid
 * @property string $traking_no
 * @property integer $status
 * @property string $history
 * @property string $created_at
 * @property string $updated_at
 */


class FrontendOrderTrack extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'frontend_order_track';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderid','productid','traking_no','status','history'],'required'],
            [['orderid','productid','status'],'integer'],
            [['traking_no','history','created_at', 'updated_at'], 'safe'],
            [['traking_no'],'string','max'=>100],
            [['status'],'integer','max'=>4],
            [['history'],'string'],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'orderid'  => '订单id',
            'productid'  => '产品id',
            'traking_no'     => '快递号',
            'status'       => 'Status',
            'history'       => '历史记录',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
    public static $isStatus = [ ''=> '全部',0=>'待发货', 1=>'转运中', 2=>'完成'];

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