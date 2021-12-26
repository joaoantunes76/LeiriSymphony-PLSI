<?php

namespace backend\controllers;

use common\models\Encomendasprodutos;
use common\models\EncomendasprodutosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
     * Creates a new Encomendasprodutos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Encomendasprodutos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idencomenda' => $model->idencomenda, 'idproduto' => $model->idproduto]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
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
            return $this->redirect(['view', 'idencomenda' => $model->idencomenda, 'idproduto' => $model->idproduto]);
        }

        return $this->render('update', [
            'model' => $model,
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

        return $this->redirect(['index']);
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
