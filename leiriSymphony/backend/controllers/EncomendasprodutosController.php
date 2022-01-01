<?php

namespace backend\controllers;

use common\models\Encomendasprodutos;
use common\models\EncomendasprodutosSearch;
use common\models\ProdutosSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;

/**
 * EncomendasprodutosController implements the CRUD actions for Encomendasprodutos model.
 */
class EncomendasprodutosController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'view','update','delete','logout'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['Administrador','Gestor de loja','Apoio ao cliente'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['verEncomenda'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['editarEncomenda'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['eliminarEncomenda'],
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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Encomendasprodutos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EncomendasprodutosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Encomendasprodutos model.
     * @param int $idencomenda Idencomenda
     * @param int $idproduto Idproduto
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idencomenda, $idproduto)
    {
        return $this->render('view', [
            'model' => $this->findModel($idencomenda, $idproduto),
        ]);
    }

    /**
     * Displays a single Encomendasprodutos model.
     * @param int $idencomenda Idencomenda
     * @param int $idproduto Idproduto
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionSelectproduto($idencomenda)
    {
        $searchModel = new ProdutosSearch();
        $subquery = Encomendasprodutos::find()->select('idproduto')->where(['idencomenda' => $idencomenda]);
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andWhere(['not in', 'produtos.id', $subquery]);

        return $this->render('selectproduto', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Encomendasprodutos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idencomenda, $idproduto)
    {
        $model = new Encomendasprodutos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['encomendas/view', 'id' => $model->idencomenda]);
            }

        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'idproduto' => $idproduto,
            'idencomenda' => $idencomenda,
        ]);
    }

    /**
     * Updates an existing Encomendasprodutos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idencomenda Idencomenda
     * @param int $idproduto Idproduto
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idencomenda, $idproduto)
    {
        $model = $this->findModel($idencomenda, $idproduto);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['encomendas/view', 'id' => $model->idencomenda]);
        }

        return $this->render('update', [
            'model' => $model,
            'idproduto' => $idproduto,
            'idencomenda' => $idencomenda,
        ]);
    }

    /**
     * Deletes an existing Encomendasprodutos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idencomenda Idencomenda
     * @param int $idproduto Idproduto
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idencomenda, $idproduto)
    {
        $this->findModel($idencomenda, $idproduto)->delete();

        return $this->redirect(['encomendas/view', 'id' => $idencomenda]);
    }

    /**
     * Finds the Encomendasprodutos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idencomenda Idencomenda
     * @param int $idproduto Idproduto
     * @return Encomendasprodutos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idencomenda, $idproduto)
    {
        if (($model = Encomendasprodutos::findOne(['idencomenda' => $idencomenda, 'idproduto' => $idproduto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
