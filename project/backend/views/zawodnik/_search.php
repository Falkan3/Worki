<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchZawodnik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zawodnik-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_zawodnika') ?>

    <?= $form->field($model, 'imie') ?>

    <?= $form->field($model, 'nazwisko') ?>

    <?= $form->field($model, 'id_klubu') ?>

    <?= $form->field($model, 'pozycja') ?>

    <?php // echo $form->field($model, 'wzrost') ?>

    <?php // echo $form->field($model, 'nr_koszulki') ?>

    <?php // echo $form->field($model, 'zdjecie') ?>

    <?php // echo $form->field($model, 'kraj') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
