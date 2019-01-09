<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\categoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">
    <div class="fundoBranco">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
            <?= Html::a('voltar', ['categoria/index'], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
