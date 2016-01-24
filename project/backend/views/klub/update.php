<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Klub */

$this->title = 'Update Klub: ' . ' ' . $model->id_klubu;
$this->params['breadcrumbs'][] = ['label' => 'Klubs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_klubu, 'url' => ['view', 'id' => $model->id_klubu]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="klub-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
