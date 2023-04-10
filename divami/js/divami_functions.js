
 //tracking code in home page
 function google_analytics_tracking(eventCategory,eventLabel,eventValue){
    gtag("event", "click", {
        "event_category": eventCategory,
        "event_label": eventLabel,
        "value": eventValue
      });
  }
  //end of tracking code
  //gtag code
  {/* <script>  */}
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
  
    gtag('config', 'UA-141892166-1');
  // </script>


//To gets the elements by class.
function getElementsByClaass(className) {
	if (!className) {
		return [];
	}
	var elements = document.getElementsByClassName(className);

	return elements ? elements : [];
	//document.querySelectorAll('.verdana14.toAdd') Need to include for IE8.
}

//Returns the width of viewport
function getWindowWidth() {
	var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
	return w;
}

/*Compatable bind event */
function bindEvent(element ,eventR, cb) {
	if (element.addEventListener) {
		element.addEventListener(eventR, cb, false);
	} else if (this.attachEvent) {
		element.attachEvent(eventR, cb);
	}
};

function unBindEvent(element ,eventR, cb) {
	if (element.removeEventListener) {
		element.removeEventListener(eventR, cb, false);
	} else if (this.detachEvent) {
		element.detachEvent(eventR, cb);
	}
};

//Removes the class of elements you mentioned.
function removeClass(element, classnames) {
	if (!element || !classnames || !classnames.length) {
		return;
	}
	if(element.classList) {
		for (var i = 0, iLen = classnames.length; i < iLen; i++) {
			element.classList.remove(classnames[i]);
		}
	} else if(element.className != null && element.className != undefined && element.className != ""){
		var classList = element.className.split(" ");
		for (var i = 0, iLen = classnames.length; i < iLen; i++) {
			var index = classList.indexOf(classnames[i]);
			if(index != -1) {
				classList.splice(index, 1);
			}
		}
		element.className = classList.join(" ");
	}
}

//function to caluculate scroll top position.
function scrollTop() {
	var docEl = document.documentElement;
	var body = document.body;
	return window.pageYOffset || docEl.scrollTop || body.scrollTop;
}

var yDown1 = null;
function handleTouchStart1(evt) {    
    yDown1 = evt.touches[0].clientY;                                      
}; 

function handleTouchMove1 (evt) {
    var yUp = evt.changedTouches[0].clientY;
    var yDiff = yDown1 - yUp;

    if ( Math.abs( yDiff ) >5) {/* 5 is a Threshold on X*/
   		evt.preventDefault();                  
    } 
}
function disableSwipe(element) {
	if (!element)
		return;
	bindEvent(element, 'touchstart', handleTouchStart1);        
	bindEvent(element, 'touchmove', handleTouchMove1);                      
}

//has the class to element you mentioned in array.
function hasClass(element, classname) {
	if(!classname){
		return true;
	}
	return (" " + element.className + " " ).indexOf( " "+classname+" " ) > -1;
	//return(element.classList.indexOf(classname) > -1);
}

function enableSwipe(element) {
	if (!element)
		return;
	unBindEvent(element, 'touchstart', handleTouchStart1);        
	unBindEvent(element, 'touchmove', handleTouchMove1);    
}

//Addes the class to element you mentioned in array.
function addClass(element, classnames) {
	if (!element || !classnames || !classnames.length) {
		return;
	}
	if(element.classList) {
		for (var i = 0, iLen = classnames.length; i < iLen; i++) {
			element.classList.add(classnames[i]);
		}
	} else {
		var classList = element.className.split(" ");
		for (var i = 0, iLen = classnames.length; i < iLen; i++) {
			var index = classList.indexOf(classnames[i]);
			if(index == -1) {
				classList.push(classnames[i]);
			}
		}
		element.className = classList.join(" ");
	}
}


function setBodyOptions(isOpen) {
	if(isOpen){
		document.body.style.height = getWindowHeight()+"px";
		document.body.style.overflowY = "hidden";
		document.documentElement.style.overflowY = "hidden";
	} else {
		document.body.style.height = "auto";
		document.body.style.overflowY = "auto";
		document.documentElement.style.overflowY = "auto";
	}
}

//Returns the height of viewpor
function getWindowHeight() {
	var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
	return h;
}


var isMMenuOpen = false;
var pevTop;
function registerMobileMenu() {
    var timeEventOfmm;
    var elements = getElementsByClaass("nav-icon");
    if(elements.length != 0){
    	if(!isMMenuOpen) {
        	removeClass(elements[0], ["open"]);
        	addClass(listOfElements.mobileMenu.element, ["displayInvisible"]);
    		removeClass(listOfElements.mobileMenu.element, ["slideInRight"]);
    		 setBodyOptions(false);
    	} else {
    		 setBodyOptions(true);
    		 
    	}
        elements[0].onclick = function(){
            if(!hasClass(elements[0], "open")) {
            	isMMenuOpen = true;
                addClass(elements[0], ["open"]);
                removeClass(listOfElements.mobileMenu.element, ["slideOutRight", "displayInvisible"]);
                addClass(listOfElements.mobileMenu.element, ["animated-1s", "slideInRight"]);
                
				pevTop = scrollTop();
                
				
                timeEventOfmm = setTimeout(function() {
                	setBodyOptions(true);
                	removeClass(listOfElements.mobileMenu.element, ["animated-1s"]);
                }, 1000);
                
            } else {
            	closeMobileMenu();
            	if(timeEventOfmm != null && timeEventOfmm != undefined){
			        clearTimeout(timeEventOfmm);
			    }
            	isMMenuOpen = false;
            	setBodyOptions(false);
                setScrollTop(pevTop);
                removeClass(elements[0], ["open"]);
                removeClass(listOfElements.mobileMenu.element, ["slideInRight"]);
                addClass(listOfElements.mobileMenu.element, ["animated-1s", "slideOutRight"]);
                
            }
        };
    }
}

function closingMobilemenu () {
    var elements = getElementsByClaass("nav-icon");
	isMMenuOpen = false;
	setBodyOptions(false);
    setScrollTop(pevTop);
    removeClass(elements[0], ["open"]);
    removeClass(listOfElements.mobileMenu.element, ["slideInRight"]);
    addClass(listOfElements.mobileMenu.element, ["animated-1s", "slideOutRight"]);
}
function setScrollTop(pxd){
	document.body.scrollTop = pxd;
	document.documentElement.scrollTop = pxd;
	window.pageYOffset = pxd;
}

var listOfElements = {};
function header_function (e) {
	var elements;
    var prevWidth = 0;
	
	
	elements = getElementsByClaass("mobileMenu");
	listOfElements.mobileMenu = {
		element : elements.length? elements[0] : ""
	};
	
	
	var init = function(){
		var width = getWindowWidth();
		var timeoutfun = setTimeout(function() {
			var ele = document.getElementsByClassName("breakeTag");
			while(ele.length > 0){
		        ele[0].parentNode.removeChild(ele[0]);
		    }
		},10);
		
        if(prevWidth == width){
            return;
        }
        prevWidth = width;
		if(width >= 1024) {
			
			removeClass(listOfElements.mobileMenu.element, ["slideOutRight", "displayInvisible", "mm"]);
			setBodyOptions(false);
			hideBackToTop();
		} else {
				registerMobileMenu();
				window.onscroll = mobileMenuScroll;
			    mobileMenuScroll(true);
		}
	};
	init();
	subscribe();
	bindEvent(window, "resize", init);
};




 var regexForName = /^[a-zA-Z ]{2,}$/;
 var regexForMessage = /^[ a-zA-Z0-9!@#\$%\^\&*\)\(+=.,_-\{\}<>"\n]{2,}$/;
 
 var regexForEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
 var inValidFormat = false; 

function shpa() {
	if(isIDevice()) getElementsByClaass("t-h-c")[0].style.position="absolute";
}
function shpf() {
	if(isIDevice()) getElementsByClaass("t-h-c")[0].style.position="fixed";
}

function mobileAndTabletcheck() {
	var check = false;
	(function(a) {
		if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4)))
			check = true;
	})(navigator.userAgent || navigator.vendor || window.opera);
	return check;
}

function isIDevice() {
 	return /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
}

function isIpadChrome() {
	return (/iPad/.test(navigator.userAgent) && !window.MSStream && navigator.userAgent.match('CriOS') == "CriOS");
}


//date formate function

var dateFormat = function () {
    var    token = /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZ]|"[^"]*"|'[^']*'/g,
        timezone = /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
        timezoneClip = /[^-+\dA-Z]/g,
        pad = function (val, len) {
            val = String(val);
            len = len || 2;
            while (val.length < len) val = "0" + val;
            return val;
        };

    // Regexes and supporting functions are cached through closure
    return function (date, mask, utc) {
        var dF = dateFormat;

        // You can't provide utc if you skip other args (use the "UTC:" mask prefix)
        if (arguments.length == 1 && Object.prototype.toString.call(date) == "[object String]" && !/\d/.test(date)) {
            mask = date;
            date = undefined;
        }

        // Passing date through Date applies Date.parse, if necessary
        date = date ? new Date(date) : new Date;
        if (isNaN(date)) throw SyntaxError("invalid date");

        mask = String(dF.masks[mask] || mask || dF.masks["default"]);

        // Allow setting the utc argument via the mask
        if (mask.slice(0, 4) == "UTC:") {
            mask = mask.slice(4);
            utc = true;
        }

        var    _ = utc ? "getUTC" : "get",
            d = date[_ + "Date"](),
            D = date[_ + "Day"](),
            m = date[_ + "Month"](),
            y = date[_ + "FullYear"](),
            H = date[_ + "Hours"](),
            M = date[_ + "Minutes"](),
            s = date[_ + "Seconds"](),
            L = date[_ + "Milliseconds"](),
            o = utc ? 0 : date.getTimezoneOffset(),
            flags = {
                d:    d,
                dd:   pad(d),
                ddd:  dF.i18n.dayNames[D],
                dddd: dF.i18n.dayNames[D + 7],
                m:    m + 1,
                mm:   pad(m + 1),
                mmm:  dF.i18n.monthNames[m],
                mmmm: dF.i18n.monthNames[m + 12],
                yy:   String(y).slice(2),
                yyyy: y,
                h:    H % 12 || 12,
                hh:   pad(H % 12 || 12),
                H:    H,
                HH:   pad(H),
                M:    M,
                MM:   pad(M),
                s:    s,
                ss:   pad(s),
                l:    pad(L, 3),
                L:    pad(L > 99 ? Math.round(L / 10) : L),
                t:    H < 12 ? "a"  : "p",
                tt:   H < 12 ? "am" : "pm",
                T:    H < 12 ? "A"  : "P",
                TT:   H < 12 ? "AM" : "PM",
                Z:    utc ? "UTC" : (String(date).match(timezone) || [""]).pop().replace(timezoneClip, ""),
                o:    (o > 0 ? "-" : "+") + pad(Math.floor(Math.abs(o) / 60) * 100 + Math.abs(o) % 60, 4),
                S:    ["th", "st", "nd", "rd"][d % 10 > 3 ? 0 : (d % 100 - d % 10 != 10) * d % 10]
            };

        return mask.replace(token, function ($0) {
            return $0 in flags ? flags[$0] : $0.slice(1, $0.length - 1);
        });
    };
}();
    
// Some common format strings
dateFormat.masks = {
    "default":      "ddd mmm dd yyyy HH:MM:ss",
    shortDate:      "m/d/yy",
    mediumDate:     "mmm d, yyyy",
    longDate:       "mmmm d, yyyy",
    fullDate:       "dddd, mmmm d, yyyy",
    shortTime:      "h:MM TT",
    mediumTime:     "h:MM:ss TT",
    longTime:       "h:MM:ss TT Z",
    isoDate:        "yyyy-mm-dd",
    isoTime:        "HH:MM:ss",
    isoDateTime:    "yyyy-mm-dd'T'HH:MM:ss",
    isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'"
};

// Internationalization strings
dateFormat.i18n = {
    dayNames: [
        "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat",
        "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
    ],
    monthNames: [
        "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
        "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
    ]
};

// For convenience...
Date.prototype.format = function (mask, utc) {
    return dateFormat(this, mask, utc);
};




//GoogleMapInitializationcode
function initialize() {
	var width = getWindowWidth();
	var h = getWindowHeight();
	var errorPage = getElementsByClaass("n-f-p")[0];
	var h = window.innerHeight;
	if(errorPage) {
		errorPage.style.minHeight = (h - 120) + "px";
	}
}
bindEvent(window, 'load', initialize);

function setSize() {
	var width = getWindowWidth();
	var h = getWindowHeight();
	var h = window.innerHeight;
	var errorPage = getElementsByClaass("n-f-p")[0];
	if(errorPage) {
		errorPage.style.minHeight = (h - 120) + "px";
	}
	resizeMobileMenu();
}

bindEvent(window, "resize", setSize);
var isMenuOpen = false;
jQuery( document ).ready(function() {
	mobileMenuInitialization();
});

function resizeMobileMenu() {
	if(!isMenuOpen) {
		mobileMenuInitialization();
	} else {
		closeMobileMenu();
	}
}

function mobileMenuInitialization() {
	jQuery(".menuCloseIcon").hide();
	var ulElemHeight = jQuery(".f-l-s").outerHeight();
	var menuHeight = jQuery(".f-s-m").outerHeight();
	if(ulElemHeight <= menuHeight) {
		jQuery(".menuIcon").hide();
	} else {
		jQuery(".menuIcon").css('display', 'inline-block');
	}
}

function openMobileMenu() {
	isMenuOpen = true;
	var ulElemHeight = jQuery(".f-l-s").outerHeight();
	var menuHeight = jQuery(".f-s-m").outerHeight();
	jQuery(".menuIcon").hide();
	jQuery(".menuCloseIcon").show();
    jQuery(".f-s-m").css("height", ulElemHeight);
}

function closeMobileMenu() {
	isMenuOpen = false;
	jQuery(".menuIcon").show();
	jQuery(".menuCloseIcon").hide();
	jQuery(".f-s-m").css("height", 40);
	var ulElemHeight = jQuery(".f-l-s").outerHeight();
	if(ulElemHeight <= 40) {
		jQuery(".menuIcon").hide();
	} else {
		jQuery(".menuIcon").css('display', 'inline-block');
	}
}

function showBackToTop(){
    var scrollme;
    var backToTopIcon = getElementsByClaass("b-t-p");
    if(backToTopIcon[0]){
    	backToTopIcon[0].style.display= "block";
    }
    scrollme = document.querySelector("#top");
    if(scrollme){
	    scrollme.onclick = function(){
	         scrollTo(0, 700);
	    };
    }
}

function hideBackToTop(){
    var backToTopIcon = getElementsByClaass("b-t-p");
    if(backToTopIcon[0]){
    	 backToTopIcon[0].style.display= "none";
    }
}

function scrollTo(to, duration) {
  if (duration <= 0) return;
  var difference = to - scrollTop();
  var perTick = difference / duration * 10;
  setTimeout(function() {
  	var st= scrollTop() + perTick;
    setScrollTop(st);
    if (st == to) return;
    scrollTo(to, duration - 10);
  }, 10);
}

function mobileMenuScroll(state){
   if(scrollTop() == 0){
        hideBackToTop();
    } else{
        showBackToTop();
    }
}

var count = 0;
function subscribe(){
	var width = getWindowWidth();
	var timeoutfun = setTimeout(function() {
		var element = getElementsByClaass("mc4wp-form-fields")[0];
		var responsemsg = getElementsByClaass("mc4wp-response")[0];
		if(element){
			var alertmsg = getElementsByClaass("mc4wp-alert")[0];
			var errormsg = getElementsByClaass("mc4wp-error")[0];
			var successmsg = getElementsByClaass("mc4wp-success")[0];
			var noticemsg = getElementsByClaass("mc4wp-notice")[0];
			if(alertmsg){
				responsemsg.style.position = "fixed";
				if(width>=1024){
					responsemsg.style.top = 95 + "px";
				} else if((width>=768) && (width<1024)){
					responsemsg.style.top = 80 + "px";
				} else{
					responsemsg.style.top = 40 + "px";
				}
				alertmsg.style.paddingTop = 10 + "px";
				alertmsg.style.paddingBottom = 10 + "px";
				alertmsg.style.paddingLeft = 40 + "px";
				alertmsg.style.paddingRight = 30 + "px";
				if(width<768){
					alertmsg.style.paddingTop = 10 + "px";
					alertmsg.style.paddingBottom = 10 + "px";
					alertmsg.style.paddingLeft = 35 + "px";
					alertmsg.style.paddingRight = 30 + "px";
				}
				if(errormsg){
					if(!count){
						alertmsg.innerHTML = '<div class="errorAlert"></div>' + alertmsg.innerHTML;
						count++;
					}
				} else if(successmsg){
					if(!count){
						alertmsg.innerHTML = '<div class="successAlert"></div>' + alertmsg.innerHTML;
						count++;
					}
				} else if(noticemsg){
					if(!count){
						alertmsg.innerHTML = '<div class="infoAlert"></div>' + alertmsg.innerHTML;
						count++;
					}
				} else{
					if(!count){
						alertmsg.innerHTML = '<div class="warningAlert"></div>' + alertmsg.innerHTML;
						count++;
					}
				}
				var elem = getElementsByClaass("mc4wp-alert")[0];
				var closeIconEle = getElementsByClaass("closeIcon")[0];
				if(!closeIconEle){
					elem.innerHTML = elem.innerHTML + '<div class="closeIcon" onclick="closeelement();"></div>';
				}
			} else{
				
			}
		}
	}, 10);
	var alertClose = setTimeout(function() {
		var elem = getElementsByClaass("mc4wp-alert")[0];
		if(elem){
			elem.style.display = "none";
		}
	},5000);
	
};
bindEvent(window, "resize", subscribe);
function closeelement(){
	var elem = getElementsByClaass("mc4wp-alert")[0];
	if(elem){
		elem.style.display = "none";
	}
};

