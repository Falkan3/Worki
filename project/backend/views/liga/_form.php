<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Liga */
/* @var $form yii\widgets\ActiveForm */

/*
 * TODO:
 * - dodawanie plików (weryfikacja czy graficzny, przeniesienie do odpowiedniego folderu i dodanie ściezki)
 */
?>

<div class="liga-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nazwa_ligi')->textInput(); ?>

    <?= $form->field($model, 'kraj')->textInput(); ?>

    <?= $form->field($model, 'logo')->fileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Dodaj' : 'Zapisz', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
