<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 18:41
 */
namespace backend\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "frontend_ad_content".
 *
 * @property integer $id
 * @property string $adid
 * @property string $content
 * @property integer $content_type
 * @property string $type
 * @property string $value
 * @property string $created_at
 * @property string $updated_at
 */
class FrontendAdContent extends \yii\db\ActiveRecord{

    public $f_content = '';

    public static function tableName(){
        return 'frontend_ad_content';
    }


    /*
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['adid', 'content_type', 'type', 'value'],'required'],
            [['created_at', 'updated_at',], 'safe'],
           [['content'], 'file',],
          //  [['content'], 'file', 'skipOnEmpty' => true,'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
            [['content_type'], 'integer', 'max' => 4],
            [['type'], 'string', 'max' => 4],
            [['value'], 'string', 'max' => 255],
        ];
    }
    /*
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
            'id'            => 'ID',
            'adid'          => '广告id',
            'content'       => '内容',
            'content_type' => '内容类型',
            'type'          => '类型',
            'value'         => '值',
            'created_at'    => '创建时间',
            'updated_at'    => '更新时间',
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
//                'createdAtAttribute' => 'created_at',
//                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
}