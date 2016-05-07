<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = 'Obrazek';
$this->params['breadcrumbs'][] = $this->title;

$src = Yii::$app->getRequest()->getQueryParam('src');
#$src = '?r=image/index&id='.$id;
?>
<div class="main">
    <div class="wrap">
		<div class="site-error">
			<h1><?= Html::encode($this->title) ?></h1>
                            <?php 
                                if(isset($src))
                                {
                                    echo '<img src="'.$src.'"/>';
                                }
                                else
                                {
                                    echo 'Błąd';
                                }
                            ?>                        
		</div>
	</div>
</div>