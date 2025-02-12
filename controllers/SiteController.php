<?php

namespace app\controllers;

use app\models\Task;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
{
    return [
        'access' => [
            'class' => AccessControl::class,
            'rules' => [
               
                [
                    'actions' => ['about', 'login', 'signup'],
                    'allow' => true,
                    'roles' => ['?'], 
                ],
                
                [
                    'actions' => ['logout', 'index', 'about'],
                    'allow' => true,
                    'roles' => ['@'], 
                ],
                
                [
                    'allow' => false,
                    'roles' => ['?'], 
                ],
            ],
        ],
        'verbs' => [
            'class' => VerbFilter::class,
            'actions' => [
                'logout' => ['post'],
            ],
        ],
    ];
}


    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
        {
            
            $userId = Yii::$app->user->id;
            $model = Task::find()->where(['user_id' => $userId])->orderBy(['created_at' => SORT_DESC])->all();
            return $this->render('index', ['tasks' => $model]);
        }





    public function actionSignup()
    {
        $model = new User();

        if (Yii::$app->request->isPost) {
            $postData = Yii::$app->request->post();
            $model->password = $postData['User']['password'];
            if ($model->signup($postData)) {
                Yii::$app->session->setFlash('success', 'Signup successful! You can now login.');
                return $this->redirect(['login']);
            } else {
                Yii::$app->session->setFlash('error', 'Signup failed. Please try again.');
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }





    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
