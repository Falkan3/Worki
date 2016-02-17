<?php

namespace backend\controllers;

use yii\filters\AccessControl;

class MeczController extends \yii\web\Controller
{
    public $layout = 'admin';
    
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => ['index'],
                        'roles' => ['?'],
                    ],
                    [   'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@'],
                    ],
                ],
            ],  
        ];
    }
    
    public function actionIndex()
    {
        return $this->render('index');
    }

}
