<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\CategoriaSearch;

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

        <?= $form->field($model, 'id_categoria')->dropDownList($items = CategoriaSearch::find()
            ->select(['nome'])
            ->indexBy('id')
            ->column(),
        array('prompt'=>'Selecione a categoria'))?>
        <?= $form->field($model, 'curtir')->textInput(['value' => '0']) ?>
        <?= $form->field($model, 'descurtir')->textInput(['value' => '0']) ?>

    </div>
    <br>
    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('voltar', ['receita/index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
