<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "recipe".
 *
 * @property int $id
 * @property string $nome
 * @property string $tempo_preparo
 * @property string $descriao_preparo
 * @property int $id_category
 *
 * @property Category $category
 * @property RecipeRanking[] $recipeRankings
 */
class Recipe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'tempo_preparo', 'descriao_preparo', 'id_category'], 'required'],
            [['descriao_preparo'], 'string'],
            [['id_category'], 'integer'],
            [['nome', 'tempo_preparo'], 'string', 'max' => 20],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'id']],
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
            'descriao_preparo' => 'Descriao Preparo',
            'id_category' => 'Id Category',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'id_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipeRankings()
    {
        return $this->hasMany(RecipeRanking::className(), ['id_recipe' => 'id']);
    }
}
