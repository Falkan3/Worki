<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Stadion */

$this->title = 'Update Stadion: ' . ' ' . $model->id_stadionu;
$this->params['breadcrumbs'][] = ['label' => 'Stadions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_stadionu, 'url' => ['view', 'id' => $model->id_stadionu]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stadion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
