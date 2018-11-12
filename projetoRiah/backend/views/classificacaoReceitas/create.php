<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ClassificacaoReceitas */

$this->title = 'Create Classificacao Receitas';
$this->params['breadcrumbs'][] = ['label' => 'Classificacao Receitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classificacao-receitas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
