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
 * This is the model class for table "frontend_news".
 *
 * @property integer $id
 * @property string $cataid
 * @property string $title
 * @property integer $subtitle
 * @property string $author
 * @property string $content
 * @property string $cnt
 * @property string $ico
 * @property string $created_at
 * @property string $updated_at
 */


class FrontendNews extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'frontend_news';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cataid','title','subtitle','author','ico'],'required'],
            [['id','cataid','cnt'],'integer'],
            [['cnt','created_at', 'updated_at'], 'safe'],
            [['subtitle'],'string','max'=>200 ],
            [['title'],'string','max'=>200],
            [['author'],'string','max'=>100],
            [['content'],'string'],
            [['cnt'],'integer'],
            [['ico'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],

        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'cataid'      => '产品',
            'title'       => '标题',
            'subtitle'    => '副标题',
            'author'      => '作者',
            'content'     => '内容',
            'cnt'         => 'Cnt',
            'ico'         => '图片',
            'created_at'  => '创建时间',
            'updated_at'  => '更新时间',
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