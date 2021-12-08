<?php

namespace backend\controllers;

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
     * @param int $imagemId Imagem ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($imagemId)
    {
        return $this->render('view', [
            'model' => $this->findModel($imagemId),
        ]);
    }

    /**
     * Creates a new Imagens model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
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
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
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
            'produtos' => $produtos,
        ]);
    }

    /**
     * Updates an existing Imagens model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $imagemId Imagem ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($imagemId)
    {
        $model = $this->findModel($imagemId);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'imagemId' => $model->imagemId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Imagens model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $imagemId Imagem ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($imagemId)
    {
        $this->findModel($imagemId)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Imagens model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $imagemId Imagem ID
     * @return Imagens the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($imagemId)
    {
        if (($model = Imagens::findOne($imagemId)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
