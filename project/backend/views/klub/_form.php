<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Klub */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="klub-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nazwa_klubu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_ligi')->textInput() ?>

    <?= $form->field($model, 'id_stadionu')->textInput() ?>

    <?= $form->field($model, 'logo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'trener')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
