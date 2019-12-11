<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tag".
 *
 * @property int $tag_id
 * @property string $tag_name
 * @property int $credate_at
 * @property int $update_at
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tag_name', 'credate_at', 'update_at'], 'required'],
            [['credate_at', 'update_at'], 'integer'],
            [['tag_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tag_id' => 'Tag ID',
            'tag_name' => 'Tag Name',
            'credate_at' => 'Credate At',
            'update_at' => 'Update At',
        ];
    }
}
