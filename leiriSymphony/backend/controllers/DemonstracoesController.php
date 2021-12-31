<?php

namespace backend\controllers;

use app\models\UploadForm;
use common\models\Demonstracoes;
use common\models\DemonstracoesSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DemonstracoesController implements the CRUD actions for Demonstracoes model.
 */
class DemonstracoesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['Administrador','Gestor de loja'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['criarDemonstracao'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['verDemonstracao'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['editarDemonstracao'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['eliminarDemonstracao'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],
                ],
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
     * Lists all Demonstracoes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DemonstracoesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Demonstracoes model.
     * @param int $id ID
     * @param int $idproduto Idproduto
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $idproduto)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $idproduto),
        ]);
    }

    /**
     * Creates a new Demonstracoes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Demonstracoes();
        $uploadForm = new UploadForm();

        if (isset($_GET['produtoId'])){
            $produtoId = $_GET['produtoId'];
            if ($this->request->isPost) {
                $model->load($this->request->post());
                $uploadForm->demoFile = UploadedFile::getInstance($uploadForm, 'demoFile');
                $now = date("mdyhis");
                if ($uploadForm->uploadDemo($now)){
                    $model->nome =  $now . "." . $uploadForm->demoFile->extension;
                    $model->idproduto = $produtoId;
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id, 'idproduto' => $model->idproduto]);
                    }
                }
            } else {
                $model->loadDefaultValues();
            }
            return $this->render('create', [
                'model' => $model,
                'uploadForm' => $uploadForm
            ]);
        }
        else {
            return $this->redirect('index');
        }
    }

    /**
     * Updates an existing Demonstracoes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @param int $idproduto Idproduto
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $idproduto)
    {
        $model = $this->findModel($id, $idproduto);
        $uploadForm = new UploadForm();

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $uploadForm->demoFile = UploadedFile::getInstance($uploadForm, 'demoFile');
            $now = date("mdyhis");
            if ($uploadForm->uploadMusic($now)) {
                unlink(\Yii::getAlias('@webroot').'\uploads\demos\\'.$model->nome);
                $model->nome = $now . "." . $uploadForm->demoFile->extension;
                $model->idproduto = $idproduto;
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id, 'idproduto' => $model->idproduto]);
                }
            }
        }
        return $this->render('update', [
            'model' => $model,
            'uploadForm' => $uploadForm
        ]);
    }

    /**
     * Deletes an existing Demonstracoes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @param int $idproduto Idproduto
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $idproduto)
    {
        $this->findModel($id, $idproduto)->delete();

        return $this->redirect(['produtos/view?id='.$idproduto]);
    }

    /**
     * Finds the Demonstracoes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @param int $idproduto Idproduto
     * @return Demonstracoes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $idproduto)
    {
        if (($model = Demonstracoes::findOne(['id' => $id, 'idproduto' => $idproduto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
