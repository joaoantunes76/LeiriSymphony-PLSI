<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "produtos".
 *
 * @property int $produtoId
 * @property int $subcategoriaId
 * @property int $marcaId
 * @property string $produtoNome
 * @property string $descricao
 * @property int $digital
 * @property float $preco
 * @property string|null $ficheiro
 *
 * @property Demonstracoes[] $demonstracoes
 * @property Encomendas[] $encomendas
 * @property EncomendasProdutos[] $encomendasProdutos
 * @property Imagens[] $imagens
 * @property Marcas $marca
 * @property Perfis[] $perfils
 * @property ProdutosFavoritos[] $produtosFavoritos
 * @property Subcategorias $subcategoria
 */
class Produtos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produtos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subcategoriaId', 'marcaId', 'produtoNome', 'descricao', 'digital', 'preco'], 'required'],
            [['subcategoriaId', 'marcaId', 'digital'], 'integer'],
            [['descricao', 'ficheiro'], 'string'],
            [['preco'], 'number'],
            [['produtoNome'], 'string', 'max' => 45],
            [['marcaId'], 'exist', 'skipOnError' => true, 'targetClass' => Marcas::className(), 'targetAttribute' => ['marcaId' => 'marcaId']],
            [['subcategoriaId'], 'exist', 'skipOnError' => true, 'targetClass' => Subcategorias::className(), 'targetAttribute' => ['subcategoriaId' => 'subcategoriaId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'produtoId' => 'Produto ID',
            'subcategoriaId' => 'Subcategoria ID',
            'marcaId' => 'Marca ID',
            'produtoNome' => 'Produto Nome',
            'descricao' => 'Descricao',
            'digital' => 'Digital',
            'preco' => 'Preco',
            'ficheiro' => 'Ficheiro',
        ];
    }

    /**
     * Gets query for [[Demonstracoes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDemonstracoes()
    {
        return $this->hasMany(Demonstracoes::className(), ['produtos_produtoId' => 'produtoId']);
    }

    /**
     * Gets query for [[Encomendas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEncomendas()
    {
        return $this->hasMany(Encomendas::className(), ['encomendaId' => 'encomendaId'])->viaTable('encomendas_produtos', ['produtoId' => 'produtoId']);
    }

    /**
     * Gets query for [[EncomendasProdutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEncomendasProdutos()
    {
        return $this->hasMany(EncomendasProdutos::className(), ['produtoId' => 'produtoId']);
    }

    /**
     * Gets query for [[Imagens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImagens()
    {
        return $this->hasMany(Imagens::className(), ['produtoId' => 'produtoId']);
    }

    /**
     * Gets query for [[Marca]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarca()
    {
        return $this->hasOne(Marcas::className(), ['marcaId' => 'marcaId']);
    }

    /**
     * Gets query for [[Perfils]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfils()
    {
        return $this->hasMany(Perfis::className(), ['perfilId' => 'perfilId'])->viaTable('produtos_favoritos', ['produtoId' => 'produtoId']);
    }

    /**
     * Gets query for [[ProdutosFavoritos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutosFavoritos()
    {
        return $this->hasMany(ProdutosFavoritos::className(), ['produtoId' => 'produtoId']);
    }

    /**
     * Gets query for [[Subcategoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubcategoria()
    {
        return $this->hasOne(Subcategorias::className(), ['subcategoriaId' => 'subcategoriaId']);
    }
}
