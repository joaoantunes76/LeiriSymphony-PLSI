<?php

namespace backend\controllers;

use common\models\Encomendas;
use common\models\LoginForm;
use common\models\Pedidosdecontacto;
use common\models\Produtos;
use common\models\ProdutosSearch;
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
        $mensagensUtilizadores = count(Pedidosdecontacto::find()->all());
        $mes = date('m');
        $encomendasDesteMes = Encomendas::find()->where('data LIKE "%-'.$mes.'-%"')->all();
        $lucroMensal = 0;
        $possivelLucroMensal = 0;
        $numEncomendasDoMes = 0;
        foreach($encomendasDesteMes as $encomenda){
            $possivelLucroMensal += $encomenda->preco;
            if($encomenda->pago == 1){
                $lucroMensal += $encomenda->preco;
            }
            $numEncomendasDoMes++;
        }


        $searchModel = new ProdutosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->where(['stock' => 0]);


        return $this->render('index', [
            'mensagensDisponiveis' => $mensagensUtilizadores,
            'lucroMensal' => $lucroMensal,
            'possivelLucroMensal' => $possivelLucroMensal,
            'numEncomendasDoMes' => $numEncomendasDoMes,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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
