
<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;


?>
<div class="site-index">

    <div class="jumbotron">

        <h1>!RIAH!</h1>

        <p class="lead">Receitas com 3 ingredientes apenas!</p>
        <p class="lead">Encontre a receita perfeita, prática e rápida para se orgulhar de prepará-la!</p>

        <p class="lead" id="font" >Utilizador(a): <?php// Yii::$app->user->identity->username ?> </p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Gestão dos Utilizadores</h2>

                <p><a class="btn btn-default" href= <?php// Url::to(['user/index'])?>>Abrir &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Gestão das Receitas</h2>

                <p><a class="btn btn-default" href= <?= Url::to(['receita/index'])?>>Abrir &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Gestão das Categorias</h2>

                <p><a class="btn btn-default" href= <?php// Url::to(['categoria/index']); ?>>Abrir &raquo;</a></p>
            </div>
        </div>

    </div>
</div>