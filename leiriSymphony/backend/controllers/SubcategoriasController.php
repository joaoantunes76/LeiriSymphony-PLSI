<?php

namespace backend\controllers;

use common\models\Subcategorias;
use common\models\SubcategoriasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SubcategoriasController implements the CRUD actions for Subcategorias model.
 */
class SubcategoriasController extends Controller
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
     * Lists all Subcategorias models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubcategoriasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Subcategorias model.
     * @param int $subcategoriaId Subcategoria ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($subcategoriaId)
    {
        return $this->render('view', [
            'model' => $this->findModel($subcategoriaId),
        ]);
    }

    /**
     * Creates a new Subcategorias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Subcategorias();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'subcategoriaId' => $model->subcategoriaId]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Subcategorias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $subcategoriaId Subcategoria ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($subcategoriaId)
    {
        $model = $this->findModel($subcategoriaId);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'subcategoriaId' => $model->subcategoriaId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Subcategorias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $subcategoriaId Subcategoria ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($subcategoriaId)
    {
        $this->findModel($subcategoriaId)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Subcategorias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $subcategoriaId Subcategoria ID
     * @return Subcategorias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($subcategoriaId)
    {
        if (($model = Subcategorias::findOne($subcategoriaId)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
