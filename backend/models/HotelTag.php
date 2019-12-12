<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "hotel_tag".
 *
 * @property int $sub_hotel_id
 * @property int $tag_id
 */
class HotelTag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hotel_tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sub_hotel_id', 'tag_id'], 'required'],
            [['sub_hotel_id', 'tag_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sub_hotel_id' => 'Sub Hotel ID',
            'tag_id' => 'Tag ID',
        ];
    }


    public static function getTagBySubHotel($subHotelId){
        $res=static::find()->select('tag_id')->where(['sub_hotel_id'=>$subHotelId])->all();
        return $res?ArrayHelper::getColumn($res,'tag_id'):[];
    }
}
