<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Terminarz */

$this->title = 'Update Terminarz: ' . ' ' . $model->id_terminarza;
$this->params['breadcrumbs'][] = ['label' => 'Terminarzs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_terminarza, 'url' => ['view', 'id' => $model->id_terminarza]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="terminarz-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
