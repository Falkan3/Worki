<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchZawodnik */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Zawodniks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zawodnik-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Zawodnik', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_zawodnika',
            'imie:ntext',
            'nazwisko:ntext',
            'id_klubu',
            'pozycja:ntext',
            // 'wzrost',
            // 'nr_koszulki',
            // 'zdjecie:ntext',
            // 'kraj:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
