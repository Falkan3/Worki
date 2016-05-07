<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Liga;
use app\models\Stadion;

/* @var $this yii\web\View */
/* @var $model app\models\Klub */

$this->title = $model->nazwa_klubu;
$this->params['breadcrumbs'][] = ['label' => 'Kluby', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="klub-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edytuj', ['update', 'id' => $model->id_klubu], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Usuń', ['delete', 'id' => $model->id_klubu], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Czy na pewno chcesz usunąć ten klub?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_klubu',
            'nazwa_klubu',
            [
                'attribute' => 'id_ligi',
                'label' => 'Liga',
                'value' =>  Liga::find()->where(['id_ligi' => $model->id_ligi])->one()->nazwa_ligi,
            ],
            [
                'attribute' => 'id_stadionu',
                'label' => 'Stadion',
                'value' =>  isset($model->id_stadionu) ? Stadion::find()->where(['id_stadionu' => $model->id_stadionu])->one()->nazwa : "Brak",
            ],
            [
                'attribute' => 'logo',
                'format' => 'image',
                'value' => '?r=image/index&id=' . $model->logo,
            ],
            'trener',
        ],
    ]) ?>

</div>
