<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchStadion */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stadiony';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stadion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Dodaj Stadion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id_stadionu',
            'nazwa:ntext',
            'pojemnosc:ntext',
            'rok_wybudowania',
            [
                'attribute' => 'zdjecie',
                'format' => 'image',
                'value' =>  function($data) {
                                return '?r=image/index&id=' . $data['zdjecie'];
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
