<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sub_hotel".
 *
 * @property int $sub_hotel_id
 * @property string $sub_hotel_name
 * @property string $sub_hotel_code
 * @property int $credate_at
 * @property int $update_at
 */
class SubHotel extends \yii\db\ActiveRecord
{
    public $tag;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_hotel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sub_hotel_name', 'sub_hotel_code', 'credate_at', 'update_at','tag'], 'required'],
            [['credate_at', 'update_at'], 'integer'],
            [['sub_hotel_name'], 'string', 'max' => 50],
            [['sub_hotel_code'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sub_hotel_id' => 'Sub Hotel ID',
            'sub_hotel_name' => 'Sub Hotel Name',
            'sub_hotel_code' => 'Sub Hotel Code',
            'credate_at' => 'Credate At',
            'update_at' => 'Update At',
            'tag' => '标签'
        ];
    }
}
