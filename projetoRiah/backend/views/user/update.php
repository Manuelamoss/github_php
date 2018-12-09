<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Permissão - Id: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">
    <div class="fundoTitulo" align="center">
        <h1><?= Html::encode($this->title) ?></h1>

        <p> Status 0: Bloqueado.</p>
        <p> Status 5: Administrador.</p>
        <p> Status 10: Ativo.</p>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
