<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "idol".
 *
 * @property integer $id
 * @property string $username
 * @property integer $platform
 * @property string $jump_url
 * @property integer $online
 * @property string $title
 * @property string $image
 * @property string $detail
 * @property double $weight
 * @property integer $editor_id
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $fresh_time
 */
class Idol extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'idol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'platform', 'jump_url', 'online', 'title', 'image', 'detail', 'weight', 'editor_id', 'create_time', 'update_time', 'fresh_time'], 'required'],
            [['platform', 'online', 'editor_id', 'create_time', 'update_time', 'fresh_time'], 'integer'],
            [['weight'], 'number'],
            [['username', 'title'], 'string', 'max' => 128],
            [['jump_url', 'image'], 'string', 'max' => 4096],
            [['detail'], 'string', 'max' => 10240],
            [['username', 'platform'], 'unique', 'targetAttribute' => ['username', 'platform'], 'message' => 'The combination of Username and Platform has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'platform' => 'Platform',
            'jump_url' => 'Jump Url',
            'online' => 'Online',
            'title' => 'Title',
            'image' => 'Image',
            'detail' => 'Detail',
            'weight' => 'Weight',
            'editor_id' => 'Editor ID',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'fresh_time' => 'Fresh Time',
        ];
    }
}
