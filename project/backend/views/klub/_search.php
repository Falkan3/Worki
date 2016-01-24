<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchKlub */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="klub-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_klubu') ?>

    <?= $form->field($model, 'nazwa_klubu') ?>

    <?= $form->field($model, 'id_ligi') ?>

    <?= $form->field($model, 'id_stadionu') ?>

    <?= $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'trener') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
