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
 * This is the model class for table "m_process_ratio".
 *
 * @property integer $id
 * @property string $type
 * @property string $value
 * @property string $ratio
 * @property string $created_at
 * @property string updated_at
 */

class MProcessRatio extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'm_process_ratio';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type','value','ratio'],'required','message'=>"{attribute} 不能为空"],
            [['id'],'integer'],
            [['type','value','ratio','created_at','updated_at'],'safe'],
            [['type'],'string','max'=>4],
            [['value'],'string','max'=>16],
            [['ratio'],'string','max'=>12],
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
            'value' => '属性值',
            'ratio'  => '比率',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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