$(document).ready(function(){	
	
	$makeLogin = function(){
		$('.content_header_login_container').html('<div class="content_header_login_txt width83perc">You are logged in as  “<span id="userid">USER NAME</span>”</div><div class="logout_btn"><a href="logout.php">Log out</a></div>');
		getUserName();
		
		var html='<li> <a href="#stoptrain"><div class="stop_train_thumb img_thumb"></div><!-- stop train thumb--></a>';
		html +='<div class="user_score_bg"><div class="user_score_container mrgL25"><div class="user_green_txt">Plays</div>';
		html +='<div class="view_lb_score game1all">1470</div></div><div class="user_score_container">';
		html +='<div class="user_green_txt">Wins</div><div class="view_lb_score game1win">1470</div>';
		html +='</div><div class="user_score_container"><div class="user_green_txt">Losses</div>';
		html +='<div class="view_lb_score game1loss">1470</div></div></div> <!-- user score bg --></li>';
		html +='<li> <a href="#stowsuitcase"><div class="stow_suitcase_thumb img_thumb"></div></a><div class="user_score_bg">';
		html +='<div class="user_score_container mrgL25"><div class="user_green_txt">Plays</div>';
		html +='<div class="view_lb_score game2all">1470</div></div><div class="user_score_container">';
		html +='<div class="user_green_txt">Wins</div><div class="view_lb_score game2win">1470</div></div>';
		html +='<div class="user_score_container"><div class="user_green_txt">Losses</div>';
		html +='<div class="view_lb_score game2loss">1470</div></div></div> <!-- user score bg -->';
		html +='</li><li> <a href="#parkcar"><div class="park_card_thumb img_thumb"></div>';
		html +='</a><div class="user_score_bg"><div class="user_score_container mrgL25"><div class="user_green_txt">Plays</div>';
		html +='<div class="view_lb_score game3all">1470</div></div><div class="user_score_container">';
		html +='<div class="user_green_txt">Wins</div><div class="view_lb_score game3win">1470</div>';
		html +='</div><div class="user_score_container"><div class="user_green_txt">Losses</div>';
		html +='<div class="view_lb_score game3loss">1470</div></div></div> <!-- user score bg --></li>';
		$('.navigation').html(html);
		$('body').css({'overflow':'visible'});		
	}
	
	
	
	function getUserName(){
		
		$.ajax({url:"getUserName.php",
		 	success:function(r){
	      		$('#userid').html(r);
	    	}
	    });
		
	}
  setInterval(getUserName,500);
  

	function getResult(){
		$.ajax({url:"result_get.php",
		 dataType: 'json',cache: false,
		 success:function(r){
	      $('.game1all').html(r[0]);
	      $('.game1win').html(r[1]);
	      $('.game1loss').html(r[2]);
	      $('.game2all').html(r[3]);
	      $('.game2win').html(r[4]);
	      $('.game2loss').html(r[5]);
	      $('.game3all').html(r[6]);
	      $('.game3win').html(r[7]);
	      $('.game3loss').html(r[8]); 
	    }
	    });	    
	}
	var res = setInterval(getResult,500);
	
	
	function validateCaptcha()
        {
            challengeField = $("#recaptcha_challenge_field").val();
            responseField = $("#recaptcha_response_field").val();
            console.log(challengeField);
            console.log(responseField);
            //return false;

            var html = $.ajax({
            type: "POST",
            url: "ajax.recaptcha.php",
            data: "recaptcha_challenge_field=" + challengeField + "&recaptcha_response_field=" + responseField,
            async: false
            }).responseText;

            if (html.replace(/^\s+|\s+$/, '') == "success")
            {
                $("#captchaStatus").html(" ");
                // Uncomment the following line in your application
                return true;
            }
            else
            {                
                Recaptcha.reload();
                return false;
            }
        }
        
        
function validateEmail(field) {
    var regex=/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i;
    return (regex.test(field)) ? true : false;
}

function validateMultipleEmailsCommaSeparated(value) {
    var result = value.split(",");
    for(var i = 0;i < result.length;i++)
    if(!validateEmail(result[i])) 
            return false;               
    return true;
}


function CreateNewLikeButton(url)
{
    var elem = $(document.createElement("fb:like"));
    elem.attr("href", url);
    $("div#Container").empty().append(elem);
    FB.XFBML.parse($("div#Container").get(0));
}


  
  $("input").click(function(){
			$('input').removeClass('invalid');
  });
  

  $('#email_msg').live('keyup', function() {                                                   
  		if($('#email_msg').val().length >= 500){
  			return false;	
  		}
  });
  
  
  $('#btnLogin').click(function(){
  	
  	var $u= $('#usernameLogin').val();
  	var $p= $('#passwordLogin').val();
  	if($u==""){
  		 $('#usernameLogin').addClass('invalid');
  		 $('#usernameLogin').focus();
  		 return false;
  		}
  	if($p==""){ 
  		$('#passwordLogin').addClass('invalid');
  		$('#passwordLogin').focus();
  		return false;
  	}
  	$.ajax({
  		url:"login.php?user="+ $u +"&pass="+ $p,cache: false,
  		success:function(result){
 			if(result=='ok'){     				
 				 $makeLogin();
 			} else{
 				alert('Login Fail! Try again');
 			} 
    	}
    });
  });
  
  $("#showthankyou").click(function(){
  	
  	var reg_username=$('#reg_username').val();
  	  var reg_email=$('#reg_email').val();
  	   var reg_confirm_email=$('#reg_confirm_email').val();
  	 var reg_pass=$('#reg_pass').val();
  	 var reg_confirm_pass=$('#reg_confirm_pass').val();
  	    var pattern_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; 
  	    
  	 
 if (reg_username=="") {
			//alert('Please Enter Your Name.');
			$('#reg_username').addClass('invalid');
			$('#reg_username').focus();
			return false;
		}; 	 
  	 		
		if (!pattern_email.test(reg_email)) {
			//alert('Please Enter Your Valid Email Id.');
			$('#reg_email').addClass('invalid');
			$('#reg_email').focus();
			return false;
		}
     
     	if (reg_email!==reg_confirm_email) {
			//alert('Please Confirm Your Email Id.');
			$('#reg_confirm_email').addClass('invalid');
			$('#reg_confirm_email').focus();
			return false;
		}
		
		if (reg_pass=="") {
			//alert('Please Enter Your Password.');
			$('#reg_pass').addClass('invalid');
			$('#reg_pass').focus();
			return false;
		}; 	 
  	
    	if (reg_pass!==reg_confirm_pass) {
			//alert('Please Confirm Your Password.');
			$('#reg_confirm_pass').addClass('invalid');
			$('#reg_confirm_pass').focus();
			return false;
		}; 	 
		
    $.ajax({
    	url:"registration.php?user="+ $('#reg_username').val()+"&email="+$('#reg_email').val()+"&con_email="+$('#reg_confirm_email').val()+"&pass="+$('#reg_pass').val()+"&con_pass="+$('#reg_confirm_pass').val(),
    	success:function(result){
	       if(result=='ok'){
	       	 $("#thankyou").show("slow");
			 $("#regcontainer").hide("slow");  				
	     	 $makeLogin();
	     	}
	     	       
         if(result=='not'){
         	alert('Username or Email Already Exist');
         }
		}
	});
  });
  
  
  
  $("#showemailsent").click(function(){
  	       
  	 var ename=$('#ename').val();
  	 var email_sender=$('#sender').val();
  	 var email_reciever=$('#reciever').val();
  	 var email_msg = $('#email_msg').val();
  	 var pattern_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; 
  	 
         
 		if (ename=="") {
			//alert('Please Enter Your Name.');
			$('#ename').addClass('invalid');
			$('#ename').focus();
			return false;
		}; 	 
  	 
		
		if (!pattern_email.test(email_sender)) {
			//alert('Please Enter Your Valid Email Id.');
			$('#sender').addClass('invalid');
			$('#sender').focus();
			return false;
		}

       if ( !validateMultipleEmailsCommaSeparated(email_reciever)) {
			$('#reciever').addClass('invalid');
			$('#reciever').focus();
			return false;
		};  	 

		if(email_msg.length > 550){
           	//alert('Please limit your message to 500 characters.');
			$('#email_msg').addClass('invalid');
			$('#email_msg').focus();
			return false;
           };
        
	 if(!validateCaptcha()){
	 	$("#captchaStatus").html("Your captcha is incorrect. Please try again");
	 	return false;
	 } 
     
     $.ajax({
     	url:"sent_email.php?user="+ $('#ename').val()+"&sender="+$('#sender').val()+"&reciever="+email_reciever+"&msg="+$('#email_msg').val(),
	     success:function(){     
	     	
	     var ids = '';
	     var result = email_reciever.split(",");
	      for(var i = 0;i < result.length;i++)
	     	ids += '<div class="email_sent_recp"> '+ result[i] +'</div>';
	     	
	      $('#recipient_id').html(ids);
	      $(".email_container").hide("slow");
	      $("#emailsent").show("slow");      
	      $('#ename').val('');
	      $('#sender').val('');
	      $('#reciever').val('');
	      $('#email_msg').val('');
	      Recaptcha.reload();
	    }
	});
		
    
  });
  
  $("#sendagain").click(function () {
  	 
		  $(".email_container").show('slow');
		   $("#emailsent").hide('slow');
		});
		
		
		
		
	
	
	$('#frgt_pswd_sbmit').click(function(){
		
		var uname=$('#username_forgot_pass').val();  	 
 		if (uname=="") {
			//alert('Please Enter Your Name.');
			$('#username_forgot_pass').addClass('invalid');
			$('#username_forgot_pass').focus();
			return false;
		}; 	 
		
		if(!validateCaptcha()){
			$("#captchaForgot").html("Your captcha is incorrect. Please try again");
			return false;
		} 
		
		$.ajax({
		  url: "forgotpass.php?username="+uname,
		  cache: false,
		 	success:function(r){
		 		if(r=='fail'){
		 			alert('Username not found in database.');
		 		}else{
		 			alert('Username and password sent to your email id '+r);
		 			$('#username_forgot_pass').val(''); 
		 			Recaptcha.reload();	
		 		}
	      		
	    	}
		});

	});
			
			
	$('.submit_btn input').click(function(){
		
		var fname_contact=$('#fname_contact').val();
		var lname_contact=$('#lname_contact').val();
		var frname_contact=$('#frname_contact').val();
		var ename_contact=$('#ename_contact').val();
		var mb_contact=$('#mb_contact').val();
		var comm_contact=$('#comm_contact').val();
		var pattern_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; 
		var pattern_mb = /^[0-9-]{6,12}$/;
		  	 
		if (fname_contact=="") {
			//alert('Please Enter Your First Name.');
			$('#fname_contact').addClass('invalid');
			$('#fname_contact').focus();
			return false;
		}; 	 
			
		if (lname_contact=="") {
			//alert('Please Enter Your Last Name.');
			$('#lname_contact').addClass('invalid');
			$('#lname_contact').focus();
			return false;
		};
		
		if (frname_contact=="") {
			//alert('Please Enter Your Firm Name.');
			$('#frname_contact').addClass('invalid');
			$('#frname_contact').focus();
			return false;
		};
		
		if (!pattern_email.test(ename_contact)){
			//alert('Please Enter Your Valid Email Id.');
			$('#ename_contact').addClass('invalid');
			$('#ename_contact').focus();
			return false;
		}
		
		if (!pattern_mb.test(mb_contact)){
			//alert('Please Enter Your Valid Business Phone.');
			$('#mb_contact').addClass('invalid');
			$('#mb_contact').focus();
			return false;
		}
		
		$.ajax({
		  url: 'contactus.php?name='+fname_contact +','+lname_contact+'&email='+ename_contact+'&firm='+frname_contact+'&mb='+mb_contact+'&com='+comm_contact,
		  cache: false,
	 	  success:function(r){
	 			$('.contactus').html('We recived you mail we will get back to you soon.');
    	  }
		});
		
		
	});
	
	
	$('.img_thumb').hover(function(){
		$(".cover", this).stop().animate({top:'195px'},{queue:false,duration:160});
	}, function() {
		$(".cover", this).stop().animate({top:'267px'},{queue:false,duration:160});
	});
	
	$("#show-fb").click(function(){
		$("#emailbox_backlight, #fb-panel").fadeIn(300);
		$(".twitter_icon").addClass('twitter_icon_active');
		$('#fbcontent').html('');
		$('#fbcontent').html('<div id="fb-root"></div><div class="fb-like" data-href="http://google.com" data-send="true" data-width="450" data-show-faces="true"></div>');
		$(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=391331457606211";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
			
			CreateNewLikeButton("http://www.google.ca");

	});
	
	$("#show-gmail").click(function(){
		$("#emailbox_backlight, #gmail-panel").fadeIn(300);
		$(".gmail_icon").addClass('gmail_icon_active');
		$('#gcontent').html('');
		$('#gcontent').html('<script src="https://apis.google.com/js/plusone.js"></script><g:plusone></g:plusone>');
		
		
	});
	
	$("#show-email").click(function(){
		$("#emailbox_backlight, #email-panel").fadeIn(300);
		$(".email_icon").addClass('email_icon_active');	
		 Recaptcha.create("6LcyQ9cSAAAAAM1SCLplMLj16bZDOaTIpImhSyBL", 'recptcha', {theme: "clean"});	
	});
	
	$("#show-panel").click(function(){
	  $("#regcontainer").show();
	  $("#showfrgtpsw").hide();
	  $("#thankyou").hide();
	  $("body").css("overflow", "hidden");								 
	  $("#lightbox, #lightbox-panel").fadeIn(300);
	  $('.hidecon').trigger('click');
	  
	var elem = $(document.createElement("div"));
    elem.attr("class", "fb-login-button");
    elem.attr("onlogin", "javascript:CallAfterLogin();");
    elem.attr("size", "large");
    elem.attr("scope", "publish_stream,email");    
    $("div.fb_btn").empty().append(elem);  
    $('.fb-login-button').html('Connect with Facebook');  
    FB.XFBML.parse($("div.fb_btn").get(0));    
    $('.pluginFaviconButtonText').html('Connect with Facebook');
	});
	
	$(".close-email-panel, .light_box_cross_btn, .cancel_regis").click(function(){
		$("#emailbox_backlight, #gmail-panel").fadeOut(300);
		$(".gmail_icon").removeClass('gmail_icon_active');
		$("#emailbox_backlight, #fb-panel").fadeOut(300);
		$(".twitter_icon").removeClass('twitter_icon_active');
		$("#emailbox_backlight, #email-panel").fadeOut(300);
		$(".email_icon").removeClass('email_icon_active');
		$("#lightbox, #lightbox-panel").fadeOut(300);
		$("body").css("overflow", "auto");
		$('input').removeClass('invalid');
		$('input, textarea').val('');
		$('textarea').text('');
	});
	
	$('.hidecon').click(function(){
		$('input').removeClass('invalid');
		$('input, textarea').val('');
		$('textarea').text('');
	});
	
	
	
//	END DOC ready
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
		  $.mask.definitions['~']='[+-]';	  
		  $('#mb_contact').mask('999-999-9999');
		});
		$(".hidecon, #contcus_form_cancel, .cancel_form a").click(function () {
		  $(".contactus").hide(1000);		
		  $(".content_nav ul li.first").removeClass('arrow_down');
 		  $(".content_nav ul li.second").removeClass('arrow_down');
		});
		
		$("#frgtpsw").click(function () {
 		  $("#showfrgtpsw").show('slow');
		  $("#regcontainer").hide('slow');
		  Recaptcha.create("6LcyQ9cSAAAAAM1SCLplMLj16bZDOaTIpImhSyBL", 'captcha_cont', {theme: "clean"});
		});
		$("#frgtpsw_cancel").click(function () {	
		  $("#regcontainer").show('slow');
		  $("#showfrgtpsw").hide('slow');
		});
		///End		
			
});


function LimitText(ref, iminlength, imaxlength) {
	var str = ref.value;
    if (str.length > imaxlength){
        ref.value = str.substring(0, imaxlength);
        ref.text = str.substring(0, imaxlength);
    }
}



function formatPhoneNumber(phoneNumber) {
    var rawPhoneNumber = phoneNumber.replace("(", "").replace(")", "").replace(/-/g, "").replace(/ /g, "");
    if (isNaN(rawPhoneNumber)) {
        return null;
    }
    if (rawPhoneNumber.length == 10) {
        return "(" + rawPhoneNumber.substring(0, 3) + ") " + rawPhoneNumber.substring(3, 6) + "-" + rawPhoneNumber.substring(6, 10);
    }
    if (rawPhoneNumber.length == 11) {
        return rawPhoneNumber.substring(0, 1) + " (" + rawPhoneNumber.substring(1, 4) + ") " + rawPhoneNumber.substring(4, 7) + "-" + rawPhoneNumber.substring(7, 11);
    }
}


