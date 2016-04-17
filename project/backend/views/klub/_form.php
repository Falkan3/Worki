<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Liga;

/* @var $this yii\web\View */
/* @var $model app\models\Klub */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="klub-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nazwa_klubu')->textInput() ?>
    
    <?php
        $dataPost = ArrayHelper::map(Liga::find()->asArray()->all(), 'id_ligi', 'nazwa_ligi');
        echo $form->field($model, 'id_ligi')->dropDownList(
            $dataPost,           
            ['id_ligi' => 'nazwa_ligi']
        );
    ?>

    <?= $form->field($model, 'id_stadionu')->textInput() ?>

    <?= $form->field($model, 'logo')->fileInput(); ?>

    <?= $form->field($model, 'trener')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Dodaj' : 'Zapisz', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
