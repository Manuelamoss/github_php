<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "classificacao".
 *
 * @property int $id
 * @property string $nome
 *
 * @property ClassificacaoReceitas[] $classificacaoReceitas
 */
class Classificacao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'classificacao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 10],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassificacaoReceitas()
    {
        return $this->hasMany(ClassificacaoReceitas::className(), ['id_classificacao' => 'id']);
    }
}
