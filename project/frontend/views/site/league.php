<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Ligii';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main">
    <div class="wrap">
        <div class="site-league">
            <h1><?= Html::encode($this->title) ?></h1>
            <table>
                <tr><th>Nazwa</th><td>Bundesliga</td><tr/>
                <tr><th>Kraj</th><td>Niemcy</td><tr/>
                <tr><th>Logo</th><td></td><tr/>
            </table>
            <hr>
            <h2>Tabela wyników</h2>
            <table>
                <tr><th>Pozycja</th><th>Nazwa klubu</th><th>Logo</th></tr>
                <tr><td>1</td><td><?= Html::a('Bayern Monachium', ['site/team']); ?></td><td></td></tr>
                <tr><td>2</td><td><?= Html::a('Borussia Dortmund', ['site/team']); ?></td><td></td></tr>      
            </table>
        </div>
    </div>
</div>