<?php

use app\models\Klub;
use app\models\Zawodnik;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this View */
/* @var $model Zawodnik */

$this->title = $model->imie . " " . $model->nazwisko;
$this->params['breadcrumbs'][] = ['label' => 'Zawodnicy', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zawodnik-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edytuj', ['update', 'id' => $model->id_zawodnika], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Usuń', ['delete', 'id' => $model->id_zawodnika], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Czy na pewno chcesz usunąć tego zawodnika?',
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
            [
                'attribute' => 'id_klubu',
                'label' => 'Klub',
                'value' =>  isset($model->id_klubu) ? Klub::find()->where(['id_klubu' => $model->id_klubu])->one()->nazwa_klubu : "Brak",
            ],
            'pozycja:ntext',
            'wzrost',
            'nr_koszulki',
            'zdjecie:ntext',
            'kraj:ntext',
        ],
    ]) ?>

</div>
