<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "label".
 *
 * @property integer $id
 * @property string $name
 * @property string $detail
 * @property double $weight
 * @property integer $is_selector
 * @property integer $editor_id
 * @property integer $create_time
 * @property integer $update_time
 */
class Label extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'label';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'detail', 'weight', 'is_selector', 'editor_id', 'create_time', 'update_time'], 'required'],
            [['weight'], 'number'],
            [['is_selector', 'editor_id', 'create_time', 'update_time'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['detail'], 'string', 'max' => 10240],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'detail' => 'Detail',
            'weight' => 'Weight',
            'is_selector' => 'Is Selector',
            'editor_id' => 'Editor ID',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
