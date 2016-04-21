<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Zawodnik */

$this->title = 'Edytuj Zawodnika: ' . ' ' . $model->imie . ' ' . $model->nazwisko;
$this->params['breadcrumbs'][] = ['label' => 'Zawodnicy', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->imie . ' ' . $model->nazwisko, 'url' => ['view', 'id' => $model->id_zawodnika]];
$this->params['breadcrumbs'][] = 'Edytuj';
?>
<div class="zawodnik-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
