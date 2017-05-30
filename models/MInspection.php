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
 * This is the model class for table "m_inspection".
 *
 * @property integer $id
 * @property string $name
 * @property string $desc
 * @property string $address
 * @property string $tel
 * @property string $created_at
 * @property string $updated_at
 */


class MInspection extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'm_inspection';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','desc','address','tel'],'required','message'=>"{attribute} 不能为空"],
            ['tel','match','pattern'=>'/^1(3[0-9]|4[57]|5[0-35-9]|7[0135678]|8[0-9])\d{8}$/','message'=>'手机号格式不正确'],
            [['name','desc','address','tel','created_at', 'updated_at'], 'safe'],
            [['name'],'string','max'=>255],
            [['desc'],'string'],
            [['address'],'string','max'=>255],
            [['tel'],'string','max'=>255],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'name'  => '姓名',
            'desc'  => '检验说明',
            'address'     => '地址',
            'tel'       => '电话',
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