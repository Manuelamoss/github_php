<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Utilizadores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div class="fundoTitulo" align="center">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <div class="fundoBranco">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'options' => ['style' => 'table-layout:fixed;'],
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                ['header' => 'id',
                    'headerOptions' => ['style' => 'color:#3277b3'],
                    'value' => 'id',
                    'contentOptions' => ['style' => 'max-width: 100px;'],
                ],
                'username',
                'email:email',
                ['class' => 'yii\grid\ActionColumn',
                    'header' => "Ações",
                    'headerOptions' => [
                        'style' => 'color:#3277b3'
                    ],
                    'template' => '{view} {update}']
            ],
        ]); ?>
    </div>
    <br>
    <?= Html::a('voltar', ['site/index'], ['class' => 'btn btn-primary']) ?>
</div>
