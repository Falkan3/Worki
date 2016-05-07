<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Zawodnik */

$this->title = 'Dodaj Zawodnika';
$this->params['breadcrumbs'][] = ['label' => 'Zawodnicy', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zawodnik-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
