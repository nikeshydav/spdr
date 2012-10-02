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
  setInterval(getUserName,5000);
  

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
	
	
	
	
	
  $('#btnLogin').click(function(){
  	var u= $('#usernameLogin').val();
  	var p= $('#passwordLogin').val();
  	if(u==''){alert('Please Enter Username.');return false;}
  	if(p==''){alert('Please Enter Password.');return false;}
  	$.ajax({
  		url:"login.php?user="+ u +"&pass="+ p,cache: false,
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
			alert('Please Enter Your Name.');
			$('#reg_username').addClass('invalid');
			$('#reg_username').focus();
			return false;
		}; 	 
  	 		
		if (!pattern_email.test(reg_email)) {
			alert('Please Enter Your Valid Email Id.');
			$('#reg_email').addClass('invalid');
			$('#reg_email').focus();
			return false;
		}
     
     	if (reg_email!==reg_confirm_email) {
			alert('Please Confirm Your Email Id.');
			$('#reg_confirm_email').addClass('invalid');
			$('#reg_confirm_email').focus();
			return false;
		}
		
		if (reg_pass=="") {
			alert('Please Enter Your Password.');
			$('#reg_pass').addClass('invalid');
			$('#reg_pass').focus();
			return false;
		}; 	 
  	
    	if (reg_pass!==reg_confirm_pass) {
			alert('Please Confirm Your Password.');
			$('#reg_confirm_pass').addClass('invalid');
			$('#reg_confirm_pass').focus();
			return false;
		}; 	 
		
    $.ajax({url:"registration.php?user="+ $('#reg_username').val()+"&email="+$('#reg_email').val()+"&con_email="+$('#reg_confirm_email').val()+"&pass="+$('#reg_pass').val()+"&con_pass="+$('#reg_confirm_pass').val(),success:function(result){
       $("#thankyou").show("slow");
		  $("#regcontainer").hide("slow");       
    }});
  });
  
  
  
  $("#showemailsent").click(function(){
  	
$.ajax({
  type: "POST",
  url: "http://www.google.com/recaptcha/api/verify",
  data: { privatekey: "6LdFM9cSAAAAAOfY7lWRn7dsyH6LFN9Q7qVkyE_3", remoteip: $('#remoteip').val(), 
  recaptcha_challenge_field: $('recaptcha_challenge_field').val(),recaptcha_response_field: $('recaptcha_response_field').val() },
  success:function( msg ) {
  	alert( "Data Saved: " + msg );
  }
});	


  	 var ename=$('#ename').val();
  	  var email_sender=$('#sender').val();
  	   var email_reciever=$('#reciever').val();
  	    var pattern_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; 
  	 
 		if (ename=="") {
			alert('Please Enter Your Name.');
			$('#ename').addClass('invalid');
			$('#ename').focus();
			return false;
		}; 	 
  	 
		
		if (!pattern_email.test(email_sender)) {
			alert('Please Enter Your Valid Email Id.');
			$('#sender').addClass('invalid');
			$('#sender').focus();
			return false;
		}

       if (!pattern_email.test(email_reciever)) {
			alert('Please Enter  Valid Email Id.');
			$('#reciever').addClass('invalid');
			$('#reciever').focus();
			return false;
		};  	 

  	 $("#loading_data1").show("slow");
     $.ajax({url:"sent_email.php?user="+ $('#ename').val()+"&sender="+$('#sender').val()+"&reciever="+$('#reciever').val()+"&msg="+$('#email_msg').val(),success:function(result){
     
     $('#recipient_id').html($('#reciever').val());
     	  $(".email_container").hide("slow");
      $("#emailsent").show("slow");      
      
       
    }});
  });
  
  $("#sendagain").click(function () {
		  $(".email_container").show('slow');
		   $("#emailsent").hide('slow');
		});
		
		
		
		
	
	
	$('#frgt_pswd_sbmit').click(function(){
		
		var uname=$('#username_forgot_pass').val();  	 
 		if (uname=="") {
			alert('Please Enter Your Name.');
			$('#username_forgot_pass').addClass('invalid');
			$('#username_forgot_pass').focus();
			return false;
		}; 	 
		
		
		$.ajax({
		  url: "forgotpass.php?username="+uname,
		  cache: false,
		 	success:function(r){
		 		if(r=='fail'){
		 			alert('Username not found in database.');
		 		}else{
		 			alert('Username and password sent to your email id '+r);	
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
		var pattern_mb = '/^[0-9]{0,3}+\-[0-9]{3}+\-[0-9]{4}$/';
		  	 
		if (fname_contact=="") {
			alert('Please Enter Your First Name.');
			$('#fname_contact').addClass('invalid');
			$('#fname_contact').focus();
			return false;
		}; 	 
			
		if (lname_contact=="") {
			alert('Please Enter Your Last Name.');
			$('#lname_contact').addClass('invalid');
			$('#lname_contact').focus();
			return false;
		};
		
		if (ename_contact=="") {
			alert('Please Enter Your Firm Name.');
			$('#ename_contact').addClass('invalid');
			$('#ename_contact').focus();
			return false;
		};
		
		if (!pattern_email.test(ename_contact)){
			alert('Please Enter Your Valid Email Id.');
			$('#ename_contact').addClass('invalid');
			$('#ename_contact').focus();
			return false;
		}
		
		if (!pattern_mb.test(mb_contact)){
			alert('Please Enter Your Valid Business Phone.');
			$('#mb_contact').addClass('invalid');
			$('#mb_contact').focus();
			return false;
		}
		
		$.ajax({
		  url: 'contactus.php?name='+fname_contact +','+lname_contact+'&email='+ename_contact+'&firm='+frname_contact+'&mb='+mb_contact+'&com='+comm_contact,
		  cache: false,
	 	  success:function(r){
	 			alert('We recived you mail we will get back to you soon.');
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
	});
	
	$("#show-gmail").click(function(){
		$("#emailbox_backlight, #gmail-panel").fadeIn(300);
		$(".gmail_icon").addClass('gmail_icon_active');
	});
	
	$("#show-email").click(function(){
		$("#emailbox_backlight, #email-panel").fadeIn(300);
		$(".email_icon").addClass('email_icon_active');
	});
	
	$("#show-panel").click(function(){
	  $("#regcontainer").show();
	  $("#showfrgtpsw").hide();
	  $("#thankyou").hide();
	  $("body").css("overflow", "hidden");								 
	  $("#lightbox, #lightbox-panel").fadeIn(300);
	});
	
	$(".close-email-panel, .light_box_cross_btn").click(function(){
		$("#emailbox_backlight, #gmail-panel").fadeOut(300);
		$(".gmail_icon").removeClass('gmail_icon_active');
		$("#emailbox_backlight, #fb-panel").fadeOut(300);
		$(".twitter_icon").removeClass('twitter_icon_active');
		$("#emailbox_backlight, #email-panel").fadeOut(300);
		$(".email_icon").removeClass('email_icon_active');
		$("#lightbox, #lightbox-panel").fadeOut(300);
		$("body").css("overflow", "auto");
	});
	
	
			
			
});