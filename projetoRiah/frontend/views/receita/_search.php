<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ReceitaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receita-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //  $form->field($model, 'id') ?>

    <?php //  $form->field($model, 'nome') ?>

    <?php //  $form->field($model, 'tempo_preparo') ?>

    <?= $form->field($model, 'descricao_preparo')->label('Ingredientes') ?>

    <?php // $form->field($model, 'id_categoria') ?>

    <?php // echo $form->field($model, 'curtir') ?>

    <?php // echo $form->field($model, 'descurtir') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
