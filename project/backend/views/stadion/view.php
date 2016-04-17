<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Stadion */

$this->title = $model->nazwa;
$this->params['breadcrumbs'][] = ['label' => 'Stadions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stadion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Zapisz', ['update', 'id' => $model->id_stadionu], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Usuń', ['delete', 'id' => $model->id_stadionu], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Czy jesteś pewny że chcesz usunąć ten stadion?',
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
            [
                'attribute' => 'zdjecie',
                'format' => 'image',
                'value' =>  '?r=image/index&id=' . $model->zdjecie,
            ],
        ],
    ]) ?>

</div>
