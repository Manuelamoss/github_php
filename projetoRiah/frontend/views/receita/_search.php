<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\CategoriaSearch;

/* @var $this yii\web\View */
/* @var $model common\models\ReceitaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receita-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'id' => 'form',
    ]); ?>


    <?= $form->field($model, 'descricao_preparo')->label('Ingredientes (Escreva no campo abaixo até 3 ingredientes separados por espaços.)') ?>

    <?php $items = ArrayHelper::map($model::find()->all(), 'tempo_preparo', 'tempo_preparo'); ?>
    <?= $form->field($model, 'tempo_preparo')->label('Filtre por tempo de preparo')->dropDownList($items, ['prompt' => 'Selecione']) ?>

    <?php $categorias = ArrayHelper::map(CategoriaSearch::find()->asArray()->all(), 'id', 'nome'); ?>
    <?= $form->field($model, 'id_categoria')->label('Filtre por categoria')->dropDownList($categorias, ['prompt' => 'Selecione']) ?>

    <div class="form-group">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Limpar', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
