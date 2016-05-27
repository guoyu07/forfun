<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "account_basic_info".
 *
 * @property integer $id
 * @property string $username
 * @property string $share_url
 * @property integer $history_score
 * @property integer $history_click
 * @property integer $last_login
 */
class AccountBasicInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account_basic_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['id', 'username', 'share_url', 'history_score', 'history_click', 'last_login'], 'required'],
            [['id', 'history_score', 'history_click', 'last_login'], 'integer'],
            [['username'], 'string', 'max' => 256],
            [['share_url'], 'string', 'max' => 512]
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
            'share_url' => 'Share Url',
            'history_score' => 'History Score',
            'history_click' => 'History Click',
            'last_login' => 'Last Login',
        ];
    }
    
    /**
     * 根据用户名查找账号
     * @param unknown $username
     * @return
     */
    public static function findAccount($username) {
    	return self::find()->asArray(true)->where(['username' => $username])->one();
    }
    
    /**
     * 创建账号
     * @param unknown $username
     * @param unknown $accountInfo
     * @return
     */
    public static function createAccount($username, $accountInfo) {
    	$account = new AccountBasicInfo();
    	$account->username = $username;
    	$account->share_url = $accountInfo['shareUrl'];
    	$account->history_score = 0;
    	$account->history_click = 0;
    	$account->last_login = time();
    	return $account->save();
    }
}
