<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Liga;
use app\models\Stadion;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchKlub */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kluby';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="klub-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Dodaj Klub', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id_klubu',
            'nazwa_klubu:ntext',
            [
                'attribute' => 'id_ligi',
                'label' => 'Liga',
                'value' =>  function($data) {
                                $liga = Liga::find()->where(['id_ligi' => $data['id_ligi']])->one();
                                return $liga['nazwa_ligi'];
                }
            ],
            [
                'attribute' => 'id_stadionu',
                'label' => 'Stadion', 
                'value' =>  function($data) {
                                if(isset($data['id_stadionu'])) {
                                    $stadion = Stadion::find()->where(['id_stadionu' => $data['id_stadionu']])->one();
                                    return $stadion['nazwa'];
                                } else {
                                    return "Brak";
                                }
                }
            ],
            [
                'attribute' => 'logo',
                'format' => 'image',
                'value' => function($data) {
                                return '?r=image/index&id=' . $data['logo'];
                },
            ],
            'trener',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
