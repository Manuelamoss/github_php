<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Receita */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receita-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempo_preparo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao_preparo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_categoria')->textInput() ?>

    <?= $form->field($model, 'curtir')->textInput() ?>

    <?= $form->field($model, 'descurtir')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
