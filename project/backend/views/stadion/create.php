<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Stadion */

$this->title = 'Dodaj Stadion';
$this->params['breadcrumbs'][] = ['label' => 'Stadions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stadion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
