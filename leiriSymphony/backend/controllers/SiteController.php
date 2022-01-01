<?php

namespace backend\controllers;

use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\BaseUrl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\Response;
use yii\helpers\Url;

/**
 * Site controller
 */
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
                'only' => ['login', 'index','logout'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['Administrador','Gestor de loja','Apoio ao cliente'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function($rule, $action) {
                    if (Yii::$app->user->isGuest){
                        Yii::$app->user->loginRequired();
                    } else {
                        throw new ForbiddenHttpException('Você não tem acesso a esta funcionalidade.');
                    }
                }
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
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->id);
            foreach ($roles as $role) {
                if ($role->name == 'Administrador' || $role->name == 'Gestor de loja' || $role->name == 'Apoio ao cliente') {
                    return $this->goHome();
                } else {
                    Yii::$app->user->logout();
                    return $this->redirect(['../../frontend/web/site/index']);
                }
            }
            return $this->goBack();
        }

        $model->password = '';

        $this->layout = 'blank';

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
}
