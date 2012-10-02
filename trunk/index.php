<?php
session_start(); 
include_once("include/config.php");

if(isset($_GET["logout"]) && $_GET["logout"]==1){
	//User clicked logout button, distroy all session variables.}
	session_destroy();
	header('Location: '.$return_url);
}
?>
<!DOCTYPE html>
<html  xmlns:fb="http://www.facebook.com/2008/fbml" xml:lang="en-gb" lang="en-gb" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SPDR | State Street Global Advisors</title>
<link REL="SHORTCUT ICON" HREF="images/favicon.ico"/>
<meta name="viewport" content="width=768px, minimum-scale=1.0, maximum-scale=1.0" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/custom.css" type="text/css" rel="stylesheet" />
<link href="css/media_queries.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.1.js"></script>
<script src="js/jquery_002.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.localscroll-1.2.7-min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/coda-slider.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="http://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script>
<script>
function AjaxResponse(){
	 var myData = 'connect=1'; //For demo, we will pass a post variable, Check process_facebook.php
	 jQuery.ajax({
	 type: "POST",
	 url: "process_facebook.php",
	 dataType:"html",
	 data:myData,
	 success:function(response){
	 $("#results").html('<fieldset style="padding:20px">'+response+'</fieldset>'); //Result
 },
	 error:function (xhr, ajaxOptions, thrownError){
	 $("#results").html('<fieldset style="padding:20px;color:red;">'+thrownError+'</fieldset>'); //Error
 	}
 });
 }
 
function LodingAnimate() //Show loading Image
{
	$("#LoginButton").hide(); //hide login button once user authorize the application
	$("#results").html('<img src="ajax-loader.gif" /> Please Wait Connecting...'); //show loading image while we process user
}

function ResetAnimate() //Reset User button
{
	$("#LoginButton").show(); //Show login button 
	$("#results").html(''); //reset element html
}
</script> 
</head>
<body>	
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=310858069022323";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="header_container">
  <div class="center_container">
    <div class="spdr_logo"><a href="Index.html"><img src="images/spdr_logo.png" alt="SPDR Logo"/></a></div>
    <div class="share_container">
      <div class="share_txt">SHARE</div>
      <div class="share_bg">
        <div id="show-email" class="email_icon"></div>
        </a></div>
      <div class="share_bg">
        <a href="http://twitter.com/home?status=The%20destiny%20of%20the%20Bedni%20women%0Acan%20only%20change%20if%20more%20people%0Aare%20aware%20of%20their%20plight%20of%0Abecoming%20victims%20of%20prejudice%20and%0Aforced%20prostitution.%20Share%20this%0Astatus%20to%20show%20your%20support%20to%0Ahelp%20give%20them%20a%20life%20they%0Adeserve." target="_blank"> <div class="fb_icon"></div></a>
      </div>
      <div class="share_bg">
        <div id="show-fb" class="twitter_icon"></div>
      </div>
      <div class="share_bg">
        <div  id="show-gmail" class="gmail_icon"></div>
      </div>
    </div>
    <!-- close share container -->
  </div>
  <!-- close center container -->
</div>
<!-- close header container -->
<div class="game_container">
  <div class="game_container_shdow">
    <div class="center_container">
      <div id="email-panel">
        <div class="arrow-up arrow-up-email"></div>
        <a class="close-email-panel">
        <div class="light_box_cross_btn"><span>Close</span> <img src="images/cross_btn.png"/></div>
        </a>
        <div class="email_container">
          <div class="email_header">
            <div class="email_header_left">
              <h3>share this page by email:</h3>
              <h1>ARE YOU AS PRECISE <br/>
                AS A SPDR ETF?</h1>
            </div>
            <div class="email_header_right">
              <div class="email_header_right_content"> The information entered on this page will not be used to send unsolicited email, and will not be sold to a third party. Please read our <a href="#" target="_blank">Privacy Policy</a> below. </div>
            </div>
          </div>
          <!--close email header -->
          <div class="email_header_left">
            <div class="requiredfild_txt mrgL20"><span class="red">*</span> Required Fields. <em>(Separate multiple addresses with commas.)</em> </div>
            <div class="email_lbl_txt_con">
              <div class="email_txt_lbl">Your Name: <span class="red">*</span> </div>
              <input type="text" id="ename"/>
            </div>
            <div class="email_lbl_txt_con">
              <div class="email_txt_lbl">Your Email: <span class="red">*</span> </div>
              <input type="text" id="sender"/>
            </div>
            <div class="email_lbl_txt_con">
              <div class="email_txt_lbl">Recipient’s Email: <span class="red">*</span> </div>
              <input type="text" id="reciever"/>
            </div>
            <div class="email_lbl_txt_con width95perc">
              <div class="email_txt_lbl"><em>Add a custom message: Please limit your message to 500 characters.</em> </div>
              <textarea id="email_msg"></textarea>
            </div>
            <form>
            	<div class="email_lbl_txt_con width95perc" id="recptcha"></div>
            	<input type="hidden" name="remoteip" id="remoteip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>"  />            	
            </form>            
          </div>
          <!-- close email header left -->
          <div class="email_header_right">
            <div class="preview_email">Preview of the email</div>
            <div class="preview_email_img"><img src="images/email_preview.jpg"/></div>
            <div class="submit_btn mrgT20">
            	<img src="images/loading1.gif" alt="loading..." id="loading_data1">
              <input id="showemailsent" type="button"/>
            </div>
            <div class="cancel_email"><a class="close-email-panel" href="#">Cancel</a></div>
          </div>
          <!-- close email header right -->
        </div>
        <!-- close email container -->
        <div id="emailsent">
          <div class="email_header">
            <div class="email_header_left">
              <h3>share this page by email:</h3>
              <h1>ARE YOU AS PRECISE <br/>
                AS A SPDR ETF?</h1>
            </div>
            <div class="email_header_right"> </div>
          </div>
          <!--close email header -->
          <div class="email_header_left">
            <h3 class="mrgL20">Thank you.<br/>
              your email haS been sent.</h3>
            <div class="email_lbl_txt_con">
              <div class="email_txt_lbl">To</div>
            </div>
            <div class="email_sent_recp" id="recipient_id" > </div>
            <div class="send_again">
              <input id="sendagain" type="button"/>
            </div>
          </div>
          <!-- close email header left -->
          <div class="email_header_right">
            <div class="preview_email">Preview of the email</div>
            <div class="preview_email_img"><img src="images/email_preview.jpg"/></div>
          </div>
          <!-- close email header right -->
        </div>
        <!-- close email sent -->
      </div>
      <!-- close email panel -->
      <div id="emailbox_backlight"></div>
      <!-- /lightbox -->
      <div id="fb-panel">
        <div class="arrow-up arrow-up-fb"></div>
        <a class="close-email-panel">
        <div class="light_box_cross_btn"><span>Close</span> <img src="images/cross_btn.png"/></div>
        </a>
        <div style="margin: 20px 0px 0px 20px" class="fb-like" data-href="http://nikeshyadav.com/" data-send="true" data-width="450" data-show-faces="true"></div>
      </div>
      <!-- close fb panel -->
      <div id="emailbox_backlight"></div>
      <!-- /lightbox -->
      <div id="gmail-panel">
        <div class="arrow-up arrow-up-gmail"></div>
        <a class="close-email-panel">
        <div class="light_box_cross_btn"><span>Close</span> <img src="images/cross_btn.png"/></div>
        </a>
        <div class="gmail_link"
        	<a href="https://plus.google.com/share?url=fb.com" onclick="javascript:window.open('https://plus.google.com/share?url=fb.com','', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
        		<img src="images/gmail_btns.png">
        	</a>	
        

<!-- Place this tag after the last share tag. -->
 </div>
      </div>
      <!-- close fb panel -->
      <div id="emailbox_backlight"></div>
      <!-- /lightbox -->
      <div id="slider"> 
        <div class="scroll">
          <div class="scrollContainer">
            <div class="panel" id="stoptrain">
              <div class="stop_train_banner">
                <div class="overlay_box_container">
                  <h1>stop the train <br/>
                    in front of <br/>
                    the commuters.</h1>
                  <p>Once the train starts moving, click the “stop�? button to make the doors open in the right place.</p>
                  <div class="box_btn">
                    <div class="btn"><a href="#">START</a></div>
                  </div>
                </div>
              </div>
              <!-- close stop train banner -->
            </div>
            <!-- 1 -->
            <div class="panel" id="stowsuitcase">
              <div class="stow_suitcase_banner">
                <div class="overlay_box_container height285">
                  <h1>Stow the suitcase.</h1>
                  <p class="fix_stow_suitcase">To fit the suitcase into the overhead compartment, move the other objects around with your cursor.</p>
                  <div class="box_btn">
                    <div class="btn"><a href="#">START</a></div>
                  </div>
                </div>
              </div>
              <!-- close stop train banner -->
            </div>
            <!-- 1 -->
            <div class="panel" id="parkcar">
              <div class="park_car_banner">
                <div class="overlay_box_container height252">
                  <h1>Park the Car.</h1>
                  <p>With your cursor, parallel park the car without hitting anything.</p>
                  <div class="box_btn">
                    <div class="btn"><a href="#">START</a></div>
                  </div>
                </div>
              </div>
              <!-- close stop train banner -->
            </div>
            <!-- 1 -->
          </div>
        </div>
        <ul class="navigation">
          <li> <a href="#stoptrain">
            <div class="stop_train_thumb img_thumb">
              <div class="cover boxcaption">
                <div class="view_lb">
                  <div class="view_lb_arrw">&nbsp;</div>
                  <div class="view_lb_txt">View Leaderboard</div>
                </div>
                <!-- close view lb -->
                <div class="view_lb_detail">
                  <div class="view_lb_score_container width100px">
                    <div class="green_txt">All Plays</div>
                    <div class="view_lb_score game1all">1470</div>
                  </div>
                  <div class="view_lb_score_container">
                    <div class="green_txt mrgL25">Wins</div>
                    <div class="view_lb_score game1win">320</div>
                  </div>
                  <div class="view_lb_score_container">
                    <div class="green_txt">Losses</div>
                    <div class="view_lb_score game1loss">1150</div>
                  </div>
                </div>
                <!-- close viw lb detail -->
              </div>
            </div>
            <!-- stop train thumb-->
            </a> </li>
          <li> <a href="#stowsuitcase">
            <div class="stow_suitcase_thumb img_thumb">
              <div class="cover boxcaption">
                <div class="view_lb">
                  <div class="view_lb_arrw">&nbsp;</div>
                  <div class="view_lb_txt">View Leaderboard</div>
                </div>
                <!-- close view lb -->
                <div class="view_lb_detail">
                  <div class="view_lb_score_container width100px">
                    <div class="green_txt">All Plays</div>
                    <div class="view_lb_score game2all">1470</div>
                  </div>
                  <div class="view_lb_score_container">
                    <div class="green_txt mrgL25">Wins</div>
                    <div class="view_lb_score game2win">320</div>
                  </div>
                  <div class="view_lb_score_container">
                    <div class="green_txt">Losses</div>
                    <div class="view_lb_score game2loss">1150</div>
                  </div>
                </div>
                <!-- close viw lb detail -->
              </div>
            </div>
            </a> </li>
          <li> <a href="#parkcar">
            <div class="park_card_thumb img_thumb">
              <div class="cover boxcaption">
                <div class="view_lb">
                  <div class="view_lb_arrw">&nbsp;</div>
                  <div class="view_lb_txt">View Leaderboard</div>
                </div>
                <!-- close view lb -->
                <div class="view_lb_detail">
                  <div class="view_lb_score_container width100px">
                    <div class="green_txt">All Plays</div>
                    <div class="view_lb_score game3all">1470</div>
                  </div>
                  <div class="view_lb_score_container">
                    <div class="green_txt mrgL24">Wins</div>
                    <div class="view_lb_score game3win">320</div>
                  </div>
                  <div class="view_lb_score_container">
                    <div class="green_txt">Losses</div>
                    <div class="view_lb_score game3loss">1150</div>
                  </div>
                </div>
                <!-- close viw lb detail -->
              </div>
            </div>
            </a> </li>
        </ul>
      </div>
    </div>
    <!--- close center container -->
  </div>
  <!-- close game container shadow -->
</div>
<!-- close game container -->
<div class="content_bg">
  <div class="center_container">
    <div class="content_header_login_container">
      <div class="content_header_login_txt">Log in to save your score and see how you Rank with other players.</div>
      <div class="login_btn"><a id="show-panel" href="#"><img src="images/login_btn.png"/></a></div>
      <div id="lightbox-panel">
        <div class="light_box_hdr_shdw"></div>
        <a class="close-panel">
        <div class="light_box_cross_btn"><span>Close</span> <img src="images/cross_btn.png"/></div>
        </a>
        <div id="regcontainer">
          <div class="fb_btn_contnr">
            <div class="fb_btn"><img src="images/fb.png"/></div>
          </div>
          <div class="register_container">
            <div class="heading">Register</div>
            <div class="requirefield"><span class="red">*</span> Required Fields</div>
            <div class="txtbox_lbl_container">
              <div class="txt_lbl">Desired User Name <span class="red">*</span></div>
              <input type="text" id="reg_username">
            </div>
            <!-- close txt label container -->
            <div class="txtbox_lbl_container">
              <div class="txt_lbl">Email <span class="red">*</span></div>
              <input type="text" id="reg_email">
            </div>
            <!-- close txt label container -->
            <div class="txtbox_lbl_container">
              <div class="txt_lbl">Confirm Email <span class="red">*</span></div>
              <input type="text" id="reg_confirm_email">
            </div>
            <!-- close txt label container -->
            <div class="txtbox_lbl_container">
              <div class="txt_lbl">Password <span class="red">*</span></div>
              <input type="password" id="reg_pass">
            </div>
            <!-- close txt label container -->
            <div class="txtbox_lbl_container">
              <div class="txt_lbl">Confirm Password <span class="red">*</span></div>
              <input type="password" id="reg_confirm_pass">
            </div>
            <!-- close txt label container -->
            <div class="txtbox_lbl_container">
              <div class="submit_btn submit_btn_regis">
                <input id="showthankyou" type="button"/>
              </div>
              <a class="close-panel"> <div class="cancel_regis">Cancel</div></a>
            </div>
            <!-- close txt label container -->
          </div>
          <!-- close registration container -->
          <div class="or_txt">OR</div>
          <div class="register_container">
            <div class="heading">Log in</div>
            <div class="requirefield"></div>
            <div class="txtbox_lbl_container">
              <div class="txt_lbl">User Name <span class="red">*</span></div>
              <input type="text" id="usernameLogin">
            </div>
            <!-- close txt label container -->
            <div class="txtbox_lbl_container">
              <div class="txt_lbl">Password <span class="red">*</span></div>
              <input type="password" id="passwordLogin">
            </div>
            <!-- close txt label container -->
            <div class="txtbox_lbl_container">
              <div class="forgt_pswd"><a id="frgtpsw" href="#">Forgot User Name/Password?</a></div>
            </div>
            <!-- close txt label container -->
            <div class="txtbox_lbl_container">
              <div class="login_btn_inner">
                <input type="button" id="btnLogin" />
              </div>
            </div>
            <!-- close txt label container -->
          </div>
          <!-- close registration container -->
        </div>
        <!-- id regcontainer -->
        <div id="showfrgtpsw">
          <div class="frgt_psw_heading">Forgot your USER NAME or Password?</div>
          <div class="frgt_psw_content">Enter your user name or email address and the two words in the form below. <br/>
            Then, we’ll send you an email with your user name and information on resetting your password. </div>
          <div class="frgtpwd_txtbx_cont">
            <div class="txtbox_lbl_container">
              <div class="txt_lbl">User Name <span class="red">*</span></div>
              <input type="text" id="username_forgot_pass">
            </div>
            <!-- close txt label container -->
          </div>
          <div class="frgt_psw_content">Please enter the words you see in the box, in order and separated by a space.</div>
          
          <form>
            	<div class="captcha_cont" id="captcha_cont"></div>
            	<input type="hidden" name="remoteip" id="remoteip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>"  />
            	
            </form>
          <div class="frgt_pswd_sbmit"><input type="button" id="frgt_pswd_sbmit"/></div>
           </div>
        <div id="thankyou">
          <div class="thankyou_container">
            <div class="thankyou_heading">THANk you for registering!</div>
            <div class="thankyou_content">You are now logged in with the user name
              <insertusername>
              , which means you can now join the leaderboard as you test your precision, and see how you compare to others.</div>
            <a class="close-panel">
            <div class="thankyou_close_btn">
              <input type="button"/>
            </div>
            </a> </div>
        </div>
        <!-- close thank you -->
      </div>
      <!-- light box panel -->
      <div id="lightbox"></div>
      <!-- /lightbox -->
    </div>
    <div class="privacy_lrg_container">
      <div class="content_nav">
        <ul>
          <li class="first"><a class="show">Privacy Policy</a></li>
          <li class="second"><a class="showcon">Contact Us</a></li>
        </ul>
        <div class="showpp">
          <div class="cross_btn"><a class="hide"><img src="images/cross_btn.png"/></a></div>
          <p><strong>State Street Global Advisors Privacy Policy</strong></p>
          <p>If you voluntarily provide personal information such as an email address when inquiring about State Street or its products and services, we use that personal information to improve our services to you, to provide information to you and to inform you about additional products or services that may be of interest to you. State Street does not share your personal information with unaffiliated third parties, except as required by law. </p>
          <p class="mrgB0">You can opt out of our use of non-public, personally identifiable information we collect in order to send you separate online marketing and advertising materials by clicking on an “unsubscribe�? link in our marketing emails.<br/>
            <a href="http://www.spdrs.com/general/privacy/" target="_blank">http://www.spdrs.com/general/privacy/</a> <br/>
            <br/>
            <br/>
            <a class="hide">Close</a></p>
        </div>
        <div class="contactus" style="display:none;">
          <div class="cross_btn"><a class="hidecon"><img src="images/cross_btn.png"/></a></div>
          <p>Learn more about State Street SPDR ETFs.<br/>
            Please have a State Street Global Advisors associate contact me. </p>
          <div class="requiredfild_txt"><span class="red">*</span> Required Fields</div>
          <div class="form_container">
            <form>
              <div class="contactus_left_part">
                <div class="contactus_txtbox_container">
                  <label>First Name <span class="red">*</span></label>
                  <input type="text" id="fname_contact"/>
                </div>
                <div class="contactus_txtbox_container mrgL25">
                  <label>Last Name <span class="red">*</span></label>
                  <input type="text" id="lname_contact"/>
                </div>
                <div class="contactus_txtbox_container">
                  <label>Firm Name <span class="red">*</span></label>
                  <input type="text" id="frname_contact"/>
                </div>
                <div class="contactus_txtbox_container mrgL25">
                  <label>Email <span class="red">*</span></label>
                  <input type="text" id="ename_contact"/>
                </div>
                <div class="contactus_txtbox_container width235px">
                  <label>Business Phone (Ex:XXX-XXX-XXXX) <span class="red">*</span></label>
                  <input class="width205px" type="text"  id="mb_contact"/>
                </div>
              </div>
              <!-- close contact us left part -->
              <div class="contactus_right_part">
                <div class="contactus_textarea_container">
                  <label>Comments</label>
                  <textarea id="comm_contact"></textarea>
                </div>
              </div>
            </form>
          </div>
          <!-- close form container -->
          <div class="form_footer">Questions? <br/>
            Call State Street Global Advisors at 1.866.787.2257.
            <div class="submit_btn">
              <input type="button"/>
            </div>
            <div class="cancel_form"><a href="#">Cancel</a></div>
          </div>
          <!-- close form footer -->
        </div>
        <!-- contact us -->
      </div>
      <!-- close content nav -->
    </div>
    <!-- close privacy lrg container -->
    <div class="iri_container">
      <div class="ssga_logo"><img src="images/ssga_logo.png"/></div>
      <div class="iri_header">Important Risk Information:<br/>
        <br/>
        Before investing, consider the funds’ investment objectives, risks, charges and expenses. To obtain a prospectus or summary prospectus, which contains this and other information, call 1.866.787.2257 or visit <a href="http://www.spdrs.com" target="_blank">www.spdrs.com</a>. Read it carefully.</div>
      <p>ETFs trade like stocks, fluctuate in market value and may trade at prices above or below the ETFs’ net asset value. Brokerage commissions and ETF expenses will reduce returns.</p>
      <p>The SPDR S&amp;P 500 ETF Trust, SPDR S&amp;P MidCap 400 ETF Trust and the SPDR Dow Jones Industrial Average ETF Trust are unit investment trusts and issue shares intended to track performance of their respective benchmarks.</p>
      <p>“SPDR,�? S&amp;P, S&amp;P 500 and S&amp;P MidCap 400 are registered trademarks of Standard &amp; Poor’s Financial Services, LLC (“S&amp;P) and have been licensed for use by State Street Corporation. No financial product offered by State Street or its affiliates is sponsored, endorsed, sold or promoted by S&amp;P. </p>
      <p>Distributor: State Street Global Markets, LLC, member <a href="#" target="_blank">FINRA</a>, <a href="#" target="_blank">SIPC</a>, a wholly owned subsidiary of State Street Corporation. Reference to State Street may include State Street Corporation and its affiliates. Certain State Street affiliates provide services and receive fees from the SPDR ETFs. ALPS Distributors, Inc. is distributor for SPDR S&amp;P 500 ETF Trust, SPDR S&amp;P MidCap 400 ETF Trust and SPDR Dow Jones Industrial Average ETF Trust, all unit investment trusts, and the Select Sector SPDRs Trust.</p>
      <p>IBG - 6838</p>
    </div>
    <!-- close iri container -->
  </div>
  <!-- close center container -->
</div>
<!-- close content_bg -->
<div class="footer_container"> </div>
<!-- close footer container -->

<!-- Javascript for Contact us -->
<script type="text/javascript">
		$(".show").click(function () {
 		  $(".showpp").show('slow');
		  $('html, body').animate({
   			 scrollTop: $(".content_nav").offset().top
			}, 2000);
		  
		  $(".content_nav ul li.first").addClass('arrow_down');
		  $(".content_nav ul li.second").removeClass('arrow_down');
		  $(".contactus").hide(0);
		});
		$(".hide").click(function () {
		  $(".showpp").hide(1000);								   
 		  $(".content_nav ul li.first").removeClass('arrow_down');
		});
		// for contact us
		$(".showcon").click(function () {
 		  $(".contactus").show('slow');
		  $('html, body').animate({
   			 scrollTop: $(".content_nav").offset().top
			}, 2000);
		  $(".content_nav ul li.second").addClass('arrow_down');
		  $(".content_nav ul li.first").removeClass('arrow_down');
		  $(".showpp").hide(0);
		});
		$(".hidecon").click(function () {
		  $(".contactus").hide(1000);		
		  $(".content_nav ul li.first").removeClass('arrow_down');
 		  $(".content_nav ul li.second").removeClass('arrow_down');
		});
</script>
<!-- Javascript for show forget pasword container -->
<script type="text/javascript">
		$("#frgtpsw").click(function () {
 		  $("#showfrgtpsw").show('slow');
		  $("#regcontainer").hide('slow');
		});
		$("#frgtpsw_cancel").click(function () {	
		  $("#regcontainer").show('slow');
		  $("#showfrgtpsw").hide('slow');
		});
</script>
<script type="text/javascript" src="js/js.js" > </script>



<!-- 

<?php
if(!isset($_SESSION['logged_in']))
{
?>
    <div id="results">
    </div>
    <div id="LoginButton">
    <div class="fb-login-button" onlogin="javascript:CallAfterLogin();" size="medium" scope="<?php echo $fbPermissions; ?>">Connect With Facebook</div>
    </div>
<?php
}
else
{
	echo 'Hi '. $_SESSION['user_name'].'! You are Logged in to facebook, <a href="?logout=1">Log Out</a>.';
}
?>

<div id="fb-root"></div>
<script type="text/javascript">
window.fbAsyncInit = function() {
FB.init({appId: '<?php echo $appId; ?>',cookie: true,xfbml: true,channelUrl: '<?php echo $return_url; ?>channel.php',oauth: true});};
(function() {var e = document.createElement('script');
e.async = true;e.src = document.location.protocol +'//connect.facebook.net/en_US/all.js';
document.getElementById('fb-root').appendChild(e);}());
/*
function CallAfterLogin(){
		FB.login(function(response) {		
		if (response.status === "connected") 
		{
			LodingAnimate(); //Animate login
			FB.api('/me', function(data) {
			  if(data.email == null)
			  {
					//Facbeook user email is empty, you can check something like this.
					alert("You must allow us to access your email id!"); 
					ResetAnimate();

			  }else{
					AjaxResponse();
			  }
		  });
		 }
	});
}
*/
/</script>
-->
<script> 
 Recaptcha.create("6LdFM9cSAAAAAMt9OHtQ8The5CxtWYHKuBgFlp5o", 'captcha_cont', {
 theme: "clean",
 callback: Recaptcha.focus_response_field});
 
 Recaptcha.create("6LdFM9cSAAAAAMt9OHtQ8The5CxtWYHKuBgFlp5o", 'recptcha', {
 theme: "clean",
 callback: Recaptcha.focus_response_field});
</script>
<?php
 if(isset( $_SESSION['playername'])){
 	?>
 	<script type="text/javascript" >
 		$(document).ready(function(){
 				$makeLogin(); 				
 		}); 		
 	</script>
 	
<?php  } ?>
</body>
</html>
