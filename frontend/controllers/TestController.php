<?php

namespace frontend\controllers;

use common\lib\helpers\HttpResponse;
class TestController extends \yii\web\Controller
{
    public function actionTestSession() {
    	\Yii::$app->session->setCookieParams(['lifetime' => 86400]); 
    	\Yii::$app->session->setTimeout(86400);
        $name = \Yii::$app->session->get('name');
        \Yii::$app->session->set('name', 'ownliang');
    }

    public function actionTestSql() {
    	$labelIds = [1, 2]; // 要筛选的标签ID数组
    	$idCount = count($labelIds);
    	
    	// 生成占位符
    	$inQuery = implode(',', array_fill(0, $idCount, '?'));
    	// 生成SQL
    	$cmd = \Yii::$app->db->createCommand(
    			"select * from idol where id in (select idol_id from idol_label where label_id in ($inQuery) group by idol_id having count(*)=?)");
    	// 绑定占位的ID
    	foreach ($labelIds as $index => $id) {
    		$cmd->bindValue($index + 1, $id);
    	}	
    	$cmd->bindValue($idCount + 1, $idCount);
    	$result = $cmd->queryAll();
    	return HttpResponse::packReturn(0, '', $result);
    }
}
