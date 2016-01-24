<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Liga */

$this->title = 'Update Liga: ' . ' ' . $model->id_ligi;
$this->params['breadcrumbs'][] = ['label' => 'Ligas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ligi, 'url' => ['view', 'id' => $model->id_ligi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="liga-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
