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
 * This is the model class for table "frontend_user_credit".
 *
 * @property integer $id
 * @property string $userid
 * @property string $amount
 * @property string $created_at
 * @property string $updated_at
 */


class FrontendUserCredit extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'frontend_user_credit';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid','amount'],'required','message'=>"{attribute} 不能为空"],
            [['id','userid'],'integer'],
            [['amount','created_at', 'updated_at'], 'safe'],
            [['userid'],'integer'],
            [['amount'],'string'],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'userid'  => '用户ID',
            'amount'  => '总量',
            'created_at' => '创建时间',
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