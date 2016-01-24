<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchKlub */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Klubs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="klub-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Klub', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_klubu',
            'nazwa_klubu:ntext',
            'id_ligi',
            'id_stadionu',
            'logo:ntext',
            // 'trener:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
