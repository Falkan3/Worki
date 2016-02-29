<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchLiga */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ligii';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="liga-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Dodaj ligę', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id_ligi',
            'nazwa_ligi:ntext',
            'kraj:ntext',
            'logo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
