<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 13:02
 */
namespace backend\models;

use Yii;


/**
 * This is the model class for table "frontend_product_img".
 *
 * @property integer $id
 * @property integer $productid
 * @property integer $userid
 * @property string $pos
 * @property string $hash
 * @property integer $filename
 * @property string $filetype
 * @property string $location
 * @property integer $size
 * @property string $created_at
 * @property string $updated_at
 */


class FrontendProductImg extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'frontend_product_img';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productid','userid','pos','hash','filename','filetype','size'],'required'],
            [['id','productid','userid'],'integer'],
            [['pos','hash','filename','filetype','location','created_at','updated_at'], 'safe'],


            [['productid'],'integer','max'=>11],
            [['userid'],'integer','max'=>10],
            [['pos'],'string','max'=>4],
            [['hash'],'string','max'=>32],
            [['filename'],'string','max'=>240],
            [['filetype'],'string','max'=>12],
            [['size'],'string','max'=>12],
            [['location'],'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',]
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'productid'  => 'Productid',
            'userid'     => 'Userid',
            'pos'        => 'Pos',
            'hash'       => 'Hash',
            'filename'   => 'Filename',
            'location'   => 'Location',
            'filetype'   => 'Filetype',
            'size'        => 'Size',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}