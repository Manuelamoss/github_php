<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'RIAH!';

if (Yii::$app->user->id) {
    ?>
    <h4>Para ver a receita é necessário fazer login.</h4>
    <?php
} else {
    ?>
    <div class="site-index">

        <div class="jumbotron">

            <h1>!RIAH!</h1>

            <p class="lead">Bem Vindo a página do administrador. </p>
            <p class="lead" id="font">Utilizador(a): <?= Yii::$app->user->identity->username ?> </p>
        </div>

        <div class="body-content">

            <div class="row">
                <div class="col-lg-4">
                    <h2>Gestão dos Utilizadores</h2>

                    <p><a class="btn btn-default" href= <?= Url::to(['user/index']) ?>>Abrir &raquo;</a></p>
                </div>
                <div class="col-lg-4">
                    <h2>Gestão das Receitas</h2>

                    <p><a class="btn btn-default" href= <?= Url::to(['receita/index']) ?>>Abrir &raquo;</a></p>
                </div>
                <div class="col-lg-4">
                    <h2>Gestão das Categorias</h2>

                    <p><a class="btn btn-default" href= <?= Url::to(['categoria/index']); ?>>Abrir &raquo;</a></p>
                </div>
            </div>

        </div>
    </div>
<?php } ?>