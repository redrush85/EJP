if (Drupal.jsEnabled) {	
	Drupal.behaviors.ecjc_main = function (context) {
	  var clicked_link = '';
	  var opened_box = false;
	  var register = $("#register");
	  var reg_tab1 = $('#reg_tab1');
	  var reg_tab2 = $('#reg_tab2');
	  var register_text = $("#register-tab a").html();
	  var tabs_a = $("#register_tabs a");
	  var $hidden_tabs = $('#register-tab .hidden'); 
	  $hidden_tabs.hide();
	  show_hidden_tabs = function() {$hidden_tabs.show();$("#register-tab a").html('<span><strong>Step 1</strong> Start Registration</span>');$("#register-tab a").addClass('tab-first')}
	  hide_hidden_tabs = function() {$hidden_tabs.hide();$("#register-tab a").html(register_text);$("#register-tab a").removeClass('tab-first')}
	  register.hide();
	  $("#login #signin").click(function(){
		if (clicked_link == '') {
			register.slideToggle('fast', function () {
				opened_box = true;
			});
		  	reg_tab2.hide();
			reg_tab1.show();
			hide_hidden_tabs();
			$("#register_tabs a").removeClass("selected");
			$("#sign-tab a").addClass("selected");
			clicked_link = $(this).attr('href');
			return false;		
		}
		else if (clicked_link == $(this).attr('href')) {
		    register.slideToggle('fast', function () {
				opened_box = false;
			});
			clicked_link = '';
			hide_hidden_tabs();
			return false;		
		}
		else if (clicked_link == 'register-link'){
			hide_hidden_tabs();
		
		  	if (opened_box == false) {
				register.slideToggle('fast', function () {
					opened_box == true ? opened_box = false : opened_box = true;
				});
			}
			reg_tab2.hide();
			reg_tab1.show();
			tabs_a.removeClass("selected");
			$("#sign-tab a").addClass("selected");
			clicked_link = $(this).attr('href');
			return false;		    
		}
	  });
	  $(".register-link").click(function(){
		if (clicked_link == '') {
		    register.slideToggle('fast', function () {
				opened_box = true;
			});
			show_hidden_tabs();
		  	reg_tab1.hide();
			reg_tab2.show();
			tabs_a.removeClass("selected");
			$("#register-tab a").addClass("selected");
			clicked_link = $(this).attr('class');
			return false;		
		}
		else if (clicked_link == $(this).attr('class')) {
		    register.slideToggle('fast', function () {
				opened_box = false;
			});
		  	reg_tab1.hide();
			reg_tab2.show();
			show_hidden_tabs();
			tabs_a.removeClass("selected");
			$("#register-tab a").addClass("selected");
			clicked_link = '';
			return false;		
		}
		else if (clicked_link == '#sign'){
			opened_box == true;
			reg_tab1.hide();
			reg_tab2.show();
			show_hidden_tabs();
			tabs_a.removeClass("selected");
			$("#register-tab a").addClass("selected");
			clicked_link = $(this).attr('class');
			return false;		    
		}
	  });
	  $("#register_tabs .freg_close").click(function(){clicked_link = ''; opened_box = false; register.slideToggle();});	  
	  $("#register-tab a").click(function(){
		clicked_link = 'register-link';
		opened_box = true;
		reg_tab1.hide();
		reg_tab2.show();
		show_hidden_tabs();
		tabs_a.removeClass("selected");
		$("#register-tab a").addClass("selected");
	  });
	  $("#sign-tab a").click(function(){
		clicked_link = '#sign';
		opened_box = true;
		reg_tab2.hide();
		reg_tab1.show();
		hide_hidden_tabs();
		tabs_a.removeClass("selected");
		$("#sign-tab a").addClass("selected");
	  });

	}
}