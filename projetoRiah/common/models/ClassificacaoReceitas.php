<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "classificacao_receitas".
 *
 * @property int $id
 * @property int $id_receitas
 * @property int $id_classificacao
 *
 * @property Classificacao $classificacao
 * @property Receita $receitas
 */
class ClassificacaoReceitas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'classificacao_receitas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_receitas', 'id_classificacao'], 'required'],
            [['id_receitas', 'id_classificacao'], 'integer'],
            [['id_classificacao'], 'exist', 'skipOnError' => true, 'targetClass' => Classificacao::className(), 'targetAttribute' => ['id_classificacao' => 'id']],
            [['id_receitas'], 'exist', 'skipOnError' => true, 'targetClass' => Receita::className(), 'targetAttribute' => ['id_receitas' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_receitas' => 'Id Receitas',
            'id_classificacao' => 'Id Classificacao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassificacao()
    {
        return $this->hasOne(Classificacao::className(), ['id' => 'id_classificacao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceitas()
    {
        return $this->hasOne(Receita::className(), ['id' => 'id_receitas']);
    }
}
