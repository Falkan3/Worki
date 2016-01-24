<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Klub */

$this->title = 'Create Klub';
$this->params['breadcrumbs'][] = ['label' => 'Klubs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="klub-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
