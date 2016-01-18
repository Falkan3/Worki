<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
				'only' => ['logout', 'signup', 'about'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
						'roles' => ['?'],
                    ],
                    [
<<<<<<< HEAD
                        'actions' => ['logout', 'index', 'stadiony', 'kluby', 'zawodnicy', 'terminarz', 'mecz'],
=======
                        'actions' => ['logout'],
>>>>>>> aae35b00098a6f337512243ec95f5902ec0cd7b3
                        'allow' => true,
                        'roles' => ['@'],
                    ],
					[
					   'actions' => ['about'],
					   'allow' => true,
					   'roles' => ['@'],
					   'matchCallback' => function ($rule, $action) {
						   return User::isUserAdmin(Yii::$app->user->identity->username);
						}
					],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->loginAdmin()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    public function actionStadiony()
    {
        return $this->render('stadiony');
    }
    
    public function actionKluby() {
        return $this->render('index');
    }
    
    public function actionZawodnicy() {
        return $this->render('index');
    }
    
    public function actionTerminarz() {
        return $this->render('index');
    }
    
    public function actionMecz() {
        return $this->render('index');
    }
}
