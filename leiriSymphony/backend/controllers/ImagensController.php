<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\UploadForm;
use common\models\Imagens;
use yii\filters\VerbFilter;
use common\models\ImagensSearch;
use common\models\Produtos;
use yii\web\NotFoundHttpException;

/**
 * ImagensController implements the CRUD actions for Imagens model.
 */
class ImagensController extends Controller
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
                        'roles' => ['criarImagem'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['verImagem'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['eliminarImagem'],
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
     * Lists all Imagens models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ImagensSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Imagens model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Imagens model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idproduto)
    {
        $model = new Imagens();
        $uploadForm = new UploadForm();
        $produtos = Produtos::find()->all();

        if ($this->request->isPost) {
            $uploadForm->imageFile = UploadedFile::getInstance($uploadForm, 'imageFile');
            $now = date("mdyhis");
            if ($uploadForm->upload($now)) {
                $model->load($this->request->post());
                $model->nome = $now . "." . $uploadForm->imageFile->extension;
                $model->idproduto = $idproduto;
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Imagem adicionada com sucesso');
                    if($model->idproduto == null) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                    else{
                        return $this->redirect(['produtos/view?id='.$model->idproduto]);
                    }
                }
            }
            Yii::$app->session->setFlash('error', 'ocorreu um erro');
            if($model->idproduto == null) {
                return $this->redirect(Yii::$app->request->referrer);
            }
            else{
                return $this->redirect(['produtos/view?id='.$model->idproduto]);
            }

        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'uploadForm' => $uploadForm,
            'produtos' => $produtos,
        ]);
    }

    /**
     * Deletes an existing Imagens model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $idproduto = $model->idproduto;
        unlink(\Yii::getAlias('@webroot').'/uploads/'.$model->nome);
        $model->delete();

        return $this->redirect(['produtos/view?id='.$idproduto]);
    }

    /**
     * Finds the Imagens model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Imagens the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Imagens::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
