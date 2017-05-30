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
 * This is the model class for table "m_process_method".
 *
 * @property integer $id
 * @property string $name
 * @property string $desc
 * @property string $created_at
 * @property string updated_at
 */

class MProcessMethod extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'm_process_method';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','desc'],'required','message'=>"{attribute} 不能为空"],
            [['id'],'integer'],
            [['name','desc','created_at','updated_at'],'safe'],
            [['name'],'string','max'=>100],
            [['desc'],'string','max'=>400],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'    => 'ID',
            'name'  => '名称',
            'desc' => '添加说明',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',

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