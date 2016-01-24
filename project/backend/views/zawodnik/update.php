<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Zawodnik */

$this->title = 'Update Zawodnik: ' . ' ' . $model->id_zawodnika;
$this->params['breadcrumbs'][] = ['label' => 'Zawodniks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_zawodnika, 'url' => ['view', 'id' => $model->id_zawodnika]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zawodnik-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
