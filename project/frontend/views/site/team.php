<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Drużyny';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-team">
    <h1><?= Html::encode($this->title) ?></h1>
    
    <h2>Informacje</h2>
    <table>
        <tr><th>Logo</th><td></td></tr>
        <tr><th>Nazwa</th><td>Bayern Monachium</td></tr>
        <tr><th>Liga</th><td><?= Html::a('Bundesliga', ['site/league']); ?></td></tr>
        <tr><th>Trener</th><td>Guardiola</td></tr>
        <tr><th>Aktualna pozycja</th><td>1</td></tr>
    </table>
    <hr>
    <h2>Stadion</h2>
    <table>
        <tr><th>Nazwa</th><td>Allianz Arena</td></tr>
        <tr><th>Pojemność</th><td>10000</td></tr>
        <tr><th>Rok wybudowania</th><td>1900</td></tr>
        <tr><th>Zdjęcie</th><td></td></tr>
    </table>
    <hr>
    <h2>Zawodnicy</h2>
    <ul>
        <li><?= Html::a('Robert Lewandowski', ['site/player']); ?></li>
    </ul>
</div>
