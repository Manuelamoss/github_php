<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Receita */

$this->title = 'Atualizar Receita - id: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Receitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="receita-update">
    <div class="fundoTitulo" align="center">
    <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
