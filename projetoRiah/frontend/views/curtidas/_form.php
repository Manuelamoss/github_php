<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Curtidas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="curtidas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_receita')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
