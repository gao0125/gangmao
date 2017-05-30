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
 * This is the model class for table "m_inspection_ratio".
 *
 * @property integer $id
 * @property string $name
 * @property string $desc
 * @property string $created_at
 * @property string updated_at
 */

class MInspectionRatio extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'm_inspection_ratio';
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
            'type'  => '类型',
            'value'  => '数值',
            'ratio'  => '比率',
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