<?php

namespace backend\controllers;

use common\models\Carrinho;
use common\models\Demonstracoes;
use common\models\DemonstracoesSearch;
use common\models\Encomendasprodutos;
use common\models\Imagens;
use common\models\Produtosfavoritos;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Marcas;
use common\models\Produtos;
use yii\filters\VerbFilter;
use common\models\Subcategorias;
use common\models\ProdutosSearch;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii;

/**
 * ProdutosController implements the CRUD actions for Produtos model.
 */
class ProdutosController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'create', 'view','update','delete','logout'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['Administrador','Gestor de loja','Apoio ao cliente'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['criarProduto'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['verProduto'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['editarProduto'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['eliminarProduto'],
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
                        throw new ForbiddenHttpException('Voc?? n??o tem acesso a esta funcionalidade.');
                    }
                }
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                ],
            ],
        ];
    }

    /**
     * Lists all Produtos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProdutosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Produtos model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new DemonstracoesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->where(['idproduto' => $id]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Produtos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Produtos();
        $marcas = Marcas::find()->all();
        $subcategorias = Subcategorias::find()->all();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'marcas' => $marcas,
            'subcategorias' => $subcategorias,
        ]);
    }

    /**
     * Updates an existing Produtos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $marcas = Marcas::find()->all();
        $subcategorias = Subcategorias::find()->all();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'marcas' => $marcas,
            'subcategorias' => $subcategorias,
        ]);
    }

    /**
     * Deletes an existing Produtos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $carrinhos = Carrinho::find()->where(['idproduto' => $model->id])->all();
        foreach ($carrinhos as $carrinho)
        {
            $carrinho->delete();
        }

        $favoritos = Produtosfavoritos::find()->where(['idproduto' => $model->id])->all();
        foreach ($favoritos as $favorito)
        {
            $favorito->delete();
        }

        if (Imagens::find()->where(['idproduto' => $model->id])->exists() || Demonstracoes::find()->where(['idproduto' => $model->id])->exists() || Encomendasprodutos::find()->where(['idproduto' => $model->id])->exists()){
            Yii::$app->session->setFlash('error', 'Por favor certifique-se de que as associa????es (imagens/demonstra????es/encomendas) s??o removidas antes de eliminar o Produto');
            return $this->redirect(['view', 'id' => $model->id]);
        }else{
            $model->delete();
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Produtos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Produtos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Produtos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
