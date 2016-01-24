<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchTerminarz */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="terminarz-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_terminarza') ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'godzina') ?>

    <?= $form->field($model, 'home') ?>

    <?= $form->field($model, 'away') ?>

    <?php // echo $form->field($model, 'wynik') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
