<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Klub */

$this->title = $model->id_klubu;
$this->params['breadcrumbs'][] = ['label' => 'Klubs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="klub-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_klubu], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_klubu], [
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
            'id_klubu',
            'nazwa_klubu:ntext',
            'id_ligi',
            'id_stadionu',
            'logo:ntext',
            'trener:ntext',
        ],
    ]) ?>

</div>
