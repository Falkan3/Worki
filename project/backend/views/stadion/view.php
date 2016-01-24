<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Stadion */

$this->title = $model->id_stadionu;
$this->params['breadcrumbs'][] = ['label' => 'Stadions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stadion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_stadionu], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_stadionu], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_stadionu',
            'nazwa:ntext',
            'pojemnosc:ntext',
            'rok_wybudowania',
            'zdjecie:ntext',
        ],
    ]) ?>

</div>
