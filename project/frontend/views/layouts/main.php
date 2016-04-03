<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;/*
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;*/
use frontend\assets\AppAsset;
#use common\widgets\Alert;

#AppAsset::register($this);
$asset=frontend\assets\AppAsset::register($this);
$baseUrl=$asset->baseUrl;
$controller = Yii::$app->controller;
$default_controller = Yii::$app->defaultRoute;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php $currentSite = Yii::$app->getRequest()->getQueryParam('r'); ?>

<div class="wrap"> 
	<div class="header-top">
	        <div class="logo">
                        <img src="<?=$baseUrl?>/images/logo.png" alt=""/>
			 </div>
		     <div class="h_menu4"><!-- start h_menu4 -->
				<a class="toggleMenu" href="#">Menu</a>
				<ul class="nav">
                                    <li 
                                        <?php if($currentSite=="site/index") {echo 'class="active"';} ?>
                                    ><?= Html::a('Strona główna', ['site/index'], ['class' => '']); ?></li>
                                    <li><?= Html::a('Ligii'); ?>
                                        <ul>
                                            <?php
                                            $sql = "SELECT * FROM `liga`";
                                            $data = Yii::$app->db->CreateCommand($sql)->queryAll();
                                            foreach($data as $result) {
                                                echo "<li>";
                                                echo Html::a($result['nazwa_ligi'], ['site/league', 'id'=>$result['id_ligi']], ['class' => '']);
                                                echo "</li>";
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <li
                                        <?php if($currentSite=="site/about") {echo 'class="active"';} ?>
                                    ><?= Html::a('O nas', ['site/about'], ['class' => '']); ?></li>
                                    <li
                                        <?php if($currentSite=="site/contact") {echo 'class="active"';} ?>
                                    ><?= Html::a('Kontakt', ['site/contact'], ['class' => '']); ?></li>
<?php
if (Yii::$app->user->isGuest) {

    if($currentSite=="site/login") {echo "<li class=\"active\">". Html::a('Logowanie', ['site/login'], ['class' => ''])."</li>";}
    else {
        echo "<li>". Html::a('Logowanie', ['site/login'], ['class' => ''])."</li>";
    }
    if($currentSite=="site/signup") {echo "<li class=\"active\">". Html::a('Rejestracja', ['site/signup'], ['class' => ''])."</li>";}
    else {
        echo "<li>". Html::a('Rejestracja', ['site/signup'], ['class' => ''])."</li>";
    }
    } else {
        /*
        $menuItems[] = [
            'label' => 'Wyloguj (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ]; */
        echo "<li>".Html::a('Wyloguj (' . Yii::$app->user->identity->username . ')', ['site/logout'], ['class' => ''])."</li>";
    }
?>
					<li><a href="portfolio.html">Example</a>
						<ul>
							<li><a href="portfolio.html">Dropdown</a></li>
							<li><a href="portfolio.html">Structure</a></li>
							<li><a href="portfolio.html">People</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- end h_menu4 -->
			<div class="clear"></div>
		</div><!-- end header_main4 -->
	 </div>

    
    <?= $content ?>
    
		<div class="footer-bottom">
	 		  <div class="wrap">
	     	  	<div class="copy">
				   <p>© 2014 Template by <a href="http://w3layouts.com" target="_blank"> w3layouts</a></p>
			    </div>
			    <div class="social">	
				   <ul>	
					  <li class="facebook"><a href="#"><span> </span></a></li>
					  <li class="linkedin"><a href="#"><span> </span></a></li>
					  <li class="twitter"><a href="#"><span> </span></a></li>		
				   </ul>
			    </div>
			    <div class="clear"></div>
			  </div>
       </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
