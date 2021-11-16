<?php

namespace backend\controllers;

use app\models\Encomendas;
use app\models\EncomendasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EncomendasController implements the CRUD actions for Encomendas model.
 */
class EncomendasController extends Controller
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
     * Lists all Encomendas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EncomendasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Encomendas model.
     * @param int $encomendaId Encomenda ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($encomendaId)
    {
        return $this->render('view', [
            'model' => $this->findModel($encomendaId),
        ]);
    }

    /**
     * Creates a new Encomendas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Encomendas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'encomendaId' => $model->encomendaId]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Encomendas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $encomendaId Encomenda ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($encomendaId)
    {
        $model = $this->findModel($encomendaId);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'encomendaId' => $model->encomendaId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Encomendas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $encomendaId Encomenda ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($encomendaId)
    {
        $this->findModel($encomendaId)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Encomendas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $encomendaId Encomenda ID
     * @return Encomendas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($encomendaId)
    {
        if (($model = Encomendas::findOne($encomendaId)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
