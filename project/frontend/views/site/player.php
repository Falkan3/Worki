<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Zawodnicy';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="main">
    <div class="wrap">
        <div class="site-league">
    <h1><?= Html::encode($this->title) ?></h1>
    
    <h2>Informacje</h2>
    <table>
        <tr><th>Imie</th><td>Robert</td></tr>
        <tr><th>Nazwisko</th><td>Lewandowski</td></tr>
        <tr><th>Kraj</th><td>Polska</td></tr>
        <tr><th>Klub</th><td><?= Html::a('Bayern Monachium', ['site/team']); ?></td></tr>
        <tr><th>Pozycja</th><td>Napastnik</td></tr>
        <tr><th>Wzrost</th><td>nie wiem</td></tr>
        <tr><th>Numer koszulki</th><td>nie wiem</td></tr>
        <tr><th>Zdjęcie</th><td>nie mam</td></tr>
        <tr><th>Ilość strzelonych goli w lidze</th><td>mniej niż Aubameyang <3</td></tr>
    </table>
        </div>
    </div>
</div>