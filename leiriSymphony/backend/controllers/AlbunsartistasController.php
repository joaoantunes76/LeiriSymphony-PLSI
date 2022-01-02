<?php

namespace backend\controllers;

use Yii;
use common\models\Albunsartistas;
use common\models\AlbunsartistasSearch;
use common\models\ArtistasSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlbunsartistasController implements the CRUD actions for Albunsartistas model.
 */
class AlbunsartistasController extends Controller
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
     * Lists all Albunsartistas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlbunsartistasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Albunsartistas models.
     * @param int $album Album
     * @return mixed
     */
    public function actionSelecionarArtista($album)
    {
        $searchModel = new ArtistasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('selecionar-artista', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Albunsartistas model.
     * @param int $idalbum Idalbum
     * @param int $idartista Idartista
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idalbum, $idartista)
    {
        return $this->render('view', [
            'model' => $this->findModel($idalbum, $idartista),
        ]);
    }

    /**
     * Creates a new Albunsartistas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idalbum, $idartista = null)
    {
        $model = new Albunsartistas();
        $searchModel = new ArtistasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if (isset($idartista)) {
            $model->idalbum = $idalbum;
            $model->idartista = $idartista;
            if($model->save()){
                return $this->redirect(['albuns/view', 'id' => $model->idalbum]);
            }
            else {
                return $this->redirect(['albuns/view', 'id' => $model->idalbum, 'error' => 1]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing Albunsartistas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idalbum Idalbum
     * @param int $idartista Idartista
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idalbum, $idartista)
    {
        $model = $this->findModel($idalbum, $idartista);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idalbum' => $model->idalbum, 'idartista' => $model->idartista]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Albunsartistas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idalbum Idalbum
     * @param int $idartista Idartista
     * @return mixed
     */
    public function actionDelete($idalbum, $idartista)
    {
        $this->findModel($idalbum, $idartista)->delete();

        return $this->redirect(['albuns/view?id='.$idalbum]);
    }

    /**
     * Finds the Albunsartistas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idalbum Idalbum
     * @param int $idartista Idartista
     * @return Albunsartistas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idalbum, $idartista)
    {
        if (($model = Albunsartistas::findOne(['idalbum' => $idalbum, 'idartista' => $idartista])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
