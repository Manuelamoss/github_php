<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "receita".
 *
 * @property int $id
 * @property string $nome
 * @property string $tempo_preparo
 * @property string $descricao_preparo
 * @property int $id_categoria
 *
 * @property ClassificacaoReceitas[] $classificacaoReceitas
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
            [['nome', 'tempo_preparo', 'descricao_preparo', 'id_categoria'], 'required'],
            [['descricao_preparo'], 'string'],
            [['id_categoria'], 'integer'],
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
            'tempo_preparo' => 'Tempo Preparo',
            'descricao_preparo' => 'Descricao Preparo',
            'categoria.nome' => 'Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassificacaoReceitas()
    {
        return $this->hasMany(ClassificacaoReceitas::className(), ['id_receitas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'id_categoria']);
    }
}
