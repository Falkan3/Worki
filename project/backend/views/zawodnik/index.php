<?php

use app\models\Klub;
use app\models\SearchZawodnik;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $searchModel SearchZawodnik */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Zawodnicy';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zawodnik-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Dodaj Zawodnika', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id_zawodnika',
            'imie',
            'nazwisko',
            [
                'attribute' => 'id_klubu',
                'label' => 'Klub', 
                'value' =>  function($data) {
                                if(isset($data['id_klubu'])) {
                                    $stadion = Klub::find()->where(['id_klubu' => $data['id_klubu']])->one();
                                    return $stadion['nazwa_klubu'];
                                } else {
                                    return "Brak";
                                }
                }
            ],
            'pozycja',
            
            // będą wyświetlane w view
            // 'wzrost',
            // 'nr_koszulki',
            // 'zdjecie',
            // 'kraj',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
