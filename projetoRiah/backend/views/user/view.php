<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <div class="funtoTitulo" align="center">
        <h1>Username: <?= Html::encode($this->title) ?></h1>
    </div>

    <p align="center">
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <!--utilizador não pode ser deletado-->
        <?php /*Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])*/ ?>
    </p>

    <div class="fundoBranco">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                //'username',
                'auth_key',
                'password_hash',
                'password_reset_token',
                'email:email',
                'status',
                'created_at',
                'updated_at',
            ],
        ]) ?>
    </div>

</div>
