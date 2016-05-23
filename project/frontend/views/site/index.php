<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use frontend\assets\AppAsset;
$asset=frontend\assets\AppAsset::register($this);
$baseUrl=$asset->baseUrl;
$this->title = 'Worki';

?>
<?php
    try
    {
        //$sql = "SELECT * FROM `terminarz` WHERE `data` = (SELECT MAX(`data`) FROM `terminarz`) ORDER BY `godzina`";
        $sql = "SELECT * FROM `terminarz` ORDER BY `data` DESC,`godzina` DESC LIMIT 5";
        $ostatnimecz = Yii::$app->db->CreateCommand($sql)->queryAll();
        
        $sql = "SELECT `id_klubu`,`nazwa_klubu`,`logo` from `klub` WHERE `id_klubu`=".$ostatnimecz[0]['home'].
                " UNION ALL SELECT `id_klubu`,`nazwa_klubu`,`logo` FROM `klub` WHERE `id_klubu`=".$ostatnimecz[0]['away'];
        //$sql2 = "SELECT * FROM `gol` WHERE `id_terminarza`=".$ostatnimecz[0]['id_terminarza'];
        foreach(array_slice($ostatnimecz,1) as $var)
        {
            $sql .= " UNION ALL SELECT `id_klubu`,`nazwa_klubu`,`logo` FROM `klub` WHERE `id_klubu`=".$var['home'].
                    " UNION ALL SELECT `id_klubu`,`nazwa_klubu`,`logo` FROM `klub` WHERE `id_klubu`=".$var['away'];  
            //$sql2 .= " UNION ALL SELECT * FROM `gol` WHERE `id_terminarza`=".$var['id_terminarza'];
        }
        $nazwyklubow = Yii::$app->db->CreateCommand($sql)->queryAll();
        
        $sql = "select id_strzelca as id, CONCAT(imie,' ',nazwisko) as name,zdjecie as photo, count(*) as 'goals' from gol, zawodnik WHERE zawodnik.`id_zawodnika`=gol.`id_strzelca`
                group by id_strzelca
                order by count(*) desc"; //name, goals
        $maxgol = Yii::$app->db->CreateCommand($sql)->queryAll();
        
        $sql = "select CONCAT(imie,' ',nazwisko) as name, zdjecie as photo, count(*) as 'assists' from gol, zawodnik WHERE zawodnik.`id_zawodnika`=gol.`id_asystenta`
                group by id_asystenta
                order by count(*) desc";
        $maxassist = Yii::$app->db->CreateCommand($sql)->queryAll();
        
        $sql = "select klub.`nazwa_klubu` as name, logo, count(*) as 'goals' from gol, zawodnik, klub WHERE zawodnik.`id_zawodnika`=gol.`id_strzelca` and zawodnik.`id_klubu` = klub.`id_klubu`
                group by zawodnik.`id_klubu`
                order by count(*) desc";
        $bestclub = Yii::$app->db->CreateCommand($sql)->queryAll();
    }
    catch(Exception $e)
    {
    }
?>

	 <div class="main">
	     <div class="wrap">
                 <h2 class="m_1">Witamy na stronie Worek Pił<br>Nowości ze świata sportu, wyniki, baza danych lig, drużyn, zawodników...</h2>
                        
	 	     <div class="content-top">
	 	    	<div class="col_1_of_4 span_1_of_4">
	 	    		<i class="match"> </i>
					<!--<img src="<?=$baseUrl?>/images/pic.jpg" alt=""/>-->
                                        <?php
                                        
                                        if(isset($maxgol[0]['photo']))
                                        {
                                            #echo '" class="img_profile_scaled"></td>';
                                            $src = '?r=image/index&id='.$maxgol[0]['photo'];
                                            echo "<td>".Html::a(Html::img( $src, ['class' => 'img_profile_scaled_centered', 'title' => $maxgol[0]['name'], 'alt' => $maxgol[0]['name']] ), ['site/player', 'id'=>$maxgol[0]['id']], ['class' => '']);
                                        }
                                        else
                                        {   
                                            $src = '?r=image/index&id=brak_zawodnika.png';
                                            echo '<td>'.Html::img( $src, ['class' => 'img_profile_scaled_centered', 'title' => 'Brak zdjęcia zawodnika', 'alt' => 'Brak zdjęcia zawodnika'] ).'</td>';
                                        }
                                        
                                        ?>
                                <hr>
					<div class="desc">
						<h3>Najlepszy strzelec</h3>
                                                <p>
                                                    <?php echo $maxgol[0]['name']."<br>Ilość goli: ".$maxgol[0]['goals'] ?>
                                                </p>
					</div>
				</div>
				<div class="col_1_of_4 span_1_of_4">
	 	    		<i class="best"> </i>
					<!--<img src="<?=$baseUrl?>/images/pic1.jpg" alt=""/>-->
                                        
                                        <?php
                                        
                                        if(isset($maxassist[0]['photo']))
                                        {
                                            #echo '" class="img_profile_scaled"></td>';
                                            $src = '?r=image/index&id='.$maxassist[0]['photo'];
                                            echo "<td>".Html::a(Html::img( $src, ['class' => 'img_profile_scaled_centered', 'title' => $maxassist[0]['name'], 'alt' => $maxassist[0]['name']] ), ['site/player', 'id'=>$maxgol[0]['id']], ['class' => '']);
                                        }
                                        else
                                        {   
                                            $src = '?r=image/index&id=brak_zawodnika.png';
                                            echo '<td>'.Html::img( $src, ['class' => 'img_profile_scaled_centered', 'title' => 'Brak zdjęcia zawodnika', 'alt' => 'Brak zdjęcia zawodnika'] ).'</td>';
                                        }
                                        
                                        ?>
                                <hr>
					<div class="desc">
						<h3>Najlepszy asystent</h3>
						<p>
                                                    <?php echo $maxassist[0]['name']."<br>Ilość asyst: ".$maxassist[0]['assists'] ?>
                                                </p>
					</div>
				</div>
				<div class="col_1_of_4 span_1_of_4">
	 	    		<i class="best"> </i>
					<!--<img src="<?=$baseUrl?>/images/pic2.jpg" alt=""/>-->
                                
                                        <?php
                                        
                                        if(isset($bestclub[0]['logo']))
                                        {
                                            #echo '" class="img_profile_scaled"></td>';
                                            $src = '?r=image/index&id='.$bestclub[0]['logo'];
                                            echo "<td>".Html::a(Html::img( $src, ['class' => 'img_profile_scaled_centered', 'title' => $bestclub[0]['name'], 'alt' => $bestclub[0]['name']] ), ['site/player', 'id'=>$maxgol[0]['id']], ['class' => '']);
                                        }
                                        else
                                        {   
                                            $src = '?r=image/index&id=error.png';
                                            echo '<td>'.Html::img( $src, ['class' => 'img_profile_scaled_centered', 'title' => 'Brak zdjęcia klubu', 'alt' => 'Brak zdjęcia klubu'] ).'</td>';
                                        }
                                        
                                        ?>
                                
                                <hr>
					<div class="desc">
                                            <h3>Najlepszy klub</h3>
						<p>
                                                    <?php echo $bestclub[0]['name']."<br>Ilość goli: ".$bestclub[0]['goals'] ?>
                                                </p>
					</div>
				</div>
				<div class="clear"></div>
		     </div>
		     <div class="m_3"><span class="left_line"></span>Ostatnie mecze<span class="right_line"> </span></div>
		      <div class="content-middle">
                          
                        <?php
                          if(isset($ostatnimecz) && count($ostatnimecz)>=1)
                          {
                              echo '
                              <table class="league_table">
                              <tr>
                                  <th>Data:</th><th>Gospodarze:</th><th>Goście:</th><th>Wynik:</th>
                              </tr>';
                              $i=0;
                              foreach($ostatnimecz as $result) 
                              {
                                  echo "<tr>";
                                      //echo "<td>".$result['id_terminarza']."</td>";
                                      echo "<td>".Html::a($result['data']." [".$result['godzina']."]", ['site/match', 'id'=>$result['id_terminarza']], ['class' => ''])."</td>";
                                      //Kluby
                                      foreach(array_slice($nazwyklubow,$i,2) as $klub)
                                      {
                                        if(isset($klub['logo']))
                                        {
                                          $src = '?r=image/index&id='.$klub['logo'];
                                          echo "<td>".Html::a(Html::img( $src, ['class' => '', 'title' => $klub['nazwa_klubu'], 'alt' => $klub['nazwa_klubu']] )
                                                  , ['site/team', 'id'=>$klub['id_klubu']], ['class' => ''])."</td>";                                       
                                        }
                                        else if(isset($klub['nazwa_klubu']))
                                        {
                                          echo "<td>".Html::a($klub['nazwa_klubu'], ['site/team', 'id'=>$klub['id_klubu']], ['class' => ''])."</td>";                                       
                                        }
                                        else {echo "<td>-</td>";}
                                      }
                                      echo "<td>".$result['wynik']."</td>";
                                      
                                  echo "</tr>";
                                  
                                  $i=$i+2;
                              }
                              echo "</table>";
                          }
                      ?>
                          
                          <!--
	 	    	<div class="col_1_of_middle span_1_of_middle">
	 	    		<img src="<?=$baseUrl?>/images/mac_img1.png" alt=""/>
	 	    	</div>
                        <div class="col_1_of_middle span_1_of_middle">
                            <h3>diam nonummy nibh euismod tincidunt ut laoreet dolore</h3>
	 	    	   <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie</p>
	 	    	   <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam</p>
	 	    	   <div class="btn"><a href="#">Learn More</a></div>
	 	    	</div>
				<div class="clear"></div>
                          -->
		     </div>
                     
                     <!--
		     <div class="content-middle-bottom">
	 	    	<div class="col_1_of_middle span_1_of_middle">
	 	    	   <h3>diam nonummy nibh euismod tincidunt ut laoreet dolore</h3>
	 	    	   <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duisautem vel eum iriure dolor in hendrerit in vulputate velit esse molestie</p>
	 	    	   <div class="btn"><a href="#">Learn More</a></div>
	 	    	</div>
				<div class="col_1_of_middle span_1_of_middle">
					<ul class="progress vertical">
					  <li class="bar bar-success" style="width:100%;height:70%;"> </li>
					</ul>
					<ul class="progress vertical">
					  <li class="bar bar-success" style="width:100%;height:60%;"> </li>
				    </ul>
				    <ul class="progress vertical">
					  <li class="bar bar-success" style="width:100%;height:20%;"> </li>
				    </ul>
				    <ul class="progress vertical">
					  <li class="bar bar-success" style="width:100%;height:40%;"> </li>
				    </ul>
				    <ul class="progress vertical">
					  <li class="bar bar-success" style="width:100%;height:10%;"> </li>
				    </ul>
			    </div>
				<div class="clear"></div>
		     </div>
                     -->
                     
                     <!--
		     <div class="m_3"><span class="left_line"></span> Our Projects<span class="right_line"> </span></div>
		      <div class="content-top">
				 <div class="col_1_of_projects span_1_of_projects"><a href="#">
				   <div class="view view-first">
                    <img src="<?=$baseUrl?>/images/pic3.jpg" alt=""/>
                      <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                         <a class="popup-with-zoom-anim" href="#small-dialog3"> <div class="info">Read More</div></a>
		                     <div id="small-dialog3" class="mfp-hide">
							   <div class="pop_up2">
							   	  <img src="<?=$baseUrl?>/images/pic3.jpg" alt=""/>
							   	  <h3 class="m_4"><a href="#">augue duis dolore te feugait</a></h3>
				                  <p class="m_5">Photography</p>
							   </div>
							 </div>
                        </div>
                     </div> 
					<h3 class="m_4"><a href="#">augue duis dolore te feugait</a></h3>
				    <p class="m_5">Photography</p>
				  </a> </div>
				 <div class="col_1_of_projects span_1_of_projects"><a href="#">
				   <div class="view view-first">
                    <img src="<?=$baseUrl?>/images/pic6.jpg" alt=""/>
                      <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                         <a class="popup-with-zoom-anim" href="#small-dialog4"> <div class="info">Read More</div></a>
		                     <div id="small-dialog4" class="mfp-hide">
							   <div class="pop_up2">
							   	  <img src="<?=$baseUrl?>/images/pic6.jpg"/ alt=""/>
							   	   <h3 class="m_4"><a href="#">augue duis dolore te feugait</a></h3>
				    				<p class="m_5">Branding</p>
							   </div>
							 </div>
                        </div>
                     </div> 
					<h3 class="m_4"><a href="#">augue duis dolore te feugait</a></h3>
				    <p class="m_5">Branding</p>
				  </a> </div>
				 <div class="col_1_of_projects span_1_of_projects"><a href="#">
				   <div class="view view-first">
                    <img src="<?=$baseUrl?>/images/pic5.jpg" alt=""/>
                      <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                         <a class="popup-with-zoom-anim" href="#small-dialog5"> <div class="info">Read More</div></a>
		                     <div id="small-dialog5" class="mfp-hide">
							   <div class="pop_up2">
							   	  <img src="<?=$baseUrl?>/images/pic5.jpg"/ alt=""/>
							   	   <h3 class="m_4"><a href="#">augue duis dolore te feugait</a></h3>
				    			   <p class="m_5">Web Design</p>
							   </div>
							 </div>
                        </div>
                     </div> 
					<h3 class="m_4"><a href="#">augue duis dolore te feugait</a></h3>
				    <p class="m_5">Web Design</p>
				  </a> </div>
				 <div class="col_1_of_projects span_1_of_projects"><a href="#">
				   <div class="view view-first">
                    <img src="<?=$baseUrl?>/images/pic4.jpg" alt=""/>
                      <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                         <a class="popup-with-zoom-anim" href="#small-dialog6"> <div class="info">Read More</div></a>
		                     <div id="small-dialog6" class="mfp-hide">
							   <div class="pop_up2">
							   	  <img src="<?=$baseUrl?>/images/pic4.jpg"/ alt=""/>
							   	   <h3 class="m_4"><a href="#">augue duis dolore te feugait</a></h3>
				    				<p class="m_5">Marketing</p>
							   </div>
							 </div>
                        </div>
                     </div> 
					<h3 class="m_4"><a href="#">augue duis dolore te feugait</a></h3>
				    <p class="m_5">Marketing</p>
				  </a> </div>
				<div class="clear"></div>
		 </div> 
                -->
                     
			</div>
	    </div>
	    <div class="footer">
			<div class="wrap">
				<div class="footer-grid footer-grid1">
					<div class="f-logo">
				     <a href="index.html"><img src="<?=$baseUrl?>/images/f-logo.png" alt=""></a>
			        </div>
					<p>Serwis sportowy Worek Pił - najnowsze informacje ze świata piłki nożnej!</p>
				</div>
				<div class="footer-grid footer-grid2">
					<h4>Kontakt</h4>
				    <ul>
						<li><i class="pin"> </i><div class="extra-wrap">
							<p>1234 Ulica,<br> Gdynia, Polska</p>
						</div></li>
						<li><i class="phone"> </i><div class="extra-wrap">
							<p>+123 456 789</p>
						</div></li>
						<li><i class="mail"> </i><div class="extra-wrap1">
							<p>info@worekpil.com</p>
						</div></li>
						<li><i class="earth"> </i><div class="extra-wrap1">
							<p>worek@worekpil.com</p>
						</div></li>
					</ul>
				</div>
				<div class="footer-grid footer-grid3">
					<h4>Najnowsze Tweety</h4>
					<div class="recent-tweet">
						<div class="recent-tweet-icon">
							<span> </span>
						</div>
						<div class="recent-tweet-info">
							<p>Przykładowy tekst tweeta <a href="#"> 3 Hours Ago</a></p>
						</div>
						<div class="clear"> </div>
					</div>
					<div class="recent-tweet1">
						<div class="recent-tweet-icon">
							<span> </span>
						</div>
						<div class="recent-tweet-info">
							<p>Przykładowy tekst tweeta <a href="#"> 3 Hours Ago</a></p>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
				<div class="footer-grid footer-grid4">
					<h4>Newsletter</h4>
					<p>Subskrybuj Worek Pił i bądź na bieżąco</p>
					<form>
						<input type="text" value="Email Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Adres E-mail';}">
						<input type="submit" value="">
					</form>
				</div>
				<div class="clear"> </div>
			</div>
		</div>