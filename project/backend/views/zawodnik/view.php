<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Zawodnik */

$this->title = $model->id_zawodnika;
$this->params['breadcrumbs'][] = ['label' => 'Zawodniks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zawodnik-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_zawodnika], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_zawodnika], [
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
            'id_zawodnika',
            'imie:ntext',
            'nazwisko:ntext',
            'id_klubu',
            'pozycja:ntext',
            'wzrost',
            'nr_koszulki',
            'zdjecie:ntext',
            'kraj:ntext',
        ],
    ]) ?>

</div>
