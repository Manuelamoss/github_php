<?php

namespace common\models;


/**
 * This is the model class for table "receita".
 *
 * @property int $id
 * @property string $nome
 * @property string $tempo_preparo
 * @property string $descricao_preparo
 * @property int $id_categoria
 * @property int $curtir
 * @property int $descurtir
 *
 * @property Comentario[] $comentarios
 * @property Categoria $categoria
 */
class Receita extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'receita';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'tempo_preparo', 'descricao_preparo', 'id_categoria', 'curtir', 'descurtir'], 'required'],
            [['descricao_preparo'], 'string'],
            [['id_categoria','curtir','descurtir'], 'integer'],
            [['nome', 'tempo_preparo'], 'string', 'max' => 20],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['id_categoria' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'tempo_preparo' => 'Tempo de Preparo',
            'descricao_preparo' => 'Descricao do Preparo',
            'categoria.nome' => 'Categoria',
            'curtir' => 'Curtir',
            'descurtir' => 'Descurtir',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentario::className(), ['id_receita' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'id_categoria']);
    }
}
