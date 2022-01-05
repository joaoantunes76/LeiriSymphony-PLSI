<?php

namespace backend\controllers;

use common\models\Musicas;
use common\models\MusicasSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;
use app\models\UploadForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * MusicasController implements the CRUD actions for Musicas model.
 */
class MusicasController extends Controller
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
                        'roles' => ['criarMusica'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['verMusica'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['editarMusica'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['eliminarMusica'],
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
                ],
            ],
        ];
    }

    /**
     * Lists all Musicas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MusicasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Musicas model.
     * @param int $id ID
     * @param int $idalbuns Idalbuns
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $idalbuns)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $idalbuns),
        ]);
    }

    /**
     * Creates a new Musicas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Musicas();
        $uploadForm = new UploadForm();

        if(isset($_GET["albumId"])){
            $albumId = $_GET["albumId"];
            if ($this->request->isPost) {
                $model->load($this->request->post());
                $uploadForm->musicFile = UploadedFile::getInstance($uploadForm, 'musicFile');
                $now = date("mdyhis");
                if ($uploadForm->uploadMusic($now)) {
                    $model->ficheiro =  $now . "." . $uploadForm->musicFile->extension;
                    $model->idalbuns = $albumId;
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id, 'idalbuns' => $model->idalbuns]);
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
     * Updates an existing Musicas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @param int $idalbuns Idalbuns
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $idalbuns)
    {
        $model = $this->findModel($id, $idalbuns);
        $uploadForm = new UploadForm();

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $uploadForm->musicFile = UploadedFile::getInstance($uploadForm, 'musicFile');
            $now = date("mdyhis");
            if ($uploadForm->uploadMusic($now)) {
                unlink(\Yii::getAlias('@webroot').'\uploads\musics\\'.$model->ficheiro);
                $model->ficheiro = $now . "." . $uploadForm->musicFile->extension;
                $model->idalbuns = $idalbuns;
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id, 'idalbuns' => $model->idalbuns]);
                }
            }
        }
        return $this->render('update', [
            'model' => $model,
            'uploadForm' => $uploadForm
        ]);
    }

    /**
     * Deletes an existing Musicas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @param int $idalbuns Idalbuns
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $idalbuns)
    {

        $this->findModel($id, $idalbuns)->delete();

        return $this->redirect(['albuns/view?id='.$idalbuns]);
    }

    /**
     * Finds the Musicas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @param int $idalbuns Idalbuns
     * @return Musicas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $idalbuns)
    {
        if (($model = Musicas::findOne(['id' => $id, 'idalbuns' => $idalbuns])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
