<?php

namespace frontend\controllers;

use common\models\Produtos;
use common\models\ProdutosSearch;
use common\models\Subcategorias;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProdutosController implements the CRUD actions for Produtos model.
 */
class ProdutosController extends Controller
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
     * Lists all Produtos models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!isset($_GET["categoria"])) {
            $produtos = Produtos::find()->all();
        } else {
            switch ($_GET["categoria"]) {
                case "Guitarras":
                    $produtos = Produtos::find()->innerJoinWith('idsubcategoria0')->where(['idcategoria' => 1])->all();
                    break;
                case "Baterias":
                    $produtos = Produtos::find()->innerJoinWith('idsubcategoria0')->where(['idcategoria' => 2])->all();
                    break;
                case "Teclas":
                    $produtos = Produtos::find()->innerJoinWith('idsubcategoria0')->where(['idcategoria' => 3])->all();
                    break;
                case "Sopros":
                    $produtos = Produtos::find()->innerJoinWith('idsubcategoria0')->where(['idcategoria' => 4])->all();
                    break;
                case "Clássicos":
                    $produtos = Produtos::find()->innerJoinWith('idsubcategoria0')->where(['idcategoria' => 5])->all();
                    break;
                case "Tradicionais":
                    $produtos = Produtos::find()->innerJoinWith('idsubcategoria0')->where(['idcategoria' => 6])->all();
                    break;
                case "Acessórios":
                    $produtos = Produtos::find()->innerJoinWith('idsubcategoria0')->where(['idcategoria' => 7])->all();
                    break;
                case "Musicas":
                    $produtos = Produtos::find()->innerJoinWith('idsubcategoria0')->where(['idcategoria' => 8])->all();
                    break;
            }
        }

        return $this->render('index', [
            'produtos' => $produtos
        ]);
    }

    /**
     * Displays a single Produtos model.
     * @param int $produtoId Produto ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($produtoId)
    {
        return $this->render('view', [
            'model' => $this->findModel($produtoId),
        ]);
    }

    /**
     * Finds the Produtos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $produtoId Produto ID
     * @return Produtos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($produtoId)
    {
        if (($model = Produtos::findOne($produtoId)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
