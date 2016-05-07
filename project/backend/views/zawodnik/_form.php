<?php

use app\models\Klub;
use app\models\Zawodnik;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Zawodnik */
/* @var $form ActiveForm */
?>

<div class="zawodnik-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'imie')->textInput() ?>

    <?= $form->field($model, 'nazwisko')->textInput() ?>

    <?php
        $dataPost = ArrayHelper::map(Klub::find()->asArray()->all(), 'id_klubu', 'nazwa_klubu');
        echo $form->field($model, 'id_klubu')->dropDownList(
            $dataPost,           
            ['id_klubu' => 'nazwa_klubu']
        );
    ?>

    <?= $form->field($model, 'pozycja')->textInput() ?>

    <?= $form->field($model, 'wzrost')->textInput() ?>

    <?= $form->field($model, 'nr_koszulki')->textInput() ?>

    <?= $form->field($model, 'zdjecie')->fileInput() ?>

    <?= $form->field($model, 'kraj')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Dodaj' : 'Zapisz', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
