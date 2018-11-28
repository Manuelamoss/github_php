<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Receita */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receita-form">
    <div class="fundoBranco">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tempo_preparo')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'descricao_preparo')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'id_categoria')->textInput() ?>

        <?php // $form->field($model, 'curtir')->textInput() ?>

        <?php // $form->field($model, 'descurtir')->textInput() ?>
    </div>
    <br>
    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('voltar', ['receita/index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
