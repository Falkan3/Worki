<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use frontend\assets\AppAsset;
$asset=frontend\assets\AppAsset::register($this);
$baseUrl=$asset->baseUrl;
$this->title = 'Worki';

?>
	 <<div class="main">
	     <div class="wrap">
	 	   <h2 class="m_1">dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</h2>
	 	     <div class="content-top">
	 	    	<div class="col_1_of_4 span_1_of_4">
	 	    		<i class="settings"> </i>
					<img src="<?=$baseUrl?>/images/pic.jpg" alt=""/>
					<div class="desc">
						<h3>Easy Customizable</h3>
						<p>Lorem ipsum dolor sit amet,consect<br> adipiscing elit, sed diam nonummy nibh<br>euismod tincidunt ut laoreet dolore delenit.</p>
					</div>
				</div>
				<div class="col_1_of_4 span_1_of_4">
	 	    		<i class="clock"> </i>
					<img src="<?=$baseUrl?>/images/pic1.jpg" alt=""/>
					<div class="desc">
						<h3>Project Planning</h3>
						<p>augue duis dolore te feugait nulla<br> adipiscing elit, sed diam nonummy nibh<br>euismod tincidunt ut laoreet dolore delenit.</p>
					</div>
				</div>
				<div class="col_1_of_4 span_1_of_4">
	 	    		<i class="aeroplane"> </i>
					<img src="<?=$baseUrl?>/images/pic2.jpg" alt=""/>
					<div class="desc">
						<h3>Fastest Workers</h3>
						<p>soluta nobis eleifend option congue<br> adipiscing elit, sed diam nonummy nibh<br>euismod tincidunt ut laoreet dolore delenit.</p>
					</div>
				</div>
				<div class="clear"></div>
		     </div>
		     <div class="m_3"><span class="left_line"></span> Top Features<span class="right_line"> </span></div>
		      <div class="content-middle">
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
		     </div>
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
							   	  <img src="<?=$baseUrl?>/images/pic3.jpg"/ alt=""/>
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
			</div>
	    </div>
	    <div class="footer">
			<div class="wrap">
				<div class="footer-grid footer-grid1">
					<div class="f-logo">
				     <a href="index.html"><img src="<?=$baseUrl?>/images/f-logo.png" alt=""></a>
			        </div>
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words</p>
				</div>
				<div class="footer-grid footer-grid2">
					<h4>Contact</h4>
				    <ul>
						<li><i class="pin"> </i><div class="extra-wrap">
							<p>2321 Street name,<br> City name,Country</p>
						</div></li>
						<li><i class="phone"> </i><div class="extra-wrap">
							<p>+2321 256 652</p>
						</div></li>
						<li><i class="mail"> </i><div class="extra-wrap1">
							<p>info@comapnay name.com</p>
						</div></li>
						<li><i class="earth"> </i><div class="extra-wrap1">
							<p>info@comapnay name.com</p>
						</div></li>
					</ul>
				</div>
				<div class="footer-grid footer-grid3">
					<h4>Latest Tweets</h4>
					<div class="recent-tweet">
						<div class="recent-tweet-icon">
							<span> </span>
						</div>
						<div class="recent-tweet-info">
							<p>Ds which don't look even slightly believable. If you are going to use a passage <a href="#"> 3 Hours Ago</a></p>
						</div>
						<div class="clear"> </div>
					</div>
					<div class="recent-tweet1">
						<div class="recent-tweet-icon">
							<span> </span>
						</div>
						<div class="recent-tweet-info">
							<p>Ds which don't look even slightly believable. If you are going to use a passage <a href="#"> 3 Hours Ago</a></p>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
				<div class="footer-grid footer-grid4">
					<h4>News Letter</h4>
					<p>Randomised words which don't look even slightly believable. If you are going to use a passage</p>
					<form>
						<input type="text" value="Email Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}">
						<input type="submit" value="">
					</form>
				</div>
				<div class="clear"> </div>
			</div>
		</div>