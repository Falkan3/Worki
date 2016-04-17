<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Liga */

$this->title = $model->nazwa_ligi;

?>
<div class="liga-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edytuj', ['update', 'id' => $model->id_ligi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Usuń', ['delete', 'id' => $model->id_ligi], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Czy jesteś pewien, że chce usunąć tę ligę?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_ligi',
            'nazwa_ligi',
            'kraj',
            [
                'attribute' => 'logo',
                'format' => 'image',
                'value' => '?r=image/index&id=' . $model->logo,
            ],
        ],
    ]) ?>

</div>
