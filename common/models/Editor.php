<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "editor".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $nickname
 * @property integer $create_time
 * @property integer $update_time
 */
class Editor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'editor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'nickname', 'create_time', 'update_time'], 'required'],
            [['create_time', 'update_time'], 'integer'],
            [['username', 'nickname'], 'string', 'max' => 128],
            [['password'], 'string', 'max' => 32],
            [['username'], 'unique']
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
            'password' => 'Password',
            'nickname' => 'Nickname',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
