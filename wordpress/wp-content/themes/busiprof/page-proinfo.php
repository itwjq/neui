<?php
	// get_header();
	// require("./pro-sel.php");
	// include(get_template_directory_uri()."/pro-sel.php");
	// include("http://127.0.0.1/wordpress/wp-content/themes/busiprof/pro-sel.php");
	global $wpdb;//定义全局变量
	global $current_user;
	wp_get_current_user();
?>
	<script type="text/javascript" async="" src="<?php bloginfo('template_url'); ?>/style/analytics.js"></script>
	<script type="text/javascript" async="" src="<?php echo home_url(); ?>/wp-includes/js/jquery/jquery-1.8.3.min.js"></script>
	<script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"bam.nr-data.net","errorBeacon":"bam.nr-data.net","licenseKey":"0f3d20e9cb","applicationID":"1979363","transactionName":"IApZEUReXVUGRElGQAwPUgZCQh5KC1kR","queueTime":3,"applicationTime":101,"agent":""}</script>
	<script type="text/javascript">(window.NREUM||(NREUM={})).loader_config={xpid:"Vg4OUlNUGwIJU1hRAQI="};window.NREUM||(NREUM={}),__nr_require=function(t,n,e){function r(e){if(!n[e]){var o=n[e]={exports:{}};t[e][0].call(o.exports,function(n){var o=t[e][1][n];return r(o||n)},o,o.exports)}return n[e].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<e.length;o++)r(e[o]);return r}({1:[function(t,n,e){function r(t){try{s.console&&console.log(t)}catch(n){}}var o,i=t("ee"),a=t(15),s={};try{o=localStorage.getItem("__nr_flags").split(","),console&&"function"==typeof console.log&&(s.console=!0,o.indexOf("dev")!==-1&&(s.dev=!0),o.indexOf("nr_dev")!==-1&&(s.nrDev=!0))}catch(c){}s.nrDev&&i.on("internal-error",function(t){r(t.stack)}),s.dev&&i.on("fn-err",function(t,n,e){r(e.stack)}),s.dev&&(r("NR AGENT IN DEVELOPMENT MODE"),r("flags: "+a(s,function(t,n){return t}).join(", ")))},{}],2:[function(t,n,e){function r(t,n,e,r,s){try{p?p-=1:o(s||new UncaughtException(t,n,e),!0)}catch(f){try{i("ierr",[f,c.now(),!0])}catch(d){}}return"function"==typeof u&&u.apply(this,a(arguments))}function UncaughtException(t,n,e){this.message=t||"Uncaught error with no additional information",this.sourceURL=n,this.line=e}function o(t,n){var e=n?null:c.now();i("err",[t,e])}var i=t("handle"),a=t(16),s=t("ee"),c=t("loader"),f=t("gos"),u=window.onerror,d=!1,l="nr@seenError",p=0;c.features.err=!0,t(1),window.onerror=r;try{throw new Error}catch(h){"stack"in h&&(t(8),t(7),"addEventListener"in window&&t(5),c.xhrWrappable&&t(9),d=!0)}s.on("fn-start",function(t,n,e){d&&(p+=1)}),s.on("fn-err",function(t,n,e){d&&!e[l]&&(f(e,l,function(){return!0}),this.thrown=!0,o(e))}),s.on("fn-end",function(){d&&!this.thrown&&p>0&&(p-=1)}),s.on("internal-error",function(t){i("ierr",[t,c.now(),!0])})},{}],3:[function(t,n,e){t("loader").features.ins=!0},{}],4:[function(t,n,e){function r(t){}if(window.performance&&window.performance.timing&&window.performance.getEntriesByType){var o=t("ee"),i=t("handle"),a=t(8),s=t(7),c="learResourceTimings",f="addEventListener",u="resourcetimingbufferfull",d="bstResource",l="resource",p="-start",h="-end",m="fn"+p,w="fn"+h,v="bstTimer",y="pushState",g=t("loader");g.features.stn=!0,t(6);var b=NREUM.o.EV;o.on(m,function(t,n){var e=t[0];e instanceof b&&(this.bstStart=g.now())}),o.on(w,function(t,n){var e=t[0];e instanceof b&&i("bst",[e,n,this.bstStart,g.now()])}),a.on(m,function(t,n,e){this.bstStart=g.now(),this.bstType=e}),a.on(w,function(t,n){i(v,[n,this.bstStart,g.now(),this.bstType])}),s.on(m,function(){this.bstStart=g.now()}),s.on(w,function(t,n){i(v,[n,this.bstStart,g.now(),"requestAnimationFrame"])}),o.on(y+p,function(t){this.time=g.now(),this.startPath=location.pathname+location.hash}),o.on(y+h,function(t){i("bstHist",[location.pathname+location.hash,this.startPath,this.time])}),f in window.performance&&(window.performance["c"+c]?window.performance[f](u,function(t){i(d,[window.performance.getEntriesByType(l)]),window.performance["c"+c]()},!1):window.performance[f]("webkit"+u,function(t){i(d,[window.performance.getEntriesByType(l)]),window.performance["webkitC"+c]()},!1)),document[f]("scroll",r,{passive:!0}),document[f]("keypress",r,!1),document[f]("click",r,!1)}},{}],5:[function(t,n,e){function r(t){for(var n=t;n&&!n.hasOwnProperty(u);)n=Object.getPrototypeOf(n);n&&o(n)}function o(t){s.inPlace(t,[u,d],"-",i)}function i(t,n){return t[1]}var a=t("ee").get("events"),s=t(18)(a,!0),c=t("gos"),f=XMLHttpRequest,u="addEventListener",d="removeEventListener";n.exports=a,"getPrototypeOf"in Object?(r(document),r(window),r(f.prototype)):f.prototype.hasOwnProperty(u)&&(o(window),o(f.prototype)),a.on(u+"-start",function(t,n){var e=t[1],r=c(e,"nr@wrapped",function(){function t(){if("function"==typeof e.handleEvent)return e.handleEvent.apply(e,arguments)}var n={object:t,"function":e}[typeof e];return n?s(n,"fn-",null,n.name||"anonymous"):e});this.wrapped=t[1]=r}),a.on(d+"-start",function(t){t[1]=this.wrapped||t[1]})},{}],6:[function(t,n,e){var r=t("ee").get("history"),o=t(18)(r);n.exports=r,o.inPlace(window.history,["pushState","replaceState"],"-")},{}],7:[function(t,n,e){var r=t("ee").get("raf"),o=t(18)(r),i="equestAnimationFrame";n.exports=r,o.inPlace(window,["r"+i,"mozR"+i,"webkitR"+i,"msR"+i],"raf-"),r.on("raf-start",function(t){t[0]=o(t[0],"fn-")})},{}],8:[function(t,n,e){function r(t,n,e){t[0]=a(t[0],"fn-",null,e)}function o(t,n,e){this.method=e,this.timerDuration=isNaN(t[1])?0:+t[1],t[0]=a(t[0],"fn-",this,e)}var i=t("ee").get("timer"),a=t(18)(i),s="setTimeout",c="setInterval",f="clearTimeout",u="-start",d="-";n.exports=i,a.inPlace(window,[s,"setImmediate"],s+d),a.inPlace(window,[c],c+d),a.inPlace(window,[f,"clearImmediate"],f+d),i.on(c+u,r),i.on(s+u,o)},{}],9:[function(t,n,e){function r(t,n){d.inPlace(n,["onreadystatechange"],"fn-",s)}function o(){var t=this,n=u.context(t);t.readyState>3&&!n.resolved&&(n.resolved=!0,u.emit("xhr-resolved",[],t)),d.inPlace(t,y,"fn-",s)}function i(t){g.push(t),h&&(x?x.then(a):w?w(a):(E=-E,O.data=E))}function a(){for(var t=0;t<g.length;t++)r([],g[t]);g.length&&(g=[])}function s(t,n){return n}function c(t,n){for(var e in t)n[e]=t[e];return n}t(5);var f=t("ee"),u=f.get("xhr"),d=t(18)(u),l=NREUM.o,p=l.XHR,h=l.MO,m=l.PR,w=l.SI,v="readystatechange",y=["onload","onerror","onabort","onloadstart","onloadend","onprogress","ontimeout"],g=[];n.exports=u;var b=window.XMLHttpRequest=function(t){var n=new p(t);try{u.emit("new-xhr",[n],n),n.addEventListener(v,o,!1)}catch(e){try{u.emit("internal-error",[e])}catch(r){}}return n};if(c(p,b),b.prototype=p.prototype,d.inPlace(b.prototype,["open","send"],"-xhr-",s),u.on("send-xhr-start",function(t,n){r(t,n),i(n)}),u.on("open-xhr-start",r),h){var x=m&&m.resolve();if(!w&&!m){var E=1,O=document.createTextNode(E);new h(a).observe(O,{characterData:!0})}}else f.on("fn-end",function(t){t[0]&&t[0].type===v||a()})},{}],10:[function(t,n,e){function r(t){var n=this.params,e=this.metrics;if(!this.ended){this.ended=!0;for(var r=0;r<d;r++)t.removeEventListener(u[r],this.listener,!1);if(!n.aborted){if(e.duration=a.now()-this.startTime,4===t.readyState){n.status=t.status;var i=o(t,this.lastSize);if(i&&(e.rxSize=i),this.sameOrigin){var c=t.getResponseHeader("X-NewRelic-App-Data");c&&(n.cat=c.split(", ").pop())}}else n.status=0;e.cbTime=this.cbTime,f.emit("xhr-done",[t],t),s("xhr",[n,e,this.startTime])}}}function o(t,n){var e=t.responseType;if("json"===e&&null!==n)return n;var r="arraybuffer"===e||"blob"===e||"json"===e?t.response:t.responseText;return h(r)}function i(t,n){var e=c(n),r=t.params;r.host=e.hostname+":"+e.port,r.pathname=e.pathname,t.sameOrigin=e.sameOrigin}var a=t("loader");if(a.xhrWrappable){var s=t("handle"),c=t(11),f=t("ee"),u=["load","error","abort","timeout"],d=u.length,l=t("id"),p=t(14),h=t(13),m=window.XMLHttpRequest;a.features.xhr=!0,t(9),f.on("new-xhr",function(t){var n=this;n.totalCbs=0,n.called=0,n.cbTime=0,n.end=r,n.ended=!1,n.xhrGuids={},n.lastSize=null,p&&(p>34||p<10)||window.opera||t.addEventListener("progress",function(t){n.lastSize=t.loaded},!1)}),f.on("open-xhr-start",function(t){this.params={method:t[0]},i(this,t[1]),this.metrics={}}),f.on("open-xhr-end",function(t,n){"loader_config"in NREUM&&"xpid"in NREUM.loader_config&&this.sameOrigin&&n.setRequestHeader("X-NewRelic-ID",NREUM.loader_config.xpid)}),f.on("send-xhr-start",function(t,n){var e=this.metrics,r=t[0],o=this;if(e&&r){var i=h(r);i&&(e.txSize=i)}this.startTime=a.now(),this.listener=function(t){try{"abort"===t.type&&(o.params.aborted=!0),("load"!==t.type||o.called===o.totalCbs&&(o.onloadCalled||"function"!=typeof n.onload))&&o.end(n)}catch(e){try{f.emit("internal-error",[e])}catch(r){}}};for(var s=0;s<d;s++)n.addEventListener(u[s],this.listener,!1)}),f.on("xhr-cb-time",function(t,n,e){this.cbTime+=t,n?this.onloadCalled=!0:this.called+=1,this.called!==this.totalCbs||!this.onloadCalled&&"function"==typeof e.onload||this.end(e)}),f.on("xhr-load-added",function(t,n){var e=""+l(t)+!!n;this.xhrGuids&&!this.xhrGuids[e]&&(this.xhrGuids[e]=!0,this.totalCbs+=1)}),f.on("xhr-load-removed",function(t,n){var e=""+l(t)+!!n;this.xhrGuids&&this.xhrGuids[e]&&(delete this.xhrGuids[e],this.totalCbs-=1)}),f.on("addEventListener-end",function(t,n){n instanceof m&&"load"===t[0]&&f.emit("xhr-load-added",[t[1],t[2]],n)}),f.on("removeEventListener-end",function(t,n){n instanceof m&&"load"===t[0]&&f.emit("xhr-load-removed",[t[1],t[2]],n)}),f.on("fn-start",function(t,n,e){n instanceof m&&("onload"===e&&(this.onload=!0),("load"===(t[0]&&t[0].type)||this.onload)&&(this.xhrCbStart=a.now()))}),f.on("fn-end",function(t,n){this.xhrCbStart&&f.emit("xhr-cb-time",[a.now()-this.xhrCbStart,this.onload,n],n)})}},{}],11:[function(t,n,e){n.exports=function(t){var n=document.createElement("a"),e=window.location,r={};n.href=t,r.port=n.port;var o=n.href.split("://");!r.port&&o[1]&&(r.port=o[1].split("/")[0].split("@").pop().split(":")[1]),r.port&&"0"!==r.port||(r.port="https"===o[0]?"443":"80"),r.hostname=n.hostname||e.hostname,r.pathname=n.pathname,r.protocol=o[0],"/"!==r.pathname.charAt(0)&&(r.pathname="/"+r.pathname);var i=!n.protocol||":"===n.protocol||n.protocol===e.protocol,a=n.hostname===document.domain&&n.port===e.port;return r.sameOrigin=i&&(!n.hostname||a),r}},{}],12:[function(t,n,e){function r(){}function o(t,n,e){return function(){return i(t,[f.now()].concat(s(arguments)),n?null:this,e),n?void 0:this}}var i=t("handle"),a=t(15),s=t(16),c=t("ee").get("tracer"),f=t("loader"),u=NREUM;"undefined"==typeof window.newrelic&&(newrelic=u);var d=["setPageViewName","setCustomAttribute","setErrorHandler","finished","addToTrace","inlineHit","addRelease"],l="api-",p=l+"ixn-";a(d,function(t,n){u[n]=o(l+n,!0,"api")}),u.addPageAction=o(l+"addPageAction",!0),u.setCurrentRouteName=o(l+"routeName",!0),n.exports=newrelic,u.interaction=function(){return(new r).get()};var h=r.prototype={createTracer:function(t,n){var e={},r=this,o="function"==typeof n;return i(p+"tracer",[f.now(),t,e],r),function(){if(c.emit((o?"":"no-")+"fn-start",[f.now(),r,o],e),o)try{return n.apply(this,arguments)}catch(t){throw c.emit("fn-err",[arguments,this,t],e),t}finally{c.emit("fn-end",[f.now()],e)}}}};a("setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","),function(t,n){h[n]=o(p+n)}),newrelic.noticeError=function(t){"string"==typeof t&&(t=new Error(t)),i("err",[t,f.now()])}},{}],13:[function(t,n,e){n.exports=function(t){if("string"==typeof t&&t.length)return t.length;if("object"==typeof t){if("undefined"!=typeof ArrayBuffer&&t instanceof ArrayBuffer&&t.byteLength)return t.byteLength;if("undefined"!=typeof Blob&&t instanceof Blob&&t.size)return t.size;if(!("undefined"!=typeof FormData&&t instanceof FormData))try{return JSON.stringify(t).length}catch(n){return}}}},{}],14:[function(t,n,e){var r=0,o=navigator.userAgent.match(/Firefox[\/\s](\d+\.\d+)/);o&&(r=+o[1]),n.exports=r},{}],15:[function(t,n,e){function r(t,n){var e=[],r="",i=0;for(r in t)o.call(t,r)&&(e[i]=n(r,t[r]),i+=1);return e}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],16:[function(t,n,e){function r(t,n,e){n||(n=0),"undefined"==typeof e&&(e=t?t.length:0);for(var r=-1,o=e-n||0,i=Array(o<0?0:o);++r<o;)i[r]=t[n+r];return i}n.exports=r},{}],17:[function(t,n,e){n.exports={exists:"undefined"!=typeof window.performance&&window.performance.timing&&"undefined"!=typeof window.performance.timing.navigationStart}},{}],18:[function(t,n,e){function r(t){return!(t&&t instanceof Function&&t.apply&&!t[a])}var o=t("ee"),i=t(16),a="nr@original",s=Object.prototype.hasOwnProperty,c=!1;n.exports=function(t,n){function e(t,n,e,o){function nrWrapper(){var r,a,s,c;try{a=this,r=i(arguments),s="function"==typeof e?e(r,a):e||{}}catch(f){l([f,"",[r,a,o],s])}u(n+"start",[r,a,o],s);try{return c=t.apply(a,r)}catch(d){throw u(n+"err",[r,a,d],s),d}finally{u(n+"end",[r,a,c],s)}}return r(t)?t:(n||(n=""),nrWrapper[a]=t,d(t,nrWrapper),nrWrapper)}function f(t,n,o,i){o||(o="");var a,s,c,f="-"===o.charAt(0);for(c=0;c<n.length;c++)s=n[c],a=t[s],r(a)||(t[s]=e(a,f?s+o:o,i,s))}function u(e,r,o){if(!c||n){var i=c;c=!0;try{t.emit(e,r,o,n)}catch(a){l([a,e,r,o])}c=i}}function d(t,n){if(Object.defineProperty&&Object.keys)try{var e=Object.keys(t);return e.forEach(function(e){Object.defineProperty(n,e,{get:function(){return t[e]},set:function(n){return t[e]=n,n}})}),n}catch(r){l([r])}for(var o in t)s.call(t,o)&&(n[o]=t[o]);return n}function l(n){try{t.emit("internal-error",n)}catch(e){}}return t||(t=o),e.inPlace=f,e.flag=a,e}},{}],ee:[function(t,n,e){function r(){}function o(t){function n(t){return t&&t instanceof r?t:t?c(t,s,i):i()}function e(e,r,o,i){if(!l.aborted||i){t&&t(e,r,o);for(var a=n(o),s=h(e),c=s.length,f=0;f<c;f++)s[f].apply(a,r);var d=u[y[e]];return d&&d.push([g,e,r,a]),a}}function p(t,n){v[t]=h(t).concat(n)}function h(t){return v[t]||[]}function m(t){return d[t]=d[t]||o(e)}function w(t,n){f(t,function(t,e){n=n||"feature",y[e]=n,n in u||(u[n]=[])})}var v={},y={},g={on:p,emit:e,get:m,listeners:h,context:n,buffer:w,abort:a,aborted:!1};return g}function i(){return new r}function a(){(u.api||u.feature)&&(l.aborted=!0,u=l.backlog={})}var s="nr@context",c=t("gos"),f=t(15),u={},d={},l=n.exports=o();l.backlog=u},{}],gos:[function(t,n,e){function r(t,n,e){if(o.call(t,n))return t[n];var r=e();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(t,n,{value:r,writable:!0,enumerable:!1}),r}catch(i){}return t[n]=r,r}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],handle:[function(t,n,e){function r(t,n,e,r){o.buffer([t],r),o.emit(t,n,e)}var o=t("ee").get("handle");n.exports=r,r.ee=o},{}],id:[function(t,n,e){function r(t){var n=typeof t;return!t||"object"!==n&&"function"!==n?-1:t===window?0:a(t,i,function(){return o++})}var o=1,i="nr@id",a=t("gos");n.exports=r},{}],loader:[function(t,n,e){function r(){if(!x++){var t=b.info=NREUM.info,n=l.getElementsByTagName("script")[0];if(setTimeout(u.abort,3e4),!(t&&t.licenseKey&&t.applicationID&&n))return u.abort();f(y,function(n,e){t[n]||(t[n]=e)}),c("mark",["onload",a()+b.offset],null,"api");var e=l.createElement("script");e.src="https://"+t.agent,n.parentNode.insertBefore(e,n)}}function o(){"complete"===l.readyState&&i()}function i(){c("mark",["domContent",a()+b.offset],null,"api")}function a(){return E.exists&&performance.now?Math.round(performance.now()):(s=Math.max((new Date).getTime(),s))-b.offset}var s=(new Date).getTime(),c=t("handle"),f=t(15),u=t("ee"),d=window,l=d.document,p="addEventListener",h="attachEvent",m=d.XMLHttpRequest,w=m&&m.prototype;NREUM.o={ST:setTimeout,SI:d.setImmediate,CT:clearTimeout,XHR:m,REQ:d.Request,EV:d.Event,PR:d.Promise,MO:d.MutationObserver};var v=""+location,y={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-1071.min.js"},g=m&&w&&w[p]&&!/CriOS/.test(navigator.userAgent),b=n.exports={offset:s,now:a,origin:v,features:{},xhrWrappable:g};t(12),l[p]?(l[p]("DOMContentLoaded",i,!1),d[p]("load",r,!1)):(l[h]("onreadystatechange",o),d[h]("onload",r)),c("mark",["firstbyte",s],null,"api");var x=0,E=t(17)},{}]},{},["loader",2,10,4,3]);</script>
	<meta content="543757942384158" property="fb:app_id">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="api.hackster.io" id="api-uri" name="api-uri">
	<meta content="projects#show" name="pageType">
	<meta content="Battery powered ESP8266 based Alarm Cube warns when there is no water pressure in the main water pipe, and neither electricity!. Find this and other hardware projects on Hackster.io." name="description">
	<meta content="article" property="og:type">
	<meta content="Alarm Cube for Greenhouse" property="og:headline">
	<meta content="Alarm Cube for Greenhouse" property="og:title">
	<meta content="Battery powered ESP8266 based Alarm Cube warns when there is no water pressure in the main water pipe, and neither electricity! By Istvan Sipka." property="og:description">
	<meta content="https://hackster.imgix.net/uploads/attachments/443818/_fLIXywx9WG.2Q%3D%3D?auto=compress%2Cformat&amp;w=600&amp;h=450&amp;fit=min" property="og:image">
	<meta content="600" property="og:image:width">
	<meta content="450" property="og:image:height">
	<meta content="https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8" property="og:url">
	<meta content="summary_large_image" property="twitter:card">
	<meta content="Alarm Cube for Greenhouse" property="twitter:title">
	<meta content="Battery powered ESP8266 based Alarm Cube warns when there is no water pressure in the main water pipe, and neither electricity!" property="twitter:description">
	<meta content="600" property="twitter:player:width">
	<meta content="450" property="twitter:player:height">
	<meta content="https://hackster.imgix.net/uploads/attachments/443818/_fLIXywx9WG.2Q%3D%3D?auto=compress%2Cformat&amp;w=600&amp;h=450&amp;fit=min" property="twitter:image">
	<!-- <link href="https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8" rel="canonical"> -->
	<meta content="alarm,battery,internet of things,led,security" name="keywords">
	<meta content="@hacksterio" property="twitter:site">
	<meta content="hackster.io" property="twitter:domain">
	<meta content="Hackster.io" property="og:site_name">
	<meta name="csrf-param" content="authenticity_token">
	<meta name="csrf-token" content="I8/cj8Bf+xt27O1MJmlicZJbkyS+U0h6keeWKUsH9QpjEZTGtldvnfikyaMBxDJST5dTaWq4VsxlahdqZbJaNg==">
	<link rel="stylesheet" media="all" href="<?php bloginfo('template_url'); ?>/style/application-8d64c6b20adc33d6124bb5e90754e60c9f8a92debea1c43d47066a21beebb1da.css">
	<link href="<?php bloginfo('template_url'); ?>/style/client_bundle.0be82cc9f726b2aa6615.css" rel="stylesheet">
	<meta content="#1cacf7" name="msapplication-TileColor">
	<meta content="https://www.hackster.io/assets/favicons/mstile-144x144-ea13b97589a22e74f5c44fe59a9dd083501c21aa514c4c9d742135ed8a818645.png?v=zXX3Bm3lo3" name="msapplication-TileImage">
	<meta content="#1cacf7" name="theme-color">
	<meta content="Hackster" name="apple-mobile-web-app-title">
	<meta content="Hackster" name="application-name">
	<script>gglTagMngrDataLayer = [{
	  'loggedIn': "true",
	  'pageType': "projects#show",
	  'virtualPageview': "false"
	}];</script>
	<script>gglTagMngrDataLayer.push({
	  'entityId': "82007",
	  'entityType': "Project",
	});</script>
	<script>gglTagMngrDataLayer.push({
	  'aaBetaTester': "false", // TODO: is it okay that this line is here for whitelabels?
	  'intercomUserHash': "6bc156e5d2d552041a03e3bf34fe52154a28437532124569e9caef4f84ab3e8e",
	  'userCreatedAt': "1519784639",
	  'userEmail': "dongxinyu_it@163.com",
	  'userName': "hackster",
	  'userId': "421784"
	});</script>
	<!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	  })(window,document,'script','gglTagMngrDataLayer', 'GTM-KR3BZMN');</script> -->
	<script>window.HAnalyticsGlobalData = window.HAnalyticsGlobalData || {};
	window.HAnalyticsGlobalData.whitelabel = 'hackster';</script>
	<script>window.HAnalyticsGlobalData.eventsJson = '[]'</script>
	<script>window.HAnalyticsGlobalData.entity_id = 82007;
	window.HAnalyticsGlobalData.entity_type = "Project";</script>
	<script>window.HAnalyticsGlobalData.user_id = 421784;</script>
	<script async="" src="<?php bloginfo('template_url'); ?>/style/analytics(1).js"></script>
	<!-- <script>//<![CDATA[
	    window.webpackManifest = {"0":"vendor.3ac88e7d0490ec1957db.js","1":"client_bundle.0be82cc9f726b2aa6615.js"}//]]>
	</script> -->
    <!-- <script type="application/ld+json">{  "@context": "http://www.schema.org",  "@type":"LocalBusiness",  "name": "Hackster.io",  "url": "https://www.hackster.io/",  "image": "https://www.hackster.io/assets/hackster_logo_blue-03ea84833aa0dcf8f33be76d265d37340c7cd1ceb77a74429deb631ef0261e8f.png",  "address": {    "@type": "PostalAddress",    "streetAddress": "531 Howard street, suite 200",    "addressLocality": "San Francisco",    "addressRegion": "CA",    "postalCode": "94105"  }}</script> -->
    <style type="text/css">@keyframes resizeanim { from { opacity: 0; } to { opacity: 0; } } .resize-triggers { animation: 1ms resizeanim; visibility: hidden; opacity: 0; } .resize-triggers, .resize-triggers > div, .contract-trigger:before { content: " "; display: block; position: absolute; top: 0; left: 0; height: 100%; width: 100%; overflow: hidden; } .resize-triggers > div { background: #eee; overflow: auto; } .contract-trigger:before { width: 200%; height: 200%; }</style>
    <script async="" src="<?php bloginfo('template_url'); ?>/style/modules-fa7b914657f32d32df01f26b19e8f066.js"></script>
    <!-- <style type="text/css">iframe#_hjRemoteVarsFrame {display: none !important; width: 1px !important; height: 1px !important; opacity: 0 !important; pointer-events: none !important;}</style> -->
<!-- </head> -->
<body data-user-signed-in="421784">
	<noscript>&lt;img height="0" width="0" style="display:none;visibility:hidden" src="/images/debug.gif" alt="Debug" /&gt;&lt;iframe height="0" src="https://www.googletagmanager.com/ns.html?id=GTM-KR3BZMN" style="display:none;visibility:hidden" width="0"&gt;&lt;/iframe&gt;</noscript>
	<div id="outer-wrapper">
		<div id="main">
			<a style="display:none" class="project-switcher previous istooltip" data-container="body" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;Next arrow&quot;,&quot;href&quot;:&quot;/projects/fab1c8/next?dir=prev\u0026ref=featured&quot;,&quot;type&quot;:&quot;project-arrows&quot;,&quot;location&quot;:&quot;right&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}" data-placement="right" href="https://www.hackster.io/projects/fab1c8/next?dir=prev&amp;ref=featured" rel="nofollow tooltip" title="" data-original-title="Previous project">
				<div class="inner"><i class="fa fa-chevron-left"></i></div>
			</a>
			<!-- 下个项目 -->
			<a style="display:none" class="project-switcher next istooltip" data-container="body" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;Previous arrow&quot;,&quot;href&quot;:&quot;/projects/fab1c8/next?dir=next\u0026ref=featured&quot;,&quot;type&quot;:&quot;project-arrows&quot;,&quot;location&quot;:&quot;left&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}" data-placement="left" href="https://www.hackster.io/projects/fab1c8/next?dir=next&amp;ref=featured" rel="nofollow tooltip" title="" data-original-title="Next project">
				<div class="inner"><i class="fa fa-chevron-right"></i></div>
			</a>
			<div class="project-page project-page-single-column project-82007" id="content" itemscope="" itemtype="http://schema.org/Article" style="position: relative;">
				<div class="popup-overlay modal-popup" id="embed-popup">
					<div class="popup-overlay-bg"></div>
					<div class="popup-overlay-outer">
						<div class="popup-overlay-inner">
							<button class="close unselectable" data-effect="fade" data-target="#embed-popup">×</button>
							<h3>Embed the widget on your own site</h3>
							<div id="project-embed">
								<p>Add the following snippet to your HTML:<textarea class="embed-code" onclick="this.select();" type="text">&lt;iframe frameborder='0' height='327.5' scrolling='no' src='https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8/embed' width='350'&gt;&lt;/iframe&gt;</textarea></p>
								<div class="project-embed-thumb">
									<div class="project-card project-82007">
										<a class="card-image project-link-with-ref" href="https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8" target="_blank" title="Alarm Cube for Greenhouse">
											<div class="img-container">
												<img alt="Alarm Cube for Greenhouse" class="cover-img img-loader loaded" src="<?php bloginfo('template_url'); ?>/style/_fLIXywx9WG.2Q==">
												<noscript>&lt;img alt="Alarm Cube for Greenhouse" class="cover-img loaded" src="https://hackster.imgix.net/uploads/attachments/443818/_fLIXywx9WG.2Q%3D%3D?auto=compress%2Cformat&amp;amp;w=400&amp;amp;h=300&amp;amp;fit=min" /&gt;</noscript>
											</div>
											<div class="card-image-overlay">
												<p>Battery powered ESP8266 based Alarm Cube warns when there is no water pressure in the main water pipe, and neither electricity!</p>
												<p>Read up about this project on <img alt="Hackster.io" title="Hackster is a community dedicated to learning hardware, from beginner to pro." class="hackster-logo" src="<?php bloginfo('template_url'); ?>/style/hackster_logo_text-d59d06ec8fa548633e7014c258795d6e0fb21484d43aebe3d3225e9fdc2ec086.png"></p>
											</div>
										</a>
										<div class="card-body">
											<div class="project-content-type"><span>Full instructions</span></div>
											<h4>
												<a class="project-link-with-ref" title="Alarm Cube for Greenhouse" target="_blank" href="https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8">Alarm Cube for Greenhouse</a>
											</h4>
											<div class="spacer"></div>
											<div class="authors">
												<a title="Istvan Sipka" target="_blank" href="https://www.hackster.io/Pistikukac">Istvan Sipka</a>
											</div>
										</div>
										<div class="card-bottom">
											<div class="stats">
												<span class="stat">
													<img class="iconRespect" src="<?php bloginfo('template_url'); ?>/style/respect-c7d31f20414d4d5c8555e5766e79092066fbd1b78ab602040fb2dcec3a1b4299.svg" alt="Respect">
													<span>6</span> 
												</span>
												<span class="stat">
													<img class="iconView" src="<?php bloginfo('template_url'); ?>/style/view-e2994c8154deed478e6d46a6fbd2c3e91dd9746f192ba79456e878da310fd378.svg" alt="View">
													<span>251</span> 
												</span>
											</div>
											<div class="project-difficulty">
												<img class="iconDifficulty" src="<?php bloginfo('template_url'); ?>/style/intermediate-4e87b37443d2fe116970a665d29a07897a09494bffab8eef67e01e42e58c69f2.svg" alt="Intermediate">
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
				<section class="section-teaser">
					<div class="container-desktop container">
						<meta content="Alarm Cube for Greenhouse" itemprop="headline">
						<meta content="alarm,battery,internet of things,led,security" itemprop="keywords">
						<div id="home">
							<div class="project-title">
								<h1 itemprop="name"><?php echo $pro['post_title']; ?></h1>
								<ul class="list-with-dividers project-credits">
									<?php 
									if($pro['post_author']){
										$auther = get_user_meta($pro['post_author'],'nickname',true);
									?>
									<li style='display:none'>发布于
										<a href="JavaScript:void(0)"><?php ?>平台</a>
									</li>
									<li itemprop="author" itemscope="" itemtype="">发布者　<a itemprop="name" href="<?php echo home_url().'/user-2/'.$auther; ?>"><?php echo $auther?></a>
									</li>
									<?php } ?>
								</ul>
							</div>
							<div class="row project-teaser">
								<div class="col-md-7 col-md-offset-0-5 left-column">
									<div class="project-cover-image" itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject">
										<img alt="项目展示图片" src="<?php echo home_url().'/wp-content/'.$pro_meta['pro_pic'] ?>" title='项目图片'>
									</div>
								</div>
								<div class="col-md-4 right-column">
									<div class="container-mobile">
										<section class="section-thumbs">
											<h4>项目简述</h4>
											<!-- 项目摘要 -->
											<p class="project-one-liner" itemprop="description"><?php if($pro['post_excerpt']) echo $pro['post_excerpt']; ?></p>
											<ul class="list-inline tags" style='display:none'>
												<li class="tag-link">
													<i class="fa fa-tag"></i><span><a rel="tag" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;alarm&quot;,&quot;href&quot;:&quot;/projects/tags/alarm&quot;,&quot;type&quot;:&quot;tag&quot;,&quot;location&quot;:&quot;header&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}" href="https://www.hackster.io/projects/tags/alarm"><?php if($res_pro[0]['type']) echo $res_pro[0]['type']; ?></a></span>
												</li>
											</ul>
										</section>
										<section class="section-thumbs">
											<h4>项目信息</h4>
											<div class="info-table">
												<div class="info-row">
													<div class="info-label">难度</div>
													<div class="info">
														<a class="project-difficulty text-warning" href="#"><?php echo ''; ?></a>
													</div>
												</div>
												<div class="info-row">
													<div class="info-label">项目持续时间</div>
													<div class="info"><?php if($pro_meta['duration']) echo $pro_meta['duration'].'　小时'; ?></div>
												</div>
												<div class="info-row">
													<meta content="2018-03-04T15:07:09Z" itemprop="dateModified">
													<div class="info-label">发布时间</div>
													<div class="info" style="font-size:14px;" content="2018-03-03T23:32:09Z" itemprop="datePublished"><?php if($pro['post_date']) echo $pro['post_date']; ?>
													</div>
												</div>
												<div class="info-row">
													<meta content="2018-03-04T15:07:09Z" itemprop="dateModified">
													<div class="info-label">最新修改时间</div>
													<div class="info" content="2018-03-03T23:32:09Z" itemprop="datePublished"><?php if($pro['post_modified']) echo $pro['post_modified']; ?>
													</div>
												</div>
												<div class="info-row">
													<div class="info-label">执照</div>
													<div class="info">
														<a href="javascript:void(0)" itemprop="license" target="_blank">
															<?php if($pro)  ?>
														</a>
													</div>
												</div>
											</div>
										</section>
										<section class="section-thumbs" id="respects-section">
											<ul class="list-inline text-muted small project-stats-inline">
												<li class="impression-stats istooltip" itemprop="interactionStatistic" itemscope="" itemtype="" data-original-title="<?php echo $like_title; ?>">
													<button>
														<i class="fa fa-thumbs-o-up">
															<span class="stat-figure" id = "like_btn" ><?php ;?></span>
														</i>
													</button>
													
												</li>
												<li style="display:none">
													<link href="#" itemprop="">
													<i class="fa fa-eye">浏览次数</i>
													<span class="stat-figure" itemprop="userInteractionCount"><?php ; ?></span>
												</li>
												<li class="respect-stats istooltip" itemprop="interactionStatistic" itemscope="" itemtype="http://schema.org/InteractionCounter" onclick="" title="" data-original-title="组成员">
													<link href="#" itemprop="">
													<i class="fa ">组成员</i>
													<span class="stat-figure" itemprop="userInteractionCount"><?php echo count($pro_meta['pro_users']).'人'; ?></span>
												</li>
											</ul>
											<div class="respecting-faces" onclick="">
												<?php 
													foreach($pro_meta['pro_users'] as $value){
														$team_user = explode('#-user--do-#',$value);
														$team_user_pic = get_user_meta($team_user[0],'profile_photo',true);
													// var_dump($team_user_pic);
														if($team_user_pic == ''){
															$team_user_pic = home_url()."/wp-content/uploads/ultimatemember/default/default.png";
														}else{
															$team_user_pic = home_url()."/wp-content/uploads/ultimatemember/".$team_user[0].'/'.$team_user_pic;
														}
												 ?>
														<div class="user-img">
															<img alt="<?php echo $team_user[0] ?>" title="<?php echo '贡献 : '.$team_user[1] ?>" class="img-circle img-loader loaded" src="<?php echo $team_user_pic ?>">
															<noscript></noscript>
														</div>
												<?php } ?>
											</div>
										</section>
      							</div>
      						</div>
      					</div>
      				</div>
      			</div>
      		</section>


  				<div id="team_userlist" class="transitions__wrapper__3QPgQ styles__wrapper__375TY  styles__fullScreen__1XOXA" style="max-width: 100%;display:none;" >
   <button class="dismiss_button__absolute__3E-bN dismiss_button__fixed__Ph4uA styles__dismiss__29p3f " type="button">
    <svg class="hckui__typography__icon hckui__typography__icon16 " viewbox="0 0 16 16">
     <path d="M8 7.394l5.143-5.143.606.606L8.606 8l5.143 5.143-.606.606L8 8.606 2.857 13.75l-.606-.606L7.394 8 2.25 2.857l.606-.606L8 7.394z"></path>
    </svg></button>
   <div class="">
    <div>
     <div>
      <h3 class="respecting_users_list__title__3qVO7"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php if($pro['post_title']) echo $pro['post_title'];  ?> -- 团队成员</font></font></h3>
      <div class="list__dialogContainer__wHTjc">
       <div class="list__list__1PZvx">
       	<?php 
			foreach($pro_meta['pro_users'] as $value){
				$team_user = explode('#-user--do-#',$value);

				$team_user_pic = get_user_meta($team_user[0],'profile_photo',true);//头像
				if($team_user_pic == ''){
					$team_user_pic = home_url()."/wp-content/uploads/ultimatemember/default/default.png";
				}else{
					$team_user_pic = home_url()."/wp-content/uploads/ultimatemember/".$team_user[0].'/'.$team_user_pic;
				}
				$team_user_name = get_user_meta($team_user[0],'nickname',true);				
				$team_user_description = get_user_meta($team_user[0],'description',true);
       	 ?>
        <div class="list__card__3oqoQ">
         <div class="list__cardInner__2gFoP">
          <div class="list__textSection__23ANL">
           <a class="list__icon__FVl9r list__roundIcon__2IRMR" href="#">
            <div class=" lazy_image__root__3J0Tw" style="height: 36px; width: 36px;">
             <img alt="" class="lazy_image__image__hVuzg lazy_image__fadeIn__1kICV" src="<?php echo $team_user_pic ?>" />
            </div></a>
           <div>
            <a class="list__title__3G2mG" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $team_user_name;?></font></font></a>
            <div class="list__subtitle__1mtOK">
             <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $team_user_description ?></font></font>
            </div>
            <div class="list__subtitle__1mtOK" style="display:none">
             <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php  ?></font></font>
            </div>
            <div class="list__info__2Ugeq">
             <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1个项目•1个追随者</font></font>
            </div>
           </div>
          </div>
          <div class="list__childrenSection__YH2US" style="display:none">
           <div>
            <button class="buttons__button__lYBnk
          community_card__joinBtn__1BZuc buttons__join__2CObT buttons__joinCommonStyles__1PchI buttons__button__lYBnk" type="button"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">跟随</font></font></button>
           </div>
          </div>
         </div>
        </div>
       	<?php } ?>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div></div>
  </div>

				<script type="text/javascript">
	$(".respecting-faces").click(function(){
		// $("#team_userlist").css('display','block');
		$("#team_userlist").show("slow",'linear');
		var scroll_num = $("#team_userlist").offset().top;
	    // window.scrollTo(scroll_num);
	    window.scrollTo(0,scroll_num);
	});
	$("#team_userlist button").click(function(){
		// $("#team_userlist").css('display','none');
		$("#team_userlist").hide("slow");
	});
</script>

      		<section class="section-description" itemprop="articleBody">
      			<div class="container">
      				<div class="row">
      					<div class="col-md-7 col-md-offset-0-5 left-column container-mobile">
      						<section class="section-container" id="things">
      							<h2 class="section-title"><a class="title-anchor" href="javascript:void(0)"><i class="fa fa-link"></i></a><span class="title title-toggle">项目中使用的 硬/软件和工具</span>
      							</h2>
      							<div class="section-content">
      								<table class="sortable-table table table-hover fields-container parts-table">
	      								<tbody>
	      									<tr class="title">
	      										<td colspan="6"><strong>项目中的硬件:</strong></td>
	      									</tr>
	      									<?php 
	      									if(empty($res_hardthing)){
	      										echo "<tr class='fields part-row'><td>该项目组没有分享他们的硬件信息</td></tr>";
	      									}else{
		      									foreach($res_hardthing as $value){ ?>
		      									<tr class="fields part-row" id="part-9592">
		      										<td class="part-img"><img src="<?php bloginfo("url")?>/wp-content/uploads/<?php if($value['path']) echo $value['path']; ?>" alt="Esp01"></td>
		      										<td>
		      											<table style="width:100%">
		      												<tbody>
		      													<tr>
		      														<td><a data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;Everything ESP ESP8266 ESP-01&quot;,&quot;href&quot;:&quot;/esp/products/esp8266-esp-01&quot;,&quot;type&quot;:&quot;part&quot;,&quot;location&quot;:&quot;things&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}" href="javascript:void(0)">
		      															<?php 
		      																if($value['name']) echo $value['name'];
		      															?>
		      														</a></td>
		      													</tr>
		      													<tr>
		      														<td style="color: #888;font-size:75%;"></td>
		      													</tr>
		      												</tbody>
		      											</table>
		      										</td>
		      										<td style="width:30px;text-align:center;vertical-align:middle">×</td>
		      										<td style="width:10%;min-width:20px;text-align:center;vertical-align:middle">
														<?php if($value['num']) echo $value['num']; else echo '1'; ?>
		      										</td>
		      										<td style="text-align:right;width:78px">
		      											<div class="" style="height:80%;color:#333;background:url('<?php //echo home_url() ?>')">
		      												<a target="_blank" style="height:80%;color:#333;background:url('<?php //echo home_url() ?>')" rel="nofollow noopener" class="btn btn-sm btn-default" title="点击跳转购买" href="<?php if($value['shopurl']) echo $value['shopurl'] ?>" >
		      													<!-- <div class="fa"></div> -->
		      												</a>
		      											</div>
		      										</td>
		      									</tr>
	      									<?php }} ?>
	      									
				      					</tbody>
				      				</table>
      								<table class="sortable-table table table-hover fields-container parts-table">
	      								<tbody>
	      									<tr class="title">
	      										<td colspan="6"><strong>项目中的软件:</strong></td>
	      									</tr>
	      									<?php 
	      									if(empty($res_softthing)){
	      										echo "<tr class='fields part-row'><td>该项目组没有分享他们的软件信息</td></tr>";
	      									}else{
		      									foreach($res_softthing as $value){ ?>
		      									<tr class="fields part-row" id="part-9592">
		      										<td class="part-img"><img src="<?php bloginfo("url")?>/wp-content/uploads/<?php if($value['path']) echo $value['path']; ?>" alt="Esp01"></td>
		      										<td>
		      											<table style="width:100%">
		      												<tbody>
		      													<tr>
		      														<td><a data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;Everything ESP ESP8266 ESP-01&quot;,&quot;href&quot;:&quot;/esp/products/esp8266-esp-01&quot;,&quot;type&quot;:&quot;part&quot;,&quot;location&quot;:&quot;things&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}" href="javascript:void(0)">
		      															<?php 
		      																if($value['name']) echo $value['name'];
		      															?>
		      														</a></td>
		      													</tr>
		      													<tr>
		      														<td style="color: #888;font-size:75%;"></td>
		      													</tr>
		      												</tbody>
		      											</table>
		      										</td>
		      										<td style="width:30px;text-align:center;vertical-align:middle"> </td>
		      										<td style="width:10%;min-width:20px;text-align:center;vertical-align:middle">
														 
		      										</td>
		      										<td style="text-align:right;width:78px">
		      											<div class="btn-group">
		      												
		      											</div>
		      										</td>
		      									</tr>
	      									<?php }} ?>
	      									
				      					</tbody>
				      				</table>
				      			</div>
	      					</section>
	      					<!-- ************************************************** -->
								<?php 
									//正则进行字符串截取,将视频的关键词取出.
									$pattern = "/id_(.*?).html/U";//拼接正则
									preg_match($pattern, $pro_meta['show_url'], $str);
									$url = "http://player.youku.com/embed/".$str[1];//拼接视频窗口地址
								 ?>	
				      		<section class="section-container collapsed" id="about-project">
		      					<h2 class="section-title"><a class="title-anchor" href="javascript:void(0)"><i class="fa fa-link"></i></a><span class="title title-toggle">项目演示</span></h2>
		      					<?php if($str){ ?>
		      					<div class="embed-frame"><div class="figure youtube"><div class="figcaption embed-figcaption" data-contenteditable="true" data-default-text="Type in a caption" data-disable-toolbar="true"></div><div class="embed widescreen" contenteditable="false"><iframe width="100%" height="100%" src="<?php echo $url; ?>" frameborder="0" allowfullscreen=""></iframe></div></div></div>
		      					<?php }else{ ?>
		      					<h4 class="">该团队没有上传他们的演示视频</h4>		      					
		      					<?php } ?>
		      				</section>
	      					<!-- ************************************************** -->
				      		<section class="section-container collapsed" id="info">
				      			<h2 class="section-title"><a class="title-anchor" href="javascript:void(0)"><i class="fa fa-link"></i></a><span class="title title-toggle">项目过程</span></h2>
				      			<!-- 项目详情 -->
				      			<?php echo $pro['post_content'] ?>
				      			
				      		<div class="read-more" style="display:none">
				      			<a class="btn btn-primary" href="javascript:void(0)">Read more</a>
				      		</div>
	      					</section>
					      	<section class="section-container" id="schematics">
					      		<a name="#schematics"></a>
					      		<h2 class="section-title"><a class="title-anchor" href="javascript:void(0)"><i class="fa fa-link"></i></a><span class="title title-toggle">原理图 </span></h2>
					      		<div class="section-content">
					      			<div class="repository">
					      				<div class="button-content-container">
					      					<div class="button-content">
						      					<?php
						      						if(isset($pro_meta['diagrams_file'])){
						      					?>
						      						<h5>项目原理图</h5>
						      					<?php }else{ ?>
						      						<h4>这个团队没有分享他们的项目原理图</h4>
						      					<?php } ?>
					      						<div class="buttons" style="display:none">
					      							<a class="btn btn-primary btn-sm" href="<?php echo home_url().'/wp-content/'?>">下载 </a>
					      						</div>
					      					</div>
					      				</div>
					      				<?php
				      						if(isset($pro_meta['diagrams_file'])){
				      					?>
						      				<div class="embed original">
						      					<img src="<?php echo home_url().'/wp-content/'.$pro_meta['diagrams_file']?>" alt="">
						      				</div>
						      			<?php } ?>
					      			</div>
					      		</div>
					      	</section>
					      	<section class="section-container" id="cad">
					      		<a name="#cad"></a>
					      		<h2 class="section-title"><a class="title-anchor" href="javascript:void(0)"><i class="fa fa-link"></i></a><span class="title title-toggle">CAD图 </span></h2>
					      		<div class="section-content">
					      			<div class="repository">
					      				<div class="button-content-container">
					      					<div class="button-content">
					      					<?php
					      						if(isset($pro_meta['cad_file'])){
					      					?>
					      						<h5>项目CAD图</h5>
					      					<?php }else{ ?>
					      						<h4>这个团队没有分享他们的项目CAD图</h4>
					      					<?php } ?>
					      						<div class="buttons" style="display:none">
					      							<a class="btn btn-primary btn-sm" href="<?php bloginfo('url');echo '/wp-content/'.$v['path']?>">下载 </a>
					      						</div>
					      					</div>
					      				</div>
					      				<?php
				      						if(isset($pro_meta['cad_file'])){
				      					?>
						      				<div class="embed original">
						      					<img src="<?php echo home_url().'/wp-content/'.$pro_meta['cad_file']?>" alt="">
						      				</div>
						      			<?php } ?>
					      			</div>
					      		</div>
					      	</section>
					      	<section class="section-container" id="code">
					      		<h2 class="section-title">
					      			<a class="title-anchor" href="javascript:void(0)"><i class="fa fa-link"></i></a><span class="title title-toggle">项目关键代码 </span>
					      		</h2>
					      		<!-- ********************************************* -->
					      		<div class="section-content">
					      			<div class="repository">
					      				<div class="button-content-container">
					      					<div class="button-content">
					      					<?php
				      							if(isset($pro_meta['code_file'])){
				      						?>
						      						<h5>项目代码</h5>
						      					<?php }else{ ?>
						      						<h4>这个团队没有分享他们的项目代码</h4>
						      					<?php } ?>
					      						<div class="buttons" style="display:none">
					      							<a class="btn btn-primary btn-sm" href="<?php bloginfo('url');echo '/wp-content/'.$v['path']?>">下载 </a>
					      						</div>
					      					</div>
					      				</div>
					      				<?php
				      						if(isset($pro_meta['code_file'])){
				      					?>
						      				<div class="embed original">
						      					<img src="<?php echo home_url().'/wp-content/'.$pro_meta['code_file']?>" alt="">
						      				</div>
						      			<?php } ?>
					      			</div>
					      		</div>
					      		<!-- ********************************************* -->
					      		
								<!-- ******************************************************************************** -->
								</section>
							<hr>
							<section class="section-container" id="comments">
								<h2 class="section-title"><a class="title-anchor" href="javascript:void(0)"><i class="fa fa-link"></i></a>
									<span class="title title-toggle">评论 </span>
								</h2>
								
							</section>
						</div>
						<!-- 侧边动态锚点 -->
						<div class="col-md-4 right-column">
						<section class="section-thumbs hidden-xs hidden-sm">
							<div class="affixable" data-top="20" id="project-side-nav" style="top:20px">
								<div class="section-container" id="scroll-nav">
									<ul class="nav">
										<li class="">
											<a class="smooth-scroll" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;Alarm Cube for Greenhouse&quot;,&quot;href&quot;:&quot;#home&quot;,&quot;type&quot;:&quot;toc&quot;,&quot;location&quot;:&quot;toc&quot;}}" data-offset="-40" href="#home">
												<?php if($pro['post_title']) echo $pro['post_title'] ?>
											</a>
										</li>
										<li class="">
											<a class="smooth-scroll" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;Things&quot;,&quot;href&quot;:&quot;#things&quot;,&quot;type&quot;:&quot;toc&quot;,&quot;location&quot;:&quot;toc&quot;}}" href="#things">项目工具及设备</a>
										</li>
										<li class="">
											<a class="smooth-scroll" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;Story&quot;,&quot;href&quot;:&quot;#about-project&quot;,&quot;type&quot;:&quot;toc&quot;,&quot;location&quot;:&quot;toc&quot;}}" href="#about-project">项目演示</a>
										</li>
										<li class="">
											<a class="smooth-scroll" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;Things&quot;,&quot;href&quot;:&quot;#things&quot;,&quot;type&quot;:&quot;toc&quot;,&quot;location&quot;:&quot;toc&quot;}}" href="#info">项目过程</a>
										</li>
										<li class="">
											<!-- <a class="smooth-scroll" href="#schematics">原理图</a> -->
											<a class="smooth-scroll" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;Schematics&quot;,&quot;href&quot;:&quot;#schematics&quot;,&quot;type&quot;:&quot;toc&quot;,&quot;location&quot;:&quot;toc&quot;}}" href="#schematics">原理图</a>
										</li>
										<li>
											<a class="smooth-scroll" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;cad&quot;,&quot;href&quot;:&quot;#cad&quot;,&quot;type&quot;:&quot;toc&quot;,&quot;location&quot;:&quot;toc&quot;}}" href="#cad">CAD图</a>
										</li>
										<li>
											<a class="smooth-scroll" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;Code&quot;,&quot;href&quot;:&quot;#code&quot;,&quot;type&quot;:&quot;toc&quot;,&quot;location&quot;:&quot;toc&quot;}}" href="#code">代码</a>
										</li>
										<li style="display:none">
											<a class="smooth-scroll" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;Credits&quot;,&quot;href&quot;:&quot;#team&quot;,&quot;type&quot;:&quot;toc&quot;,&quot;location&quot;:&quot;toc&quot;}}" href="#team">Credits</a>
										</li>
										<li>
											<a class="smooth-scroll" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;Comments&quot;,&quot;href&quot;:&quot;#comments&quot;,&quot;type&quot;:&quot;toc&quot;,&quot;location&quot;:&quot;toc&quot;}}" href="#comments">评论<span class="nav-count">(0)</span></a>
										</li>
										<li style="display:none">
											<a class="smooth-scroll" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;Similar projects&quot;,&quot;href&quot;:&quot;#other-projects&quot;,&quot;type&quot;:&quot;toc&quot;,&quot;location&quot;:&quot;toc&quot;}}" href="#other-projects">类似项目</a>
										</li>
									</ul>
								</div>
							</div>
						</section>
					</div>
					</div>
				</div>
			</section>
				<section id="other-projects" style="display:none;">
					<div data-react-class="SimilarProjectsList" data-react-props="{&quot;project&quot;:{&quot;hid&quot;:&quot;fab1c8&quot;}}">
						<div class=""></div>
					</div>
				</section>
				<div class="resize-triggers">
					<div class="expand-trigger">
						<div style="width: 1350px; height: 9313px;"></div>
					</div>
					<div class="contract-trigger"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="hide-on-desktop" id="mobile-nav-overlay">
		<div class="fa fa-times" id="mobile-nav-overlay-close"></div>
	</div>
	<div class="hide-on-desktop" id="mobile-navigation">
		<a class="mo-nav-link" title="Projects" href="javascript:void(0)">Projects</a>
		<a class="mo-nav-link" title="Platforms" href="javascript:void(0)">Platforms</a>
		<a class="mo-nav-link" title="Topics" href="javascript:void(0)">Topics</a>
		<a class="mo-nav-link" title="Contests" href="javascript:void(0)">Contests</a>
		<a class="mo-nav-link" title="Live" href="javascript:void(0)">Live</a>
		<a class="mo-nav-link" title="Live" href="javascript:void(0)">
			<span>Apps</span>
			<span class="label-beta">Beta</span>
		</a>
		<a class="mo-nav-link" title="Blog" href="javascript:void(0)">Blog</a>
		<a class="mo-nav-link" href="javascript:void(0)">
			<i class="fa fa-plus"></i>
			<span>Add project</span>
		</a>
		<a class="mo-nav-link" href="javascript:void(0)">Profile and projects</a>
		<a class="mo-nav-link" href="javascript:void(0)">Messages</a>
		<a class="mo-nav-link" href="javascript:void(0)">Account settings</a>
		<a class="mo-nav-link" href="javascript:void(0)">Notifications</a>
		<a class="mo-nav-link" rel="nofollow" data-method="delete" href="javascript:void(0)">Log out</a>
	</div>
	<!-- 侧边栏滚动 -->
	<script src="<?php bloginfo('template_url'); ?>/style/client_bundle.0be82cc9f726b2aa6615.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/style/application-9cb8da0a6926bf65dd02df18910aa535173d961c3a5ee9c62b51e27afe46203e.js"></script>
	<div data-react-class="GlobalDialog" data-react-props="{}">
		<div></div>
	</div>
	<div data-react-class="GlobalPopover" data-react-props="{}">
		<div></div>
	</div>
	<script>$('.project-feedback-form').show();</script>

	<iframe name="_hjRemoteVarsFrame" title="_hjRemoteVarsFrame" id="_hjRemoteVarsFrame" src="<?php bloginfo('template_url'); ?>/style/rcj-99d43ead6bdf30da8ed5ffcb4f17100c.html" style="display: none !important; width: 1px !important; height: 1px !important; opacity: 0 !important; pointer-events: none !important;">
	</iframe>
	<div id="ads"></div>
	<!-- ************************************************************** -->
	<hr>
	<div class="clearfix"></div>
</body>

<script type="text/javascript">
	//评论标签
	var comment_tag = $("#comment-forclone");
	comment_tag.css('display','none');
	//回复标签
	var reply_tag = $("#reply-forclone");
	reply_tag.css('display','none');
	//初始化回复ID
	var reply_id = '';
	var comid = '';
	var uid = $("input[name='islogin']").val();//当前登录用户id
	var uname = $("input[name='islogin']").attr('class');//当前登录用户用户名
	var info = '';//回复信息
	var touid = '';
	var touname = '';
	//弹出回复回复信息的回复框
	$('.open_resbox').click(function(){
		// 判断登录
		var is_login = $("input[name='islogin']").size();
		if(is_login == 0){
			alert("请先登录后回复");
            // location.href = "<?php //echo home_url()?>/login-2/";
			return false;
		}
		reply_id = $(this).parents("div[class='replys']").find("input").attr('name');//给回复ID赋值
		comid = $(this).parents("div[class='comment_all']").find("input").attr('name');//给评论ID赋值
		touid = $(this).parents("ul").prev("div[class='reply-body']").find("input").attr('class');
		touname = $(this).parents("ul").prev("div[class='reply-body']").find("input").val();
		if($(this).find('font').html() == '回复'){
			homeing();
			$(this).find('font').html('取消回复');
			$(this).parents("div[class='comment_all']").find("div[class='reply-box']").css('display','block');
			//取刚刚出现的回复框位置
			// var scroll_height = $(this).parents("div[class='comment_all']").find("div[class='reply-box']").offset({top: '3751.75', left: '15'});
			// console.log(scroll_height);
		}else if($(this).find('font').html() == '取消回复'){
			$(this).find('font').html('回复');
			$(this).parents("div[class='comment_all']").find("div[class='reply-box']").css('display','none');
		}
		// alert(reply_id);
	});
	//弹出正常的回复框
	$('.pop_resbox').click(function(){
		// 判断登录
		var is_login = $("input[name='islogin']").size();
		if(is_login == 0){
			alert("请先登录后回复");
			return false;
		}
		comid = $(this).parents("div[class='comment_all']").find("input").attr('name');//给评论ID赋值
		touid = $(this).parents("ul").prev("div[class='comment-body']").find("input").attr('class');
		touname = $(this).parents("ul").prev("div[class='comment-body']").find("input").val();
		if($(this).find('font').html() == '回复'){
			//点击回复把其他的回复框不显示
			$("div[class='reply-box']").css('display','none');
			//把所有取消回复归位
			$(".pop_resbox").find("font").html('回复');
			$(this).find('font').html('取消回复');
			$(this).parents("div[class='comment_all']").find("div[class='reply-box']").css('display','block');
			//取刚刚出现的回复框位置
			// var scroll_height = $(this).parents("div[class='comment_all']").find("div[class='reply-box']").offset();
			// console.log(scroll_height);
		}else if($(this).find('font').html() == '取消回复'){
			$(this).find('font').html('回复');
			$(this).parents("div[class='comment_all']").find("div[class='reply-box']").css('display','none');
		}else{
			alert("我叫JS,我向你承认错误 >_< ");
		}
		// alert(reply_id);
	});
	//回复到数据库
	$("a[name='reply']").click(function(){
		// alert();
		//插入位置
		var add_rep = $(this).parents("div[class='reply-box']");
		//取当前要回复的评论信息的ID,用户名,用户ID当前登录的用户ID,用户名
		var myDate = new Date();
		var time = myDate.toLocaleString();
		info = $(this).parents("div[class='reply-box']").find('textarea').val();//回复信息
		$(this).parents("div[class='reply-box']").find('textarea').val('');
		// alert(comid);		alert(uid);		alert(uname);		alert(touname);		alert(touid);		alert(time);		alert(info);		alert(reply_id);	
		//后台插入数据库
		$.ajax({
            type: 'POST',
            url: "<?php echo get_template_directory_uri(); ?>/docomment.php",
            data:{'comid':comid,'uid':uid,'touid':touid,'time':time,'info':info,'uname':uname,'touname':touname,'replyid':reply_id},
            success: function(data){
            	if(data != 0){
            		alert('回复成功');
            		var rep_tag = reply_tag.clone(true);
            		rep_tag.css('display','block');
            		rep_tag.find(".repinfo-forclone").html(info);
            		rep_tag.find(".reptime-forclone").html(time);
            		rep_tag.find(".repuname-forclone").html(uname);
            		rep_tag.find(".reptouname-forclone").html(touname);
            		var input_hidden = $("<input type='hidden' class="+uid+" name="+data+" value="+uname+">");
            		rep_tag.find('.repinfo-forclone').append(input_hidden);
            		add_rep.before(rep_tag);
            		add_rep.css('display','none');
            		//初始化数据
            		data_restart();

            	}else{
            		alert('回复失败');
            		console.log(data);
            	}
            }
        });
	});
	//提交评论
	$("#comment").click(function(){
		// 判断登录
		var is_login = $("input[name='islogin']").size();
		if(is_login == 0){
			alert("请先登录后评论");
			return false;
		}
		//获取内容
		var comment_info = $("#user_comment").val();
		//获取用户名,用户ID
		// var uid = $("input[name='islogin']").val();
		// var uname  = $("input[name='islogin']").attr('class');
		//获取时间
		var myDate = new Date();
		var time = myDate.toLocaleString();
		//获取项目ID
		var pid = <?php echo $pro_id ?>;
		//后台插入数据库
		$.ajax({
            type: 'POST',
            url: "<?php echo get_template_directory_uri(); ?>/docomment.php",
            data:{'uid':uid,'uname':uname,'time':time,'pid':pid,'info':comment_info},
            success: function(data){
            	if(data != 0){
            		alert('评论成功');
            		//将评论信息插入页面
            		var com_tag = comment_tag.clone(true);
            		com_tag.css('display','block');
            		com_tag.find('.comname-forclone').html(uname);
            		com_tag.find('.comtime-forclone').html(time);
            		com_tag.find('.cominfo-forclone').html(comment_info);
            		var input_hidden = $("<input type='hidden' class="+uid+" name="+data+" value="+uname+">");
            		com_tag.find('.cominfo-forclone').append(input_hidden);
            		$(".add-comment").append(com_tag);
            		//有评论信息就不再显示成为第一条
            		$(".first-comment").css('display','none');

            	}else{
            		alert('评论失败');
            		console.log(data);
            	}
            }
        });
	});
	//展开回复按钮
	$(".open-reply").click(function(){
		if($(this).find('font').html() == '展开回复'){
			homeing();
			$(this).find('font').html('关闭回复');
			$(this).parents("div[class='comment_all']").find("div[class='replys']").css('display','block');
		}else{
			$(this).find('font').html('展开回复');
			$(this).parents("div[class='comment_all']").find("div[class='replys']").css('display','none');
		}
	});
	function homeing(){
		//点击回复把其他的回复框不显示
		$("div[class='reply-box']").css('display','none');
		//把所有取消回复归位
		$(".pop_resbox").find("font").html('回复');
	}
	function data_restart(){
		reply_id = '';
		comid = '';
		touname='';
		time='';
		info='';
	}
</script>

<?php //get_footer(); ?>