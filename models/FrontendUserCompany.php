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
 * This is the model class for table "frontend_user_company".
 * @property integer $id
 * @property integer $userid
 * @property string $company_name
 * @property string $duty_paragraph
 * @property string $bank
 * @property string $back_account
 * @property string $refund_bank
 * @property string $refund_bank_account
 * @property string $tel
 * @property string $address
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */





class FrontendUserCompany extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'frontend_user_company';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid','company_name','duty_paragraph','bank','back_account','refund_bank','refund_bank_account',
              'tel','address','status'],'required','message'=>"{attribute} 不能为空"],
            [['id','userid','status'],'integer'],
            [['company_name','duty_paragraph','bank','back_account','refund_bank','refund_bank_account',
              'tel','address','status','created_at', 'updated_at'], 'safe'],
              ['tel','match','pattern'=>'/^1(3[0-9]|4[57]|5[0-35-9]|7[0135678]|8[0-9])\d{8}$/','message'=>'手机号格式不正确'],
            [['userid'],'integer'],
            [['company_name'],'string','max'=>100],
            [['duty_paragraph'],'string','max'=>100],
            [['bank'],'string','max'=>100],
            [['back_account'],'string','max'=>100],
            [['refund_bank'],'string','max'=>100],
            [['refund_bank_account'],'string','max'=>20],
            [['tel'],'string'],
            [['address'],'string'],
            [['status'],'string'],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'userid'   => '用户ID',
            'company_name' => '公司名称',
            'duty_paragraph' => '税号',
            'bank'     => '银行',
            'back_account'  => '银行账户',
            'refund_bank'       => '退款银行',
            'refund_bank_account' => '退款的银行账户',
            'tel'   => '电话',
            'address' => '地址',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }
    public static $isStatus = [ ''=> '全部',0=>'待认证', 1=>'认证成功', 9=>'认证失败'];
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