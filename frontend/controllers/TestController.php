<?php

namespace frontend\controllers;

class TestController extends \yii\web\Controller
{
    public function actionTestSession()
    {
    	\Yii::$app->session->setCookieParams(['lifetime' => 86400]); 
    	\Yii::$app->session->setTimeout(86400);
        $name = \Yii::$app->session->get('name');
        \Yii::$app->session->set('name', 'ownliang');
    }

}
