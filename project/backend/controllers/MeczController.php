<?php

namespace backend\controllers;

class MeczController extends \yii\web\Controller
{
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
