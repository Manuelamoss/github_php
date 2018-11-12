<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Classificacao */

$this->title = 'Criar Classificação';
$this->params['breadcrumbs'][] = ['label' => 'Classificações', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classificacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
