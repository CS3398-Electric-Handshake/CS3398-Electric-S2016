//iPad scaling bug	 	
if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)) { 
	var viewport = document.querySelector('meta[name="viewport"]');
	if (viewport) { 
		viewport.content = 'width=device-width, minimum-scale=1.0, maximum-scale=1.0'; 
		document.body.addEventListener('gesturestart', function() 
			{ viewport.content = 'width=device-width, minimum-scale=1.0, maximum-scale=2.0'; }, false); 	
	} 
}

/*
 * jQuery throttle / debounce - v1.1 - 3/7/2010
 * http://benalman.com/projects/jquery-throttle-debounce-plugin/
 * 
 * Copyright (c) 2010 "Cowboy" Ben Alman
 * Dual licensed under the MIT and GPL licenses.
 * http://benalman.com/about/license/
 */
(function(b,c){var $=b.jQuery||b.Cowboy||(b.Cowboy={}),a;$.throttle=a=function(e,f,j,i){var h,d=0;if(typeof f!=="boolean"){i=j;j=f;f=c}function g(){var o=this,m=+new Date()-d,n=arguments;function l(){d=+new Date();j.apply(o,n)}function k(){h=c}if(i&&!h){l()}h&&clearTimeout(h);if(i===c&&m>e){l()}else{if(f!==true){h=setTimeout(i?k:l,i===c?e-m:e)}}}if($.guid){g.guid=j.guid=j.guid||$.guid++}return g};$.debounce=function(d,e,f){return f===c?a(d,e,false):a(d,f,e!==false)}})(this);

(function($,sr){

  // debouncing function from John Hann
  // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
  var debounce = function (func, threshold, execAsap) {
      var timeout;

      return function debounced () {
          var obj = this, args = arguments;
          function delayed () {
              if (!execAsap)
                  func.apply(obj, args);
              timeout = null;
          };

          if (timeout)
              clearTimeout(timeout);
          else if (execAsap)
              func.apply(obj, args);

          timeout = setTimeout(delayed, threshold || 100);
      };
  }
  // smartresize 
  jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };

})(jQuery,'smartresize');

/**
* jquery.matchHeight-min.js v0.5.2
* http://brm.io/jquery-match-height/
* License: MIT
*/
(function(c){var f=-1,g=-1,q=function(a){var b=null,d=[];c(a).each(function(){var a=c(this),l=a.offset().top-k(a.css("margin-top")),m=0<d.length?d[d.length-1]:null;null===m?d.push(a):1>=Math.floor(Math.abs(b-l))?d[d.length-1]=m.add(a):d.push(a);b=l});return d},k=function(a){return parseFloat(a)||0},n=function(a){var b={byRow:!0,remove:!1,property:"height"};"object"===typeof a&&(b=c.extend(b,a));"boolean"===typeof a&&(b.byRow=a);"remove"===a&&(b.remove=!0);return b},b=c.fn.matchHeight=function(a){a=
n(a);if(a.remove){var e=this;this.css(a.property,"");c.each(b._groups,function(a,b){b.elements=b.elements.not(e)});return this}if(1>=this.length)return this;b._groups.push({elements:this,options:a});b._apply(this,a);return this};b._groups=[];b._throttle=80;b._maintainScroll=!1;b._beforeUpdate=null;b._afterUpdate=null;b._apply=function(a,e){var d=n(e),h=c(a),l=[h],m=c(window).scrollTop(),g=c("html").outerHeight(!0),f=h.parents().filter(":hidden");f.css("display","block");d.byRow&&(h.each(function(){var a=
c(this),b="inline-block"===a.css("display")?"inline-block":"block";a.data("style-cache",a.attr("style"));a.css({display:b,"padding-top":"0","padding-bottom":"0","margin-top":"0","margin-bottom":"0","border-top-width":"0","border-bottom-width":"0",height:"100px"})}),l=q(h),h.each(function(){var a=c(this);a.attr("style",a.data("style-cache")||"").css("height","")}));c.each(l,function(a,b){var e=c(b),f=0;d.byRow&&1>=e.length||(e.each(function(){var a=c(this),b={display:"inline-block"===a.css("display")?
"inline-block":"block"};b[d.property]="";a.css(b);a.outerHeight(!1)>f&&(f=a.outerHeight(!1));a.css("display","")}),e.each(function(){var a=c(this),b=0;"border-box"!==a.css("box-sizing")&&(b+=k(a.css("border-top-width"))+k(a.css("border-bottom-width")),b+=k(a.css("padding-top"))+k(a.css("padding-bottom")));a.css(d.property,f-b)}))});f.css("display","");b._maintainScroll&&c(window).scrollTop(m/g*c("html").outerHeight(!0));return this};b._applyDataApi=function(){var a={};c("[data-match-height], [data-mh]").each(function(){var b=
c(this),d=b.attr("data-match-height")||b.attr("data-mh");a[d]=d in a?a[d].add(b):b});c.each(a,function(){this.matchHeight(!0)})};var p=function(a){b._beforeUpdate&&b._beforeUpdate(a,b._groups);c.each(b._groups,function(){b._apply(this.elements,this.options)});b._afterUpdate&&b._afterUpdate(a,b._groups)};b._update=function(a,e){if(e&&"resize"===e.type){var d=c(window).width();if(d===f)return;f=d}a?-1===g&&(g=setTimeout(function(){p(e);g=-1},b._throttle)):p(e)};c(b._applyDataApi);c(window).bind("load",
function(a){b._update(!1,a)});c(window).bind("resize orientationchange",function(a){b._update(!0,a)})})(jQuery);
$.fn.matchHeight._maintainScroll = true;
$('.match-height').matchHeight();

$('.icon-menu').click(function(e) {
	e.preventDefault();
	$('#navigation').toggleClass('active');
	$('.menu-btn').toggleClass('active');
});

$(".site-search").click(function(){
	$('.opacity-change').toggleClass('active');
    $("#search").slideToggle();
    
});

function initMap() { var mapDiv = document.getElementById('map'); var map = new google.maps.Map(mapDiv, { center: {lat: 29.885454, lng: -97.940567}, zoom: 15 }); }

