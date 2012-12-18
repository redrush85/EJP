/* idTabs ~ Sean Catchpole - Version 2.2 - MIT/GPL */
(function(){var dep={"jQuery":"js/jquery.min.js"};var init=function(){(function($){$.fn.idTabs=function(){var s={};for(var i=0;i<arguments.length;++i){var a=arguments[i];switch(a.constructor){case Object:$.extend(s,a);break;case Boolean:s.change=a;break;case Number:s.start=a;break;case Function:s.click=a;break;case String:if(a.charAt(0)=='.')s.selected=a;else if(a.charAt(0)=='!')s.event=a;else s.start=a;break;}}
if(typeof s['return']=="function")
s.change=s['return'];return this.each(function(){$.idTabs(this,s);});}
$.idTabs=function(tabs,options){var meta=($.metadata)?$(tabs).metadata():{};var s=$.extend({},$.idTabs.settings,meta,options);if(s.selected.charAt(0)=='.')s.selected=s.selected.substr(1);if(s.event.charAt(0)=='!')s.event=s.event.substr(1);if(s.start==null)s.start=-1;var showId=function(){if($(this).is('.'+s.selected))
return s.change;var id="#"+this.href.split('#')[1];var aList=[];var idList=[];$("a",tabs).each(function(){if(this.href.match(/#/)){aList.push(this);idList.push("#"+this.href.split('#')[1]);}});if(s.click&&!s.click.apply(this,[id,idList,tabs,s]))return s.change;for(i in aList)$(aList[i]).removeClass(s.selected);for(i in idList)$(idList[i]).hide();$(this).addClass(s.selected);$(id).show();return s.change;}
var list=$("a[href*='#']",tabs).unbind(s.event,showId).bind(s.event,showId);list.each(function(){$("#"+this.href.split('#')[1]).hide();});var test=false;if((test=list.filter('.'+s.selected)).length);else if(typeof s.start=="number"&&(test=list.eq(s.start)).length);else if(typeof s.start=="string"&&(test=list.filter("[href*='#"+s.start+"']")).length);if(test){test.removeClass(s.selected);test.trigger(s.event);}
return s;}
$.idTabs.settings={start:0,change:false,click:null,selected:".selected",event:"!click"};$.idTabs.version="2.2";$(function(){$(".idTabs").idTabs();});})(jQuery);}
var check=function(o,s){s=s.split('.');while(o&&s.length)o=o[s.shift()];return o;}
var head=document.getElementsByTagName("head")[0];var add=function(url){var s=document.createElement("script");s.type="text/javascript";s.src=url;head.appendChild(s);}
var s=document.getElementsByTagName('script');var src=s[s.length-1].src;var ok=true;for(d in dep){if(check(this,d))continue;ok=false;add(dep[d]);}if(ok)return init();add(src);})();

/* Font-size */
	$(function(){
		$('.toolbar_wnews_btn span').click(function(){
			var ourText = $('.node-body');
			var currFontSize = ourText.css('fontSize');
			var finalNum = parseFloat(currFontSize, 10);
			var stringEnding = currFontSize.slice(-2);
			if(this.id == 'font_up') {
				finalNum *= 1.2;
			}
			else if (this.id == 'font_down'){
				finalNum /=1.2;
			}
			ourText.animate({fontSize: finalNum + stringEnding},600);
		});
	});

/* candiies */
Drupal.behaviors.ecjc_candles = function (context) {
	$("#edit-jewish-calendar-candles-manual-timezone").attr('checked', false); //uncheck checkbox for avoding slideup if slidetoggle not called twice.  
	$("#candle_form").hide();
	$("#candle_settings span").unbind('click').click(function(context){
		$("#candle_form").slideToggle("slow");
		$(this).toggleClass("active");  

	}); //delete old bind after ajax
	$("#edit-jewish-calendar-candles-timezone-wrapper").hide();
	$("#edit-jewish-calendar-candles-manual-timezone").unbind('click').click(function(context){$("#edit-jewish-calendar-candles-timezone-wrapper").slideToggle("slow");});
	
	$("div.jc_day").hide();
	$("div.jc_dayjc_holiday").hide();
 	$(".block-ecjc_calendar div.all_week span").unbind('click').click(function(context){
		$("div.jc_day, div.jc_dayjc_holiday").slideToggle("slow");
        	$(this).toggleClass("active");        
		$(this).siblings(".block-ecjc_calendar div.all_week span").removeClass("active"); 
	});

	  };

/* calendar */
