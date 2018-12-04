<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Comentario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comentario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_receita')->hiddenInput(['value' => $id_receita])->label(false); ?>
    <?= $form->field($model, 'id_user')->hiddenInput(['value' => Yii::$app->user->id])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
