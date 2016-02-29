<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Liga */

$this->title = 'Edytuj ligę: ' . ' ' . $model->id_ligi;

?>
<div class="liga-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
