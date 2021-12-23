<?php

namespace frontend\controllers;

use common\models\Categorias;
use common\models\Marcas;
use common\models\Produtos;
use common\models\ProdutosSearch;
use common\models\Subcategorias;
use common\models\Carrinho;
use phpDocumentor\Reflection\Types\Array_;
use Yii;
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
        $marcas = Marcas::find()->all();
        $categorias = Categorias::find()->all();
        $subcategorias = Subcategorias::find()->all();

        if (!isset($_GET["Categoria"]) && !isset($_GET["Marca"]) && !isset($_GET["Subcategoria"]) && !isset($_GET["nome"])) {
            $produtos = Produtos::find()->all();
        } else {
            $whereCondition = null;
            if(isset($_GET["Categoria"])) {
                $categoriaId = $_GET["Categoria"];
                $whereCondition = ['idcategoria' => $categoriaId];
            }
            if(isset($_GET["Marca"])){
                $marcaId = $_GET["Marca"];
                if($whereCondition != null){
                    $whereCondition += ['idmarca' => $marcaId];
                }
                else {
                    $whereCondition = ['idmarca' => $marcaId];
                }
            }
            if(isset($_GET["Subcategoria"])){
                $subcategoriaId = $_GET["Subcategoria"];
                if($whereCondition != null){
                    $whereCondition += ['idsubcategoria' => $subcategoriaId];
                }
                else {
                    $whereCondition = ['idsubcategoria' => $subcategoriaId];
                }
            }
            if(isset($_GET["nome"])){
                $nome = $_GET["nome"];
                if($whereCondition != null){
                    $whereCondition += ['nome' => $nome];
                }
                else {
                    $whereCondition = ['like', 'produtos.nome', '%'. $nome . '%', false];
                }
            }

            $produtos = Produtos::find()->innerJoinWith('idsubcategoria0')->where($whereCondition)->all();
        }

        return $this->render('index', [
            'produtos' => $produtos,
            'marcas' => $marcas,
            'categorias' => $categorias,
            'subcategorias' => $subcategorias,
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
        if ($this->request->isPost) {
            $produtoId = $_POST["Produtos"]["id"];
            $iduser = Yii::$app->user->id;

            $exists = Carrinho::find()->where( [ 'idproduto' => $produtoId ] )->andWhere( [ 'idperfil' => $iduser ] )->exists();

            $carrinho = new Carrinho();
            $carrinho->idproduto = $produtoId;
            $carrinho->idperfil = $iduser;
            if ($exists){
                Yii::$app->session->setFlash('success', "Este produto já foi adicionado ao carrinho.");
            }else{
                $carrinho->save();
            }

            return $this->render('view', [
                'model' => $this->findModel($produtoId),
            ]);

        } else {
            return $this->render('view', [
                'model' => $this->findModel($produtoId),
            ]);
        }


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
