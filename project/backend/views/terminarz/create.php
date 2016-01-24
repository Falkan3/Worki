<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Terminarz */

$this->title = 'Create Terminarz';
$this->params['breadcrumbs'][] = ['label' => 'Terminarzs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terminarz-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
