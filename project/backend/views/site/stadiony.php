<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

use backend\models\Liga;

$this->title = 'Stadiony';
?>

<div class="body-content">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <p>Wybierz ligę, której stadiony chcesz obejrzeć:</p>
                
            <?php $form = ActiveForm::begin(['id' => 'league-search-form']); ?>
                
                <?php 
                    $dataList = ArrayHelper::map(Liga::getAllLeaguesIdAndNames(),'id_ligi','nazwa_ligi');
                ?>
                <?= $form->field($model, 'league')->dropDownList($dataList, ['prompt'=>'Wybierz ligę...']); ?>
            
                <div class="form-group">
                    <?= Html::submitButton('Wyszukaj', ['class' => 'btn btn-primary', 'name' => 'search-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        
        <div class="col-lg-6">
            <p>Dodaj nowy stadion:</p>
            
            <?php $form = ActiveForm::begin(['id' => 'league-add-button']); ?>

                <div class="form-group">
                    <?= Html::submitButton('Dodaj', ['class' => 'btn btn-primary', 'name' => 'add-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>

