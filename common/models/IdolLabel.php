<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "idol_label".
 *
 * @property integer $id
 * @property integer $idol_id
 * @property integer $label_id
 * @property integer $create_time
 */
class IdolLabel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'idol_label';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idol_id', 'label_id', 'create_time'], 'required'],
            [['idol_id', 'label_id', 'create_time'], 'integer'],
            [['idol_id', 'label_id'], 'unique', 'targetAttribute' => ['idol_id', 'label_id'], 'message' => 'The combination of Idol ID and Label ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idol_id' => 'Idol ID',
            'label_id' => 'Label ID',
            'create_time' => 'Create Time',
        ];
    }
}
