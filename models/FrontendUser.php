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
 * This is the model class for table "frontend_user".
 *
 * @property integer $id
 * @property string $cid
 * @property string $nickname
 * @property string $real_name
 * @property string $birth
 * @property string $groupid
 * @property string $company_name
 * @property string $status
 * @property string $m_user_levelid
 * @property string $created_at
 * @property string $updated_at
 */


class FrontendUser extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'frontend_user';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid','nickname','real_name','birth','groupid','company_name','status','m_user_levelid'],'required','message'=>'{attribute} 不能为空'],
            [['id','sex','groupid','status','m_user_levelid'],'integer'],
            [['cid','headimgurl','nickname','real_name','birth','company_name',
                'job_title','city','province','country','language','remark',
                'privilege','auth_key','created_at', 'updated_at'], 'safe'],

            [['nickname'],'string','max'=>200],
            [['real_name'],'string','max'=>30],
            [['birth'],'string'],
            [['company_name'],'string','max'=>100],
            [['status'],'integer','max'=>11],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'cid'  => 'Cid',
            'headimgurl'=>'头像',
            'nickname'  => '昵称',
            'real_name'  => '真实姓名',
            'birth'  => '出生日期',
            'sex'=>'性别',
            'groupid'  => '团体',
            'company_name'  => '公司名称',
            'job_title'=>'职位',
            'city'=>'城市',
            'province'=>'省份',
            'country'=>'国家',
            'language'=>'语言',
            'remark'=>'备注',
            'privilege'=>'特权',
            'status'  => 'Status',
            'm_user_levelid'  => '用户等级',
            'is_first_buy'=>'首次购买',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

public static $isStatus = [ ''=> '全部',0=>'禁用', 10=>'开启'];
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