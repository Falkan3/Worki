<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchStadion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stadion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_stadionu') ?>

    <?= $form->field($model, 'nazwa') ?>

    <?= $form->field($model, 'pojemnosc') ?>

    <?= $form->field($model, 'rok_wybudowania') ?>

    <?= $form->field($model, 'zdjecie') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
