<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchTerminarz */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Terminarz';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terminarz-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Dodaj mecz', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id_terminarza',
            'data',
            'godzina',
            'home',
            'away',
            // 'wynik:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
