<?php

namespace backend\controllers;

use common\models\Albunsartistas;
use common\models\AlbunsartistasSearch;
use common\models\ArtistasSearch;
use yii\web\Controller;
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
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
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
     * @param int $idartista Idartista
     * @return mixed
     */
    public function actionSelecionarArtista($idArtista)
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
    public function actionCreate()
    {
        $model = new Albunsartistas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idalbum' => $model->idalbum, 'idartista' => $model->idartista]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
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
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idalbum, $idartista)
    {
        $this->findModel($idalbum, $idartista)->delete();

        return $this->redirect(['index']);
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
