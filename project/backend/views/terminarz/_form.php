<?php

use app\models\Klub;
use app\models\Terminarz;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this View */
/* @var $model Terminarz */
/* @var $form ActiveForm */
?>

<div class="terminarz-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= DatePicker::widget([
            'model' => $model,
            'attribute' => 'data',
            //'language' => 'ru',
            //'dateFormat' => 'yyyy-MM-dd',
        ]);
    ?>
    
    <?= $form->field($model, 'godzina')->textInput() ?>

    <?php
        $dataPost = ArrayHelper::map(Klub::find()->asArray()->all(), 'id_klubu', 'nazwa_klubu');
        echo $form->field($model, 'home')->dropDownList(
            $dataPost,           
            ['home' => 'nazwa_klubu']
        );
    ?>
    
    <?php
        $dataPost = ArrayHelper::map(Klub::find()->asArray()->all(), 'id_klubu', 'nazwa_klubu');
        echo $form->field($model, 'away')->dropDownList(
            $dataPost,           
            ['away' => 'nazwa_klubu']
        );
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Dodaj' : 'Zapisz', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
