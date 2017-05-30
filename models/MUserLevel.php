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
 * This is the model class for table "m_user_level".
 *
 * @property integer $id
 * @property string $name
 * @property string $privilege

 */


class MUserLevel extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'm_user_level';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','point','lv'],'required','message'=>"{attribute} 不能为空"],
            [['id','lv','point'],'integer'],
            [['name','privilege','lv'], 'safe'],
            [['name'],'string','max'=>100],
            [['privilege'],'string'],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'name'  => '名称',
            'privilege'  => '特权',
            'lv'=>'等级',
            'point'=>'成长点'
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