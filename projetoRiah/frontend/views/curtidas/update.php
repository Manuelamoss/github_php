<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Curtidas */

$this->title = 'Update Curtidas: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Curtidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="curtidas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
