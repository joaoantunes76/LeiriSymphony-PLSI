<?php

namespace backend\controllers;

use app\models\UploadForm;
use common\models\Albuns;
use common\models\AlbunsSearch;
use common\models\Imagens;
use common\models\Musicas;
use common\models\MusicasSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AlbunsController implements the CRUD actions for Albuns model.
 */
class AlbunsController extends Controller
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
                        'roles' => ['criarAlbum'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['verAlbum'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['editarAlbum'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['eliminarAlbum'],
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
     * Lists all Albuns models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlbunsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Albuns model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new MusicasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->where(['idalbuns' => $id]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Creates a new Albuns model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Albuns();
        $uploadForm = new UploadForm();

        if($this->request->isPost){
            $uploadForm->imageFile = UploadedFile::getInstance($uploadForm, 'imageFile');
            $now = date("mdyhis");
            if ($uploadForm->upload($now)) {
                $model->load($this->request->post());
                $image = new Imagens();
                $image->nome = $now . "." . $uploadForm->imageFile->extension;
                if($image->save()) {
                    $model->idimagem = $image->id;
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
                return $this->redirect(['index', 'error' => $model->errors]);
            }
            return $this->redirect(['index', 'error' => $uploadForm->errors]);
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'uploadForm' => $uploadForm,
        ]);
    }

    /**
     * Updates an existing Albuns model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $uploadForm = new UploadForm();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            $uploadForm->imageFile = UploadedFile::getInstance($uploadForm, 'imageFile');
            $now = date("mdyhis");
            if ($uploadForm->upload($now)) {
                $model->load($this->request->post());
                $image = new Imagens();
                $image->nome = $now . "." . $uploadForm->imageFile->extension;
                if($image->save()) {
                    unlink(   \Yii::getAlias('@webroot').'\uploads\\'.$model->idimagem0->nome);
                    $model->idimagem = $image->id;
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
                return $this->redirect(['index', 'error' => $model->errors]);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'uploadForm' => $uploadForm,
        ]);
    }

    /**
     * Deletes an existing Albuns model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        unlink(   \Yii::getAlias('@webroot').'\uploads\\'.$model->idimagem0->nome);
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Albuns model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Albuns the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Albuns::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
