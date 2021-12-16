<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "perfis".
 *
 * @property int $perfilId
 * @property int $user_id
 * @property string $nome
 * @property string|null $NIF
 * @property string|null $endereco
 * @property string|null $cidade
 * @property string|null $codigoPostal
 * @property string|null $telefone
 *
 * @property Encomendas[] $encomendas
 * @property Eventos[] $eventosEventos
 * @property EventosPerfis[] $eventosPerfis
 * @property Notificacoes[] $notificacoes
 * @property Pedidosdecontacto[] $pedidosdecontactos
 * @property Problemas[] $problemasProblemas
 * @property Produtos[] $produtos
 * @property ProdutosFavoritos[] $produtosFavoritos
 * @property User $user
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
            [['user_id', 'nome'], 'required'],
            [['user_id'], 'integer'],
            [['nome', 'endereco', 'cidade', 'codigoPostal'], 'string', 'max' => 45],
            [['NIF', 'telefone'], 'string', 'max' => 9],
            [['telefone'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'perfilId' => 'Perfil ID',
            'user_id' => 'User ID',
            'nome' => 'Nome',
            'NIF' => 'Nif',
            'endereco' => 'Endereco',
            'cidade' => 'Cidade',
            'codigoPostal' => 'Codigo Postal',
            'telefone' => 'Telefone',
        ];
    }

    /**
     * Gets query for [[Encomendas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEncomendas()
    {
        return $this->hasMany(Encomendas::className(), ['perfilId' => 'perfilId']);
    }

    /**
     * Gets query for [[EventosEventos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEventosEventos()
    {
        return $this->hasMany(Eventos::className(), ['eventoId' => 'eventos_eventoId'])->viaTable('eventos_perfis', ['perfis_perfilId' => 'perfilId']);
    }

    /**
     * Gets query for [[EventosPerfis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEventosPerfis()
    {
        return $this->hasMany(EventosPerfis::className(), ['perfis_perfilId' => 'perfilId']);
    }

    /**
     * Gets query for [[Notificacoes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotificacoes()
    {
        return $this->hasMany(Notificacoes::className(), ['perfilId' => 'perfilId']);
    }

    /**
     * Gets query for [[Pedidosdecontactos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidosdecontactos()
    {
        return $this->hasMany(Pedidosdecontacto::className(), ['perfis_perfilId' => 'perfilId']);
    }

    /**
     * Gets query for [[ProblemasProblemas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProblemasProblemas()
    {
        return $this->hasMany(Problemas::className(), ['problemaId' => 'problemas_problemaId'])->viaTable('pedidosdecontacto', ['perfis_perfilId' => 'perfilId']);
    }

    /**
     * Gets query for [[Produtos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produtos::className(), ['produtoId' => 'produtoId'])->viaTable('produtos_favoritos', ['perfilId' => 'perfilId']);
    }

    /**
     * Gets query for [[ProdutosFavoritos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutosFavoritos()
    {
        return $this->hasMany(ProdutosFavoritos::className(), ['perfilId' => 'perfilId']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
