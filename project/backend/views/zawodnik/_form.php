<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Zawodnik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zawodnik-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'imie')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nazwisko')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_klubu')->textInput() ?>

    <?= $form->field($model, 'pozycja')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'wzrost')->textInput() ?>

    <?= $form->field($model, 'nr_koszulki')->textInput() ?>

    <?= $form->field($model, 'zdjecie')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kraj')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
