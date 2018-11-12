<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ClassificacaoReceitas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="classificacao-receitas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_receitas')->textInput() ?>

    <?= $form->field($model, 'id_classificacao')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
