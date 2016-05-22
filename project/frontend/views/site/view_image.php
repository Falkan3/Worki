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
                                    echo '<img src="'.$src.'" style="max-height: 100%; max-width: 100%;" />';
                                }
                                else
                                {
                                    echo 'Błąd';
                                }
                            ?>
                            <script src="http://code.jquery.com/jquery-latest.js"></script>
                            <script type="text/javascript" language="JavaScript">
                              function set_body_height() { // set body height = window height
                                $('body').height($(window).height());
                              }
                              $(document).ready(function() {
                                $(window).bind('resize', set_body_height);
                                set_body_height();
                              });
                            </script>
		</div>
	</div>
</div>