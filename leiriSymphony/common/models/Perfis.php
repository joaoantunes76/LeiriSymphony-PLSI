<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "perfis".
 *
 * @property int $id
 * @property int $iduser
 * @property string $nome
 * @property string|null $NIF
 * @property string|null $endereco
 * @property string|null $cidade
 * @property string|null $codigoPostal
 * @property string|null $telefone
 *
 * @property Avaliacao[] $avaliacaos
 * @property Encomendas[] $encomendas
 * @property Eventosperfis[] $eventosperfis
 * @property Eventos[] $ideventos
 * @property Informacoes[] $idproblemas
 * @property Produtos[] $idprodutos
 * @property Produtos[] $idprodutos0
 * @property User $iduser0
 * @property Pedidosdecontacto[] $pedidosdecontactos
 * @property Produtosfavoritos[] $produtosfavoritos
 */
class Perfis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iduser', 'nome'], 'required'],
            [['iduser'], 'integer'],
            [['nome', 'endereco', 'cidade', 'codigoPostal'], 'string', 'max' => 45],
            [['NIF', 'telefone'], 'string', 'max' => 9],
            [['telefone'], 'unique'],
            [['iduser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['iduser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iduser' => 'Iduser',
            'nome' => 'Nome',
            'NIF' => 'Nif',
            'endereco' => 'Endereco',
            'cidade' => 'Cidade',
            'codigoPostal' => 'Codigo Postal',
            'telefone' => 'Telefone',
        ];
    }

    /**
     * Gets query for [[Avaliacaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAvaliacaos()
    {
        return $this->hasMany(Avaliacao::className(), ['idperfil' => 'id']);
    }

    /**
     * Gets query for [[Encomendas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEncomendas()
    {
        return $this->hasMany(Encomendas::className(), ['idperfil' => 'id']);
    }

    /**
     * Gets query for [[Eventosperfis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEventosperfis()
    {
        return $this->hasMany(Eventosperfis::className(), ['idperfil' => 'id']);
    }

    /**
     * Gets query for [[Ideventos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdeventos()
    {
        return $this->hasMany(Eventos::className(), ['id' => 'idevento'])->viaTable('eventosperfis', ['idperfil' => 'id']);
    }

    /**
     * Gets query for [[Idproblemas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdproblemas()
    {
        return $this->hasMany(Informacoes::className(), ['id' => 'idproblema'])->viaTable('pedidosdecontacto', ['idperfil' => 'id']);
    }

    /**
     * Gets query for [[Idprodutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdprodutos()
    {
        return $this->hasMany(Produtos::className(), ['id' => 'idproduto'])->viaTable('avaliacao', ['idperfil' => 'id']);
    }

    /**
     * Gets query for [[Idprodutos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdprodutos0()
    {
        return $this->hasMany(Produtos::className(), ['id' => 'idproduto'])->viaTable('produtosfavoritos', ['idperfil' => 'id']);
    }

    /**
     * Gets query for [[Iduser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIduser0()
    {
        return $this->hasOne(User::className(), ['id' => 'iduser']);
    }

    /**
     * Gets query for [[Pedidosdecontactos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidosdecontactos()
    {
        return $this->hasMany(Pedidosdecontacto::className(), ['idperfil' => 'id']);
    }

    /**
     * Gets query for [[Produtosfavoritos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutosfavoritos()
    {
        return $this->hasMany(Produtosfavoritos::className(), ['idperfil' => 'id']);
    }
}
