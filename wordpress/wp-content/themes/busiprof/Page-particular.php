<?php
// Template Name: Page particular
// get_header();
?>
<?php
	$pro_id = $_GET['pid'];
	global $wpdb;//定义全局变量
	
	//查项目大图
	$sql_propic = "select meta_value from wp_postmeta where meta_key = '_thumbnail_id' and post_id = ".$pro_id;//查postmeta表数据key值为_thumbnail_id的value
	$res_propic = $wpdb->get_results($sql_propic,ARRAY_A);
	// echo $sql_propic;
	// var_dump($res_propic);
	//如果有图片
	if($res_propic[0]['meta_value']){
		$pic_arr = $wpdb->get_results("select guid from wp_posts where id = ".$res_propic[0]['meta_value'],ARRAY_A);
		// var_dump($pic_arr);
		$pic = $pic_arr[0]['guid'];
	}
	else{
		$pic = '';
	}
	// var_dump($pic);

	//查项目
	$sql_pro = "select a.post_content , a.post_author , a.post_title as pro_name , a.post_excerpt , a.post_date , a.post_modified , c.* from wp_posts as a , wp_project as c where c.projectid = ".$pro_id." and c.projectid = a.id";
	$res_pro = $wpdb->get_results($sql_pro,ARRAY_A);//执行返回结果
	
	//查项目用具
	$sql_thing = "select b.* , a.num from wp_user_things as a , wp_project_things as b where a.projectid = ".$pro_id." and a.thing_id = b.id";
	$res_thing = $wpdb->get_results($sql_thing,ARRAY_A);//执行返回结果

	//查代码图
	$sql_code = "select * from wp_attachments where projectid = ".$pro_id ." and type = 1" ;//原理图2 代码1 cad3
	$res_code = $wpdb->get_results($sql_code,ARRAY_A);
	
	//查原理图
	$sql_ylt = "select * from wp_attachments where projectid = ".$pro_id ." and type = 2" ;//原理图2 代码1 cad3
	$res_ylt = $wpdb->get_results($sql_ylt,ARRAY_A);
	
	//查CAD图
	$sql_cad = "select * from wp_attachments where projectid = ".$pro_id ." and type = 3" ;//原理图2 代码1 cad3
	$res_cad = $wpdb->get_results($sql_cad,ARRAY_A);
	
	// var_dump($res_pro);
	// var_dump($res_thing);
	// echo $sql_code;
	// var_dump($res_ylt);
	// var_dump($res_cad);
	// var_dump($res_code);
?>
<!-- ************************************************************** -->
<!-- saved from url=(0080)https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8?ref=featured -->
<!-- <head itemscope="" itemtype="http://schema.org/WebSite"> -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- <meta content="Hackster.io" itemprop="name"> -->
	<!-- <meta content="https://www.hackster.io" itemprop="url"> -->
	<!-- <meta content="IE=Edge,chrome=1" http-equiv="X-UA-Compatible"> -->
	<script type="text/javascript" async="" src="<?php bloginfo('template_url'); ?>/style/hotjar-81027.js"></script>
	<script type="text/javascript" async="" src="<?php bloginfo('template_url'); ?>/style/analytics.js"></script>
	<script async="" src="<?php bloginfo('template_url'); ?>/style/gtm.js"></script>
	<script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"bam.nr-data.net","errorBeacon":"bam.nr-data.net","licenseKey":"0f3d20e9cb","applicationID":"1979363","transactionName":"IApZEUReXVUGRElGQAwPUgZCQh5KC1kR","queueTime":3,"applicationTime":101,"agent":""}</script>
	<script type="text/javascript">(window.NREUM||(NREUM={})).loader_config={xpid:"Vg4OUlNUGwIJU1hRAQI="};window.NREUM||(NREUM={}),__nr_require=function(t,n,e){function r(e){if(!n[e]){var o=n[e]={exports:{}};t[e][0].call(o.exports,function(n){var o=t[e][1][n];return r(o||n)},o,o.exports)}return n[e].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<e.length;o++)r(e[o]);return r}({1:[function(t,n,e){function r(t){try{s.console&&console.log(t)}catch(n){}}var o,i=t("ee"),a=t(15),s={};try{o=localStorage.getItem("__nr_flags").split(","),console&&"function"==typeof console.log&&(s.console=!0,o.indexOf("dev")!==-1&&(s.dev=!0),o.indexOf("nr_dev")!==-1&&(s.nrDev=!0))}catch(c){}s.nrDev&&i.on("internal-error",function(t){r(t.stack)}),s.dev&&i.on("fn-err",function(t,n,e){r(e.stack)}),s.dev&&(r("NR AGENT IN DEVELOPMENT MODE"),r("flags: "+a(s,function(t,n){return t}).join(", ")))},{}],2:[function(t,n,e){function r(t,n,e,r,s){try{p?p-=1:o(s||new UncaughtException(t,n,e),!0)}catch(f){try{i("ierr",[f,c.now(),!0])}catch(d){}}return"function"==typeof u&&u.apply(this,a(arguments))}function UncaughtException(t,n,e){this.message=t||"Uncaught error with no additional information",this.sourceURL=n,this.line=e}function o(t,n){var e=n?null:c.now();i("err",[t,e])}var i=t("handle"),a=t(16),s=t("ee"),c=t("loader"),f=t("gos"),u=window.onerror,d=!1,l="nr@seenError",p=0;c.features.err=!0,t(1),window.onerror=r;try{throw new Error}catch(h){"stack"in h&&(t(8),t(7),"addEventListener"in window&&t(5),c.xhrWrappable&&t(9),d=!0)}s.on("fn-start",function(t,n,e){d&&(p+=1)}),s.on("fn-err",function(t,n,e){d&&!e[l]&&(f(e,l,function(){return!0}),this.thrown=!0,o(e))}),s.on("fn-end",function(){d&&!this.thrown&&p>0&&(p-=1)}),s.on("internal-error",function(t){i("ierr",[t,c.now(),!0])})},{}],3:[function(t,n,e){t("loader").features.ins=!0},{}],4:[function(t,n,e){function r(t){}if(window.performance&&window.performance.timing&&window.performance.getEntriesByType){var o=t("ee"),i=t("handle"),a=t(8),s=t(7),c="learResourceTimings",f="addEventListener",u="resourcetimingbufferfull",d="bstResource",l="resource",p="-start",h="-end",m="fn"+p,w="fn"+h,v="bstTimer",y="pushState",g=t("loader");g.features.stn=!0,t(6);var b=NREUM.o.EV;o.on(m,function(t,n){var e=t[0];e instanceof b&&(this.bstStart=g.now())}),o.on(w,function(t,n){var e=t[0];e instanceof b&&i("bst",[e,n,this.bstStart,g.now()])}),a.on(m,function(t,n,e){this.bstStart=g.now(),this.bstType=e}),a.on(w,function(t,n){i(v,[n,this.bstStart,g.now(),this.bstType])}),s.on(m,function(){this.bstStart=g.now()}),s.on(w,function(t,n){i(v,[n,this.bstStart,g.now(),"requestAnimationFrame"])}),o.on(y+p,function(t){this.time=g.now(),this.startPath=location.pathname+location.hash}),o.on(y+h,function(t){i("bstHist",[location.pathname+location.hash,this.startPath,this.time])}),f in window.performance&&(window.performance["c"+c]?window.performance[f](u,function(t){i(d,[window.performance.getEntriesByType(l)]),window.performance["c"+c]()},!1):window.performance[f]("webkit"+u,function(t){i(d,[window.performance.getEntriesByType(l)]),window.performance["webkitC"+c]()},!1)),document[f]("scroll",r,{passive:!0}),document[f]("keypress",r,!1),document[f]("click",r,!1)}},{}],5:[function(t,n,e){function r(t){for(var n=t;n&&!n.hasOwnProperty(u);)n=Object.getPrototypeOf(n);n&&o(n)}function o(t){s.inPlace(t,[u,d],"-",i)}function i(t,n){return t[1]}var a=t("ee").get("events"),s=t(18)(a,!0),c=t("gos"),f=XMLHttpRequest,u="addEventListener",d="removeEventListener";n.exports=a,"getPrototypeOf"in Object?(r(document),r(window),r(f.prototype)):f.prototype.hasOwnProperty(u)&&(o(window),o(f.prototype)),a.on(u+"-start",function(t,n){var e=t[1],r=c(e,"nr@wrapped",function(){function t(){if("function"==typeof e.handleEvent)return e.handleEvent.apply(e,arguments)}var n={object:t,"function":e}[typeof e];return n?s(n,"fn-",null,n.name||"anonymous"):e});this.wrapped=t[1]=r}),a.on(d+"-start",function(t){t[1]=this.wrapped||t[1]})},{}],6:[function(t,n,e){var r=t("ee").get("history"),o=t(18)(r);n.exports=r,o.inPlace(window.history,["pushState","replaceState"],"-")},{}],7:[function(t,n,e){var r=t("ee").get("raf"),o=t(18)(r),i="equestAnimationFrame";n.exports=r,o.inPlace(window,["r"+i,"mozR"+i,"webkitR"+i,"msR"+i],"raf-"),r.on("raf-start",function(t){t[0]=o(t[0],"fn-")})},{}],8:[function(t,n,e){function r(t,n,e){t[0]=a(t[0],"fn-",null,e)}function o(t,n,e){this.method=e,this.timerDuration=isNaN(t[1])?0:+t[1],t[0]=a(t[0],"fn-",this,e)}var i=t("ee").get("timer"),a=t(18)(i),s="setTimeout",c="setInterval",f="clearTimeout",u="-start",d="-";n.exports=i,a.inPlace(window,[s,"setImmediate"],s+d),a.inPlace(window,[c],c+d),a.inPlace(window,[f,"clearImmediate"],f+d),i.on(c+u,r),i.on(s+u,o)},{}],9:[function(t,n,e){function r(t,n){d.inPlace(n,["onreadystatechange"],"fn-",s)}function o(){var t=this,n=u.context(t);t.readyState>3&&!n.resolved&&(n.resolved=!0,u.emit("xhr-resolved",[],t)),d.inPlace(t,y,"fn-",s)}function i(t){g.push(t),h&&(x?x.then(a):w?w(a):(E=-E,O.data=E))}function a(){for(var t=0;t<g.length;t++)r([],g[t]);g.length&&(g=[])}function s(t,n){return n}function c(t,n){for(var e in t)n[e]=t[e];return n}t(5);var f=t("ee"),u=f.get("xhr"),d=t(18)(u),l=NREUM.o,p=l.XHR,h=l.MO,m=l.PR,w=l.SI,v="readystatechange",y=["onload","onerror","onabort","onloadstart","onloadend","onprogress","ontimeout"],g=[];n.exports=u;var b=window.XMLHttpRequest=function(t){var n=new p(t);try{u.emit("new-xhr",[n],n),n.addEventListener(v,o,!1)}catch(e){try{u.emit("internal-error",[e])}catch(r){}}return n};if(c(p,b),b.prototype=p.prototype,d.inPlace(b.prototype,["open","send"],"-xhr-",s),u.on("send-xhr-start",function(t,n){r(t,n),i(n)}),u.on("open-xhr-start",r),h){var x=m&&m.resolve();if(!w&&!m){var E=1,O=document.createTextNode(E);new h(a).observe(O,{characterData:!0})}}else f.on("fn-end",function(t){t[0]&&t[0].type===v||a()})},{}],10:[function(t,n,e){function r(t){var n=this.params,e=this.metrics;if(!this.ended){this.ended=!0;for(var r=0;r<d;r++)t.removeEventListener(u[r],this.listener,!1);if(!n.aborted){if(e.duration=a.now()-this.startTime,4===t.readyState){n.status=t.status;var i=o(t,this.lastSize);if(i&&(e.rxSize=i),this.sameOrigin){var c=t.getResponseHeader("X-NewRelic-App-Data");c&&(n.cat=c.split(", ").pop())}}else n.status=0;e.cbTime=this.cbTime,f.emit("xhr-done",[t],t),s("xhr",[n,e,this.startTime])}}}function o(t,n){var e=t.responseType;if("json"===e&&null!==n)return n;var r="arraybuffer"===e||"blob"===e||"json"===e?t.response:t.responseText;return h(r)}function i(t,n){var e=c(n),r=t.params;r.host=e.hostname+":"+e.port,r.pathname=e.pathname,t.sameOrigin=e.sameOrigin}var a=t("loader");if(a.xhrWrappable){var s=t("handle"),c=t(11),f=t("ee"),u=["load","error","abort","timeout"],d=u.length,l=t("id"),p=t(14),h=t(13),m=window.XMLHttpRequest;a.features.xhr=!0,t(9),f.on("new-xhr",function(t){var n=this;n.totalCbs=0,n.called=0,n.cbTime=0,n.end=r,n.ended=!1,n.xhrGuids={},n.lastSize=null,p&&(p>34||p<10)||window.opera||t.addEventListener("progress",function(t){n.lastSize=t.loaded},!1)}),f.on("open-xhr-start",function(t){this.params={method:t[0]},i(this,t[1]),this.metrics={}}),f.on("open-xhr-end",function(t,n){"loader_config"in NREUM&&"xpid"in NREUM.loader_config&&this.sameOrigin&&n.setRequestHeader("X-NewRelic-ID",NREUM.loader_config.xpid)}),f.on("send-xhr-start",function(t,n){var e=this.metrics,r=t[0],o=this;if(e&&r){var i=h(r);i&&(e.txSize=i)}this.startTime=a.now(),this.listener=function(t){try{"abort"===t.type&&(o.params.aborted=!0),("load"!==t.type||o.called===o.totalCbs&&(o.onloadCalled||"function"!=typeof n.onload))&&o.end(n)}catch(e){try{f.emit("internal-error",[e])}catch(r){}}};for(var s=0;s<d;s++)n.addEventListener(u[s],this.listener,!1)}),f.on("xhr-cb-time",function(t,n,e){this.cbTime+=t,n?this.onloadCalled=!0:this.called+=1,this.called!==this.totalCbs||!this.onloadCalled&&"function"==typeof e.onload||this.end(e)}),f.on("xhr-load-added",function(t,n){var e=""+l(t)+!!n;this.xhrGuids&&!this.xhrGuids[e]&&(this.xhrGuids[e]=!0,this.totalCbs+=1)}),f.on("xhr-load-removed",function(t,n){var e=""+l(t)+!!n;this.xhrGuids&&this.xhrGuids[e]&&(delete this.xhrGuids[e],this.totalCbs-=1)}),f.on("addEventListener-end",function(t,n){n instanceof m&&"load"===t[0]&&f.emit("xhr-load-added",[t[1],t[2]],n)}),f.on("removeEventListener-end",function(t,n){n instanceof m&&"load"===t[0]&&f.emit("xhr-load-removed",[t[1],t[2]],n)}),f.on("fn-start",function(t,n,e){n instanceof m&&("onload"===e&&(this.onload=!0),("load"===(t[0]&&t[0].type)||this.onload)&&(this.xhrCbStart=a.now()))}),f.on("fn-end",function(t,n){this.xhrCbStart&&f.emit("xhr-cb-time",[a.now()-this.xhrCbStart,this.onload,n],n)})}},{}],11:[function(t,n,e){n.exports=function(t){var n=document.createElement("a"),e=window.location,r={};n.href=t,r.port=n.port;var o=n.href.split("://");!r.port&&o[1]&&(r.port=o[1].split("/")[0].split("@").pop().split(":")[1]),r.port&&"0"!==r.port||(r.port="https"===o[0]?"443":"80"),r.hostname=n.hostname||e.hostname,r.pathname=n.pathname,r.protocol=o[0],"/"!==r.pathname.charAt(0)&&(r.pathname="/"+r.pathname);var i=!n.protocol||":"===n.protocol||n.protocol===e.protocol,a=n.hostname===document.domain&&n.port===e.port;return r.sameOrigin=i&&(!n.hostname||a),r}},{}],12:[function(t,n,e){function r(){}function o(t,n,e){return function(){return i(t,[f.now()].concat(s(arguments)),n?null:this,e),n?void 0:this}}var i=t("handle"),a=t(15),s=t(16),c=t("ee").get("tracer"),f=t("loader"),u=NREUM;"undefined"==typeof window.newrelic&&(newrelic=u);var d=["setPageViewName","setCustomAttribute","setErrorHandler","finished","addToTrace","inlineHit","addRelease"],l="api-",p=l+"ixn-";a(d,function(t,n){u[n]=o(l+n,!0,"api")}),u.addPageAction=o(l+"addPageAction",!0),u.setCurrentRouteName=o(l+"routeName",!0),n.exports=newrelic,u.interaction=function(){return(new r).get()};var h=r.prototype={createTracer:function(t,n){var e={},r=this,o="function"==typeof n;return i(p+"tracer",[f.now(),t,e],r),function(){if(c.emit((o?"":"no-")+"fn-start",[f.now(),r,o],e),o)try{return n.apply(this,arguments)}catch(t){throw c.emit("fn-err",[arguments,this,t],e),t}finally{c.emit("fn-end",[f.now()],e)}}}};a("setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","),function(t,n){h[n]=o(p+n)}),newrelic.noticeError=function(t){"string"==typeof t&&(t=new Error(t)),i("err",[t,f.now()])}},{}],13:[function(t,n,e){n.exports=function(t){if("string"==typeof t&&t.length)return t.length;if("object"==typeof t){if("undefined"!=typeof ArrayBuffer&&t instanceof ArrayBuffer&&t.byteLength)return t.byteLength;if("undefined"!=typeof Blob&&t instanceof Blob&&t.size)return t.size;if(!("undefined"!=typeof FormData&&t instanceof FormData))try{return JSON.stringify(t).length}catch(n){return}}}},{}],14:[function(t,n,e){var r=0,o=navigator.userAgent.match(/Firefox[\/\s](\d+\.\d+)/);o&&(r=+o[1]),n.exports=r},{}],15:[function(t,n,e){function r(t,n){var e=[],r="",i=0;for(r in t)o.call(t,r)&&(e[i]=n(r,t[r]),i+=1);return e}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],16:[function(t,n,e){function r(t,n,e){n||(n=0),"undefined"==typeof e&&(e=t?t.length:0);for(var r=-1,o=e-n||0,i=Array(o<0?0:o);++r<o;)i[r]=t[n+r];return i}n.exports=r},{}],17:[function(t,n,e){n.exports={exists:"undefined"!=typeof window.performance&&window.performance.timing&&"undefined"!=typeof window.performance.timing.navigationStart}},{}],18:[function(t,n,e){function r(t){return!(t&&t instanceof Function&&t.apply&&!t[a])}var o=t("ee"),i=t(16),a="nr@original",s=Object.prototype.hasOwnProperty,c=!1;n.exports=function(t,n){function e(t,n,e,o){function nrWrapper(){var r,a,s,c;try{a=this,r=i(arguments),s="function"==typeof e?e(r,a):e||{}}catch(f){l([f,"",[r,a,o],s])}u(n+"start",[r,a,o],s);try{return c=t.apply(a,r)}catch(d){throw u(n+"err",[r,a,d],s),d}finally{u(n+"end",[r,a,c],s)}}return r(t)?t:(n||(n=""),nrWrapper[a]=t,d(t,nrWrapper),nrWrapper)}function f(t,n,o,i){o||(o="");var a,s,c,f="-"===o.charAt(0);for(c=0;c<n.length;c++)s=n[c],a=t[s],r(a)||(t[s]=e(a,f?s+o:o,i,s))}function u(e,r,o){if(!c||n){var i=c;c=!0;try{t.emit(e,r,o,n)}catch(a){l([a,e,r,o])}c=i}}function d(t,n){if(Object.defineProperty&&Object.keys)try{var e=Object.keys(t);return e.forEach(function(e){Object.defineProperty(n,e,{get:function(){return t[e]},set:function(n){return t[e]=n,n}})}),n}catch(r){l([r])}for(var o in t)s.call(t,o)&&(n[o]=t[o]);return n}function l(n){try{t.emit("internal-error",n)}catch(e){}}return t||(t=o),e.inPlace=f,e.flag=a,e}},{}],ee:[function(t,n,e){function r(){}function o(t){function n(t){return t&&t instanceof r?t:t?c(t,s,i):i()}function e(e,r,o,i){if(!l.aborted||i){t&&t(e,r,o);for(var a=n(o),s=h(e),c=s.length,f=0;f<c;f++)s[f].apply(a,r);var d=u[y[e]];return d&&d.push([g,e,r,a]),a}}function p(t,n){v[t]=h(t).concat(n)}function h(t){return v[t]||[]}function m(t){return d[t]=d[t]||o(e)}function w(t,n){f(t,function(t,e){n=n||"feature",y[e]=n,n in u||(u[n]=[])})}var v={},y={},g={on:p,emit:e,get:m,listeners:h,context:n,buffer:w,abort:a,aborted:!1};return g}function i(){return new r}function a(){(u.api||u.feature)&&(l.aborted=!0,u=l.backlog={})}var s="nr@context",c=t("gos"),f=t(15),u={},d={},l=n.exports=o();l.backlog=u},{}],gos:[function(t,n,e){function r(t,n,e){if(o.call(t,n))return t[n];var r=e();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(t,n,{value:r,writable:!0,enumerable:!1}),r}catch(i){}return t[n]=r,r}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],handle:[function(t,n,e){function r(t,n,e,r){o.buffer([t],r),o.emit(t,n,e)}var o=t("ee").get("handle");n.exports=r,r.ee=o},{}],id:[function(t,n,e){function r(t){var n=typeof t;return!t||"object"!==n&&"function"!==n?-1:t===window?0:a(t,i,function(){return o++})}var o=1,i="nr@id",a=t("gos");n.exports=r},{}],loader:[function(t,n,e){function r(){if(!x++){var t=b.info=NREUM.info,n=l.getElementsByTagName("script")[0];if(setTimeout(u.abort,3e4),!(t&&t.licenseKey&&t.applicationID&&n))return u.abort();f(y,function(n,e){t[n]||(t[n]=e)}),c("mark",["onload",a()+b.offset],null,"api");var e=l.createElement("script");e.src="https://"+t.agent,n.parentNode.insertBefore(e,n)}}function o(){"complete"===l.readyState&&i()}function i(){c("mark",["domContent",a()+b.offset],null,"api")}function a(){return E.exists&&performance.now?Math.round(performance.now()):(s=Math.max((new Date).getTime(),s))-b.offset}var s=(new Date).getTime(),c=t("handle"),f=t(15),u=t("ee"),d=window,l=d.document,p="addEventListener",h="attachEvent",m=d.XMLHttpRequest,w=m&&m.prototype;NREUM.o={ST:setTimeout,SI:d.setImmediate,CT:clearTimeout,XHR:m,REQ:d.Request,EV:d.Event,PR:d.Promise,MO:d.MutationObserver};var v=""+location,y={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-1071.min.js"},g=m&&w&&w[p]&&!/CriOS/.test(navigator.userAgent),b=n.exports={offset:s,now:a,origin:v,features:{},xhrWrappable:g};t(12),l[p]?(l[p]("DOMContentLoaded",i,!1),d[p]("load",r,!1)):(l[h]("onreadystatechange",o),d[h]("onload",r)),c("mark",["firstbyte",s],null,"api");var x=0,E=t(17)},{}]},{},["loader",2,10,4,3]);</script>
	<meta content="543757942384158" property="fb:app_id">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="api.hackster.io" id="api-uri" name="api-uri">
	<meta content="projects#show" name="pageType">
	<title>Alarm Cube for Greenhouse - Hackster.io</title>
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
	<meta content="https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8/embed" property="twitter:player">
	<meta content="600" property="twitter:player:width">
	<meta content="450" property="twitter:player:height">
	<meta content="https://hackster.imgix.net/uploads/attachments/443818/_fLIXywx9WG.2Q%3D%3D?auto=compress%2Cformat&amp;w=600&amp;h=450&amp;fit=min" property="twitter:image">
	<!-- <link href="https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8" rel="canonical"> -->
	<meta content="alarm,battery,internet of things,led,security" name="keywords">
	<meta content="@hacksterio" property="twitter:site">
	<meta content="hackster.io" property="twitter:domain">
	<meta content="Hackster.io" property="og:site_name">
	<meta name="csrf-param" content="authenticity_token">
	<meta name="csrf-token" content="I8/cj8Bf+xt27O1MJmlicZJbkyS+U0h6keeWKUsH9QpjEZTGtldvnfikyaMBxDJST5dTaWq4VsxlahdqZbJaNg=="><!--Le HTML5 shim, for IE6-8 support of HTML elements--><!--[if lt IE 9]
	= javascript_include_tag "//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"-->
	<link rel="stylesheet" media="all" href="<?php bloginfo('template_url'); ?>/style/application-8d64c6b20adc33d6124bb5e90754e60c9f8a92debea1c43d47066a21beebb1da.css">
	<link href="<?php bloginfo('template_url'); ?>/style/client_bundle.0be82cc9f726b2aa6615.css" rel="stylesheet">
	<link href="https://www.hackster.io/assets/favicons/apple-touch-icon-57x57-b9adcd1bd159f32ba17674ea78a0972e20afcc10f486ab6e509282d0a6eb0f58.png?v=zXX3Bm3lo3" rel="apple-touch-icon" sizes="57x57">
	<link href="https://www.hackster.io/assets/favicons/apple-touch-icon-60x60-a460f66e7425566394553fca89b9452b02844050957d2e498784f6b49f13c894.png?v=zXX3Bm3lo3" rel="apple-touch-icon" sizes="60x60">
	<link href="https://www.hackster.io/assets/favicons/apple-touch-icon-72x72-9f08b053288321c07aba5db8134e9f1228da839591523ae3603e0d592333b0f7.png?v=zXX3Bm3lo3" rel="apple-touch-icon" sizes="72x72">
	<link href="https://www.hackster.io/assets/favicons/apple-touch-icon-76x76-6d0efe2e45f65776f9731026e79cd3aa4951c4b6639cc14c243a58a8375630da.png?v=zXX3Bm3lo3" rel="apple-touch-icon" sizes="76x76">
	<link href="https://www.hackster.io/assets/favicons/apple-touch-icon-114x114-e9b0ca8ba4d9821ff453e29addab8bc088624849b5ce033c68a259444dfc5ab6.png?v=zXX3Bm3lo3" rel="apple-touch-icon" sizes="114x114">
	<link href="https://www.hackster.io/assets/favicons/apple-touch-icon-120x120-f730acae585534c3b60ef0e3fb8d61745cd77597f5b4793eafb9d6fb609fb665.png?v=zXX3Bm3lo3" rel="apple-touch-icon" sizes="120x120">
	<link href="https://www.hackster.io/assets/favicons/apple-touch-icon-144x144-5f81b7662b52ca9de46864798aabf4a45753f9d8502fa4bd2646573b2f2d546d.png?v=zXX3Bm3lo3" rel="apple-touch-icon" sizes="144x144">
	<link href="https://www.hackster.io/assets/favicons/apple-touch-icon-152x152-14611e454d4cde90d3cf3c72c8449e29bca9d2dd57f0f995632e7e5fbdd0bed1.png?v=zXX3Bm3lo3" rel="apple-touch-icon" sizes="152x152">
	<link href="https://www.hackster.io/assets/favicons/apple-touch-icon-180x180-e4919391d8a5a61764099e7f7d06641e43f6964e591f155752d5be470aabaaa9.png?v=zXX3Bm3lo3" rel="apple-touch-icon" sizes="180x180">
	<link href="https://www.hackster.io/assets/favicons/favicon-16x16-870c9ddbb299d7e26cbee906ca096d3ec7757bd41c59f91c5a61bf76fa8c98ee.png?v=zXX3Bm3lo3%22%20sizes=%2216x16" rel="icon" type="image/png">
	<link href="https://www.hackster.io/assets/favicons/favicon-32x32-957c1e4ac51a714b508859386e897dc2993dcae771164301e9423b32e9132d4d.png?v=zXX3Bm3lo3%22%20sizes=%2232x32" rel="icon" type="image/png">
	<link href="https://www.hackster.io/assets/favicons/favicon-96x96-a6f70c4dd2c98d0ea30b31282da0c8e19268e4eecb06ad144c87e040b021aeab.png?v=zXX3Bm3lo3%22%20sizes=%2296x96" rel="icon" type="image/png">
	<link href="https://www.hackster.io/favicons/favicon-160x160.png?v=zXX3Bm3lo3%22%20sizes=%22160x160" rel="icon" type="image/png">
	<link href="https://www.hackster.io/assets/favicons/android-chrome-192x192-1325305f9335c2e0f213d3882fe59c919f03bd7b791690f1141387a16a72110e.png?v=zXX3Bm3lo3%22%20sizes=%22192x192" rel="icon" type="image/png">
	<link href="https://www.hackster.io/assets/favicons/manifest-e4a294316a9c40951ca76487b0f2e2c9213b68885773332e7e7a79fe31ecc0a2.json?v=zXX3Bm3lo3" rel="manifest">
	<link color="#1cacf7" href="https://www.hackster.io/assets/favicons/safari-pinned-tab-79cbf7601715d0e19c545886de644e69d97334e99f0c7aa64df98c0539382769.svg?v=zXX3Bm3lo3" rel="mask-icon">
	<link href="https://www.hackster.io/assets/favicons/favicon-ccf4ed2b3c0b095f2ec85c69ff8444c38e47aff6b39dedcb934563e0fd7b60db.ico?v=zXX3Bm3lo3" rel="shortcut icon">
	<meta content="#1cacf7" name="msapplication-TileColor">
	<meta content="https://www.hackster.io/assets/favicons/mstile-144x144-ea13b97589a22e74f5c44fe59a9dd083501c21aa514c4c9d742135ed8a818645.png?v=zXX3Bm3lo3" name="msapplication-TileImage">
	<meta content="#1cacf7" name="theme-color">
	<meta content="Hackster" name="apple-mobile-web-app-title">
	<meta content="Hackster" name="application-name">
	<script>var jsk={"aai":"7YQJT9BHUX","ask":"c113f0569e873258342405ddf4a4dd09","mak":"hp0sle6ipt0opaot9jbi8ef0ep","cai":"hackster_production_contest","mei":"hackster_production_meetup_event","pri":"hackster_production_base_article","pli":"hackster_production_channel","pai":"hackster_production_part","sqi":"hackster_production_search_query","tai":"hackster_production_tag","tcai":"hackster_production_topic","usi":"hackster_production_user","vai":"hackster_production_video","kpk":"572238ffe861700c3147037d","kwk":"0af84106bd6fd13f96b91f5285d962610c3e484c700e6f9e67062b1c96b8b9247deb42c7c0e9ce27b1a2cc41e930d360764fe99237abfedc2128dab22606e21ee3c1d6f5e929c257fa4f267676343942d4ed0a51a65152054f127678b621e62c"}</script>
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
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	  })(window,document,'script','gglTagMngrDataLayer', 'GTM-KR3BZMN');</script>
	<script>window.HAnalyticsGlobalData = window.HAnalyticsGlobalData || {};
	window.HAnalyticsGlobalData.whitelabel = 'hackster';</script>
	<script>window.HAnalyticsGlobalData.eventsJson = '[]'</script>
	<script>window.HAnalyticsGlobalData.entity_id = 82007;
	window.HAnalyticsGlobalData.entity_type = "Project";</script>
	<script>window.HAnalyticsGlobalData.user_id = 421784;</script>
	<script async="" src="<?php bloginfo('template_url'); ?>/style/analytics(1).js"></script>
	<script>//<![CDATA[
	    window.webpackManifest = {"0":"vendor.3ac88e7d0490ec1957db.js","1":"client_bundle.0be82cc9f726b2aa6615.js"}//]]>
	</script>
    <script type="application/ld+json">{  "@context": "http://www.schema.org",  "@type":"LocalBusiness",  "name": "Hackster.io",  "url": "https://www.hackster.io/",  "image": "https://www.hackster.io/assets/hackster_logo_blue-03ea84833aa0dcf8f33be76d265d37340c7cd1ceb77a74429deb631ef0261e8f.png",  "address": {    "@type": "PostalAddress",    "streetAddress": "531 Howard street, suite 200",    "addressLocality": "San Francisco",    "addressRegion": "CA",    "postalCode": "94105"  }}</script>
    <style type="text/css">@keyframes resizeanim { from { opacity: 0; } to { opacity: 0; } } .resize-triggers { animation: 1ms resizeanim; visibility: hidden; opacity: 0; } .resize-triggers, .resize-triggers > div, .contract-trigger:before { content: " "; display: block; position: absolute; top: 0; left: 0; height: 100%; width: 100%; overflow: hidden; } .resize-triggers > div { background: #eee; overflow: auto; } .contract-trigger:before { width: 200%; height: 200%; }</style>
    <script async="" src="<?php bloginfo('template_url'); ?>/style/modules-fa7b914657f32d32df01f26b19e8f066.js"></script>
    <style type="text/css">iframe#_hjRemoteVarsFrame {display: none !important; width: 1px !important; height: 1px !important; opacity: 0 !important; pointer-events: none !important;}</style>
<!-- </head> -->
<body data-user-signed-in="421784">
	<noscript>&lt;img height="0" width="0" style="display:none;visibility:hidden" src="/images/debug.gif" alt="Debug" /&gt;&lt;iframe height="0" src="https://www.googletagmanager.com/ns.html?id=GTM-KR3BZMN" style="display:none;visibility:hidden" width="0"&gt;&lt;/iframe&gt;</noscript>
	<div id="outer-wrapper">
		<div id="main">
			<a class="project-switcher previous istooltip" data-container="body" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;Next arrow&quot;,&quot;href&quot;:&quot;/projects/fab1c8/next?dir=prev\u0026ref=featured&quot;,&quot;type&quot;:&quot;project-arrows&quot;,&quot;location&quot;:&quot;right&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}" data-placement="right" href="https://www.hackster.io/projects/fab1c8/next?dir=prev&amp;ref=featured" rel="nofollow tooltip" title="" data-original-title="Previous project">
				<div class="inner"><i class="fa fa-chevron-left"></i></div>
			</a>
			<a class="project-switcher next istooltip" data-container="body" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;Previous arrow&quot;,&quot;href&quot;:&quot;/projects/fab1c8/next?dir=next\u0026ref=featured&quot;,&quot;type&quot;:&quot;project-arrows&quot;,&quot;location&quot;:&quot;left&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}" data-placement="left" href="https://www.hackster.io/projects/fab1c8/next?dir=next&amp;ref=featured" rel="nofollow tooltip" title="" data-original-title="Next project">
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
						<meta content="https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8" itemprop="mainEntityOfPage">
						<div id="home">
							<div class="project-title">
								<h1 itemprop="name"><?php if($res_pro[0]['pro_name']) echo $res_pro[0]['pro_name']; ?></h1>
								<ul class="list-with-dividers project-credits">
									<li itemprop="author" itemscope="" itemtype="https://schema.org/Person">制作者(团队)<a itemprop="name" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;Istvan Sipka&quot;,&quot;href&quot;:&quot;/Pistikukac&quot;,&quot;type&quot;:&quot;author&quot;,&quot;location&quot;:&quot;header&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}" href="https://www.hackster.io/Pistikukac"><?php if($res_pro[0]['teamname']) echo $res_pro[0]['teamname'];  ?></a>
									</li>
									<li>发布于
										<a data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;Everything ESP&quot;,&quot;href&quot;:&quot;/esp&quot;,&quot;type&quot;:&quot;channel&quot;,&quot;location&quot;:&quot;header&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}" href="https://www.hackster.io/esp"><?php if($res_pro[0]['']) echo $res_pro[0]['']; ?>平台</a>
									</li>
								</ul>
							</div>
							<div class="row project-teaser">
								<div class="col-md-7 col-md-offset-0-5 left-column">
									<div class="project-cover-image" itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject">
										<img alt="Alarm Cube for Greenhouse" src="<?php echo $pic ?>" title='项目图片'>
										<!-- <meta content="https://hackster.imgix.net/uploads/attachments/443818/_fLIXywx9WG.2Q%3D%3D?auto=compress%2Cformat&amp;w=900&amp;h=675&amp;fit=min" itemprop="url">
										<meta content="900" itemprop="width">
										<meta content="675" itemprop="height"> -->
									</div>
								</div>
								<div class="col-md-4 right-column">
									<div class="container-mobile">
										<section class="section-thumbs">
											<h4>关于这个项目</h4>
											<!-- 项目摘要 -->
											<p class="project-one-liner" itemprop="description"><?php if($res_pro[0]['post_excerpt']) echo $res_pro[0]['post_excerpt']; ?></p>
											<ul class="list-inline tags">
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
														<a class="project-difficulty text-warning" href="https://www.hackster.io/projects?difficulty=intermediate"><?php if($res_pro[0]['difficulty']) echo $res_pro[0]['difficulty']; ?></a>
													</div>
												</div>
												<div class="info-row">
													<div class="info-label">项目持续时间</div>
													<div class="info"><?php if($res_pro[0]['duration']) echo $res_pro[0]['duration'].'　小时'; ?></div>
												</div>
												<div class="info-row">
													<meta content="2018-03-04T15:07:09Z" itemprop="dateModified">
													<div class="info-label">发布时间</div>
													<div class="info" style="font-size:14px;" content="2018-03-03T23:32:09Z" itemprop="datePublished"><?php if($res_pro[0]['post_date']) echo $res_pro[0]['post_date']; ?>
													</div>
												</div>
												<div class="info-row">
													<meta content="2018-03-04T15:07:09Z" itemprop="dateModified">
													<div class="info-label">最新修改时间</div>
													<div class="info" content="2018-03-03T23:32:09Z" itemprop="datePublished"><?php if($res_pro[0]['post_modified']) echo $res_pro[0]['post_modified']; ?>
													</div>
												</div>
												<div class="info-row">
													<div class="info-label">执照</div>
													<div class="info">
														<a href="http://opensource.org/licenses/GPL-3.0" itemprop="license" target="_blank">
															<?php if($res_pro[0]['license']) echo $res_pro[0]['license']; ?>
														</a>
													</div>
												</div>
											</div>
										</section>
										<section class="section-thumbs" id="respects-section">
											<ul class="list-inline text-muted small project-stats-inline">
												<li class="impression-stats istooltip" itemprop="interactionStatistic" itemscope="" itemtype="http://schema.org/InteractionCounter" title="" data-original-title="Views"><link href="http://schema.org/ViewAction" itemprop="interactionType">
													<i class="fa fa-eye">点赞</i><span class="stat-figure" itemprop="userInteractionCount">347</span>
												</li>
												<li class="respect-stats istooltip" itemprop="interactionStatistic" itemscope="" itemtype="http://schema.org/InteractionCounter" onclick="Hster.Utils.summonGlobalDialog(RespectingUsersList, {isReactComponent: true, componentProps: {&quot;project&quot;:{&quot;hid&quot;:&quot;fab1c8&quot;,&quot;name&quot;:&quot;Alarm Cube for Greenhouse&quot;}}})" title="" data-original-title="Respects">
													<link href="http://schema.org/LikeAction" itemprop="interactionType"><i class="fa fa-thumbs-o-up">组成员</i><span class="stat-figure" itemprop="userInteractionCount">7</span>
												</li>
											</ul>
											<div class="respecting-faces" onclick="Hster.Utils.summonGlobalDialog(RespectingUsersList, {isReactComponent: true, componentProps: {&quot;project&quot;:{&quot;hid&quot;:&quot;fab1c8&quot;,&quot;name&quot;:&quot;Alarm Cube for Greenhouse&quot;}}})">
												<div class="user-img">
													<img alt="Adam Benzion" class="img-circle img-loader loaded" src="<?php bloginfo('template_url'); ?>/style/2015-09-21_02.38.58.png">
													<noscript>&lt;img alt="Adam Benzion" class="img-circle" src="https://hackster.imgix.net/uploads/avatar/file/78055/2015-09-21_02.38.58.png?auto=compress%2Cformat&amp;amp;w=30&amp;amp;h=30&amp;amp;fit=min" /&gt;</noscript>
												</div>
												<div class="user-img">
													<img alt="Jesper Lauritsen" class="img-circle img-loader loaded" src="<?php bloginfo('template_url'); ?>/style/e314455dff3d94278a5466a44bb84b71.png"><noscript>&lt;img alt="Jesper Lauritsen" class="img-circle" src="https://gravatar.com/avatar/e314455dff3d94278a5466a44bb84b71.png?d=retro&amp;amp;s=" /&gt;</noscript>
												</div>
												<div class="user-img">
													<img alt="Luz María Burgos M" class="img-circle load-error" src="<?php bloginfo('template_url'); ?>/style/transparent-ef1955ae757c8b966c83248350331bd3a30f658ced11f387f8ebf05ab3368629.gif"><noscript>&lt;img alt="Luz María Burgos M" class="img-circle" src="https://graph.facebook.com/v2.6/10157072509949989/picture?width=200&amp;amp;height=200" /&gt;</noscript>
												</div>
												<div class="user-img">
													<img alt="Stephen Harrison" class="img-circle img-loader loaded" src="<?php bloginfo('template_url'); ?>/style/d72a107fb9ad586df5259384f7b4f9e5.png"><noscript>&lt;img alt="Stephen Harrison" class="img-circle" src="https://gravatar.com/avatar/d72a107fb9ad586df5259384f7b4f9e5.png?d=retro&amp;amp;s=" /&gt;</noscript>
												</div>
												<div class="user-img">
													<img alt="Lukács József" class="img-circle load-error" src="<?php bloginfo('template_url'); ?>/style/transparent-ef1955ae757c8b966c83248350331bd3a30f658ced11f387f8ebf05ab3368629.gif"><noscript>&lt;img alt="Lukács József" class="img-circle" src="https://graph.facebook.com/v2.6/10211794784408595/picture?width=200&amp;amp;height=200" /&gt;</noscript>
												</div>
												<div class="user-img">
													<img alt="Max O" class="img-circle img-loader loaded" src="<?php bloginfo('template_url'); ?>/style/0f9ec2d2edffae177a74aabe842155f0.png"><noscript>&lt;img alt="Max O" class="img-circle" src="https://gravatar.com/avatar/0f9ec2d2edffae177a74aabe842155f0.png?d=retro&amp;amp;s=" /&gt;</noscript>
												</div>
												<div class="user-img">
													<img alt="Handono Sukmo" class="img-circle img-loader loaded" src="<?php bloginfo('template_url'); ?>/style/147b90ed74e682fcdee4f0e1f606724a.png"><noscript>&lt;img alt="Handono Sukmo" class="img-circle" src="https://gravatar.com/avatar/147b90ed74e682fcdee4f0e1f606724a.png?d=retro&amp;amp;s=" /&gt;</noscript>
												</div>
											</div>
										</section>
										<!-- 不显示尊重项目等等 -->
										<section class="section-thumbs" style="display:none">
											<div class="primary-action-container">
												<span data-react-class="ProjectRespectButton" data-react-props="{&quot;projectId&quot;:82007,&quot;redirect_to&quot;:&quot;/articles/fab1c8/respects/create&quot;,&quot;source&quot;:&quot;project_header&quot;}" data-hydrate="t">
													<button class="buttons__button__lYBnk project_respect_button__button__1LWAT" type="button" data-reactroot=""><span><i class="fa fa-thumbs-o-up"></i><span>Respect project</span></span></button>
												</span>
												<a class="btn btn-primary btn-sm show-replica-form" href="javascript:void(0)"><i class="fa fa-retweet"></i><span>I made one</span></a>
	      									</div>
	      									<div class="secondary-actions-container">
	      										<div data-react-class="ListsDropdown" data-react-props="{&quot;projectId&quot;:&quot;fab1c8&quot;,&quot;btnClass&quot;:&quot;btn-secondary&quot;,&quot;iconOnly&quot;:null}" class="react-btn" style="display:inline-block;">
	      											<div class="lists-dropdown">
	      												<a href="javascript:void(0)" class="btn btn-secondary btn-sm toggle-lists-btn"><i class="fa fa-bookmark-o"></i><span>Bookmark</span></a>
	      											</div>
	      										</div>
	      										<a class="btn btn-secondary btn-sm" data-container=".secondary-actions-container" data-content="&lt;div class=&#39;sharing-actions&#39;&gt;&lt;ul&gt;&lt;li&gt;&lt;a class=&#39;social-share-link clearfix&#39; data-url=&#39;https://www.hackster.io/social/share/link?service=facebook&amp;amp;sharable_id=82007&amp;amp;sharable_type=BaseArticle&amp;amp;target_host=www.hackster.io&#39; href=&#39;&#39;&gt;&lt;i class=&#39;fa fa-facebook&#39;&gt;&lt;/i&gt;&lt;span&gt;Share on Facebook&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a class=&#39;social-share-link clearfix&#39; data-url=&#39;https://www.hackster.io/social/share/link?service=googleplus&amp;amp;sharable_id=82007&amp;amp;sharable_type=BaseArticle&amp;amp;target_host=www.hackster.io&#39; href=&#39;&#39;&gt;&lt;i class=&#39;fa fa-google-plus-official&#39;&gt;&lt;/i&gt;&lt;span&gt;Share on Google+&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a class=&#39;social-share-link clearfix&#39; data-url=&#39;https://www.hackster.io/social/share/link?service=linkedin&amp;amp;sharable_id=82007&amp;amp;sharable_type=BaseArticle&amp;amp;target_host=www.hackster.io&#39; href=&#39;&#39;&gt;&lt;i class=&#39;fa fa-linkedin&#39;&gt;&lt;/i&gt;&lt;span&gt;Share on LinkedIn&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a class=&#39;social-share-link clearfix&#39; data-url=&#39;https://www.hackster.io/social/share/link?service=pinterest&amp;amp;sharable_id=82007&amp;amp;sharable_type=BaseArticle&amp;amp;target_host=www.hackster.io&#39; href=&#39;&#39;&gt;&lt;i class=&#39;fa fa-pinterest&#39;&gt;&lt;/i&gt;&lt;span&gt;Share on Pinterest&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a class=&#39;social-share-link clearfix&#39; data-url=&#39;https://www.hackster.io/social/share/link?service=reddit&amp;amp;sharable_id=82007&amp;amp;sharable_type=BaseArticle&amp;amp;target_host=www.hackster.io&#39; href=&#39;&#39;&gt;&lt;i class=&#39;fa fa-reddit&#39;&gt;&lt;/i&gt;&lt;span&gt;Share on Reddit&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a class=&#39;social-share-link clearfix&#39; data-url=&#39;https://www.hackster.io/social/share/link?service=twitter&amp;amp;sharable_id=82007&amp;amp;sharable_type=BaseArticle&amp;amp;target_host=www.hackster.io&#39; href=&#39;&#39;&gt;&lt;i class=&#39;fa fa-twitter&#39;&gt;&lt;/i&gt;&lt;span&gt;Share on Twitter&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a data-target=&#39;#embed-popup&#39; class=&#39;modal-open&#39; href=&#39;javascript:void(0)&#39;&gt;&lt;i class=&#39;fa fa-code&#39;&gt;&lt;/i&gt;&lt;span&gt;Embed&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;&lt;/ul&gt;&lt;/div&gt;" data-html="true" data-placement="bottom" data-toggle="popover" data-trigger="click" data-original-title="" title="">
	      											<i class="fa fa-share-square-o"></i><span>Share</span>
	      										</a>
	      										<a class="btn btn-secondary btn-sm show-feedback-form project-feedback-form" href="javascript:void(0)" style="display: inline;"><i class="fa fa-pencil-square-o"></i><span>Give feedback</span></a>
	      									</div>
	      								</section>
	      								<!-- 尊重项目等选择框结束 -->
	      							</div>
	      						</div>
	      					</div>
	      				</div>
	      			</div>
	      		</section>
      		<section class="section-description" itemprop="articleBody">
      			<div class="container">
      				<div class="row">
      					<div class="col-md-7 col-md-offset-0-5 left-column container-mobile">
      						<section class="section-container" id="things">
      							<h2 class="section-title"><a class="title-anchor" href="https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8?ref=featured#things"><i class="fa fa-link"></i></a><span class="title title-toggle">项目中使用的 硬/软件和工具</span>
      							</h2>
      							<div class="section-content">
      								<table class="sortable-table table table-hover fields-container parts-table">
	      								<tbody>
	      									<tr class="title">
	      										<td colspan="6"><strong>项目中的硬件:</strong></td>
	      									</tr>
	      									<?php 
	      									if(empty($res_thing)){
	      										echo "<tr class='fields part-row'><td>该项目组没有分享他们的硬件信息</td></tr>";
	      									}else{
		      									foreach($res_thing as $value){ ?>
		      									<tr class="fields part-row" id="part-9592">
		      										<td class="part-img"><img src="<?php if($value['pic']) echo $value['pic']; ?>" alt="Esp01"></td>
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
														<?php if($value['num']) echo $value['num']; else echo '1';?>
		      										</td>
		      										<td style="text-align:right;width:78px">
		      											<div class="btn-group">
		      												<a target="_blank" style="color:#333" rel="nofollow noopener" class="btn btn-sm btn-default" title="点击跳转购买" data-ha="{&quot;eventName&quot;:&quot;Clicked part buy link&quot;,&quot;customProps&quot;:{&quot;part_id&quot;:9592,&quot;link_id&quot;:19196,&quot;retailer_id&quot;:3,&quot;link_position&quot;:0}}" href="<?php if($res_thing[0]['shopurl']) echo $res_thing[0]['shopurl'] ?>">
		      													<i class="fa fa-shopping-cart"></i>
		      												</a>
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
									preg_match($pattern, $res_pro[0]['pro_url'], $str);
									$url = "http://player.youku.com/embed/".$str[1];//拼接视频窗口地址
								 ?>	
				      		<section class="section-container collapsed" id="about-project">
		      					<h2 class="section-title"><a class="title-anchor" href="https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8?ref=featured#about-project"><i class="fa fa-link"></i></a><span class="title title-toggle">项目演示</span></h2>
		      					<div class="embed-frame"><div class="figure youtube"><div class="figcaption embed-figcaption" data-contenteditable="true" data-default-text="Type in a caption" data-disable-toolbar="true"></div><div class="embed widescreen" contenteditable="false"><iframe width="100%" height="100%" src="<?php echo $url; ?>" frameborder="0" allowfullscreen=""></iframe></div></div></div>
		      				</section>
	      					<!-- ************************************************** -->
				      		<section class="section-container collapsed" id="info">
				      			<h2 class="section-title"><a class="title-anchor" href="https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8?ref=featured#info"><i class="fa fa-link"></i></a><span class="title title-toggle">项目过程1</span></h2>
				      			<!-- 项目详情 -->
				      			<?php echo $res_pro[0]['post_content'] ?>
				      			<div class="section-content hljs-active hljs-monokai" style="display:none">
				      				<div class="medium-editor" itemprop="text">
				      					<p></p>
				      					<div data-react-class="ImageCarousel" data-react-props="{&quot;images&quot;:[{&quot;caption&quot;:&quot;A visual BOM :)&quot;,&quot;id&quot;:440559,&quot;image_urls&quot;:{&quot;headline_url&quot;:&quot;https://hackster.imgix.net/uploads/attachments/440559/img_0308_yvQvX9pn2C.JPG?auto=compress%2Cformat\u0026w=680\u0026h=510\u0026fit=max&quot;,&quot;lightbox_url&quot;:&quot;https://hackster.imgix.net/uploads/attachments/440559/img_0308_yvQvX9pn2C.JPG?auto=compress%2Cformat\u0026w=1280\u0026h=960\u0026fit=max&quot;},&quot;position&quot;:0},{&quot;caption&quot;:&quot;&quot;,&quot;id&quot;:441779,&quot;image_urls&quot;:{&quot;headline_url&quot;:&quot;https://hackster.imgix.net/uploads/attachments/441779/img_0323_2Us9wpk3vU.JPG?auto=compress%2Cformat\u0026w=680\u0026h=510\u0026fit=max&quot;,&quot;lightbox_url&quot;:&quot;https://hackster.imgix.net/uploads/attachments/441779/img_0323_2Us9wpk3vU.JPG?auto=compress%2Cformat\u0026w=1280\u0026h=960\u0026fit=max&quot;},&quot;position&quot;:1}],&quot;uid&quot;:&quot;4472683a7c&quot;}" data-hydrate="t">
				      						<div data-reactroot="">
				      							<div class="image_carousel__container__hMJxn">
				      								<div class="image_carousel__wrapper__102VA" style="height: 425px; width: 638px;">
				      									<div class="image_carousel__navAreaLeft__1PU4a image_carousel__navArea__2Ef8D">
				      										<div class="image_carousel__hoverHighlightLeft__1S9h7 image_carousel__hoverHighlight__1YVDQ"><svg class="image_carousel__navArrowLeft__5F8Rp image_carousel__navArrow__310yF" viewBox="0 0 15 26" width="15px" height="15px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polyline stroke="" stroke-width="3" fill="none" points="1 1 13 13.0299571 1 25"></polyline>;</svg>
				      										</div>
				      									</div>
				      									<div class="image_carousel__navAreaRight__2Fd8H image_carousel__navArea__2Ef8D">
				      										<div class="image_carousel__hoverHighlightRight__2MeJj image_carousel__hoverHighlight__1YVDQ">
				      											<svg class="image_carousel__navArrowRight__HvDjb image_carousel__navArrow__310yF" viewBox="0 0 15 26" width="15px" height="15px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polyline stroke="" stroke-width="3" fill="none" points="1 1 13 13.0299571 1 25"></polyline>;</svg>
				      										</div>
				      									</div>
				      									<div class="image_carousel__scrollContainer__3mmPE ">
				      										<div class="image_carousel__imageContainer__22WPm">
				      											<div class="image_carousel__imageWrapper__39AG2"><i class="fa fa-circle-o-notch fa-spin"></i>
				      											</div>
				      										</div>
				      										<div class="image_carousel__imageContainer__22WPm">
				      											<div class="image_carousel__imageWrapper__39AG2"><img class="image_carousel__image__2-CjO " src="<?php bloginfo('template_url'); ?>/style/img_0308_yvQvX9pn2C.JPG">
				      											</div>
				      										</div>
				      										<div class="image_carousel__imageContainer__22WPm">
				      											<div class="image_carousel__imageWrapper__39AG2"><i class="fa fa-circle-o-notch fa-spin"></i>
				      											</div>
				      										</div>
				      									</div>
				      								</div>
				      								<div class="image_carousel__caption__2sZrD">
				      									<span>1 / 2</span><span> • </span><span>A visual BOM :)</span>
				      								</div>
				      							</div>
				      							<div></div>
				      						</div>
				      					</div>
				      					<p>
				      						<span>Continuing the series of Cube(s) for Greenhouse (</span><a href="https://www.hackster.io/Pistikukac/climate-cube-for-greenhouse-384dd8" rel="nofollow" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;Climate Cube for Greenhouse&quot;,&quot;href&quot;:&quot;https://www.hackster.io/Pistikukac/climate-cube-for-greenhouse-384dd8&quot;,&quot;type&quot;:&quot;story&quot;,&quot;location&quot;:&quot;story&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}">Climate Cube for Greenhouse</a><span>, </span><a href="https://www.hackster.io/Pistikukac/iot-cube-for-greenhouse-a2ba6a" rel="nofollow" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;IoT Cube for Greenhouse&quot;,&quot;href&quot;:&quot;https://www.hackster.io/Pistikukac/iot-cube-for-greenhouse-a2ba6a&quot;,&quot;type&quot;:&quot;story&quot;,&quot;location&quot;:&quot;story&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}">IoT Cube for Greenhouse</a><span>) it is time now to place some safety stuff around.</span>
				      					</p>
				      					<h3 id="toc-the-past-0"><a class="title-anchor" href="https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8?ref=featured#toc-the-past-0" rel="nofollow" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:null,&quot;href&quot;:&quot;#toc-the-past-0&quot;,&quot;type&quot;:&quot;story&quot;,&quot;location&quot;:&quot;story&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}"><i class="fa fa-link"></i></a><span>The Past</span></h3>
				      					<p>Since we use lots of electric things (for example high pressure water pump, solenoid valves, electric valves, etc.) for production of green pepper, in every single year it happens when suddenly the water pipe line stops serving water. Of course it usually stops mid summer, mid day when irrigation is the most needed. It would not be a problem if we were using real soil for production. But we use coir based growing mediums and those have only a few hours of water buffer effects. Meaning one day without irrigation can end the session or turns plant growing into generative way. So somehow we should know when the stop happens to know how many water we have to replace later.</p>
				      					<h3 id="toc-the-present-1"><a class="title-anchor" href="https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8?ref=featured#toc-the-present-1" rel="nofollow" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:null,&quot;href&quot;:&quot;#toc-the-present-1&quot;,&quot;type&quot;:&quot;story&quot;,&quot;location&quot;:&quot;story&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}"><i class="fa fa-link"></i></a><span>The Present</span></h3>
				      					<div data-react-class="ImageCarousel" data-react-props="{&quot;images&quot;:[{&quot;caption&quot;:&quot;&quot;,&quot;id&quot;:441775,&quot;image_urls&quot;:{&quot;headline_url&quot;:&quot;https://hackster.imgix.net/uploads/attachments/441775/img_20180228_083326_THHVuoefqH.jpg?auto=compress%2Cformat\u0026w=680\u0026h=510\u0026fit=max&quot;,&quot;lightbox_url&quot;:&quot;https://hackster.imgix.net/uploads/attachments/441775/img_20180228_083326_THHVuoefqH.jpg?auto=compress%2Cformat\u0026w=1280\u0026h=960\u0026fit=max&quot;},&quot;position&quot;:0}],&quot;uid&quot;:&quot;e8fcabadb9&quot;}" data-hydrate="t">
				      						<div data-reactroot="">
				      							<div class="image_carousel__container__hMJxn">
				      								<div class="image_carousel__wrapper__102VA" style="height: 478px; width: 638px;">
				      									<div class="image_carousel__scrollContainer__3mmPE ">
				      										<div class="image_carousel__imageContainer__22WPm">
				      											<div class="image_carousel__imageWrapper__39AG2">
				      												<img class="image_carousel__image__2-CjO " src="<?php bloginfo('template_url'); ?>/style/img_20180228_083326_THHVuoefqH.jpg">
				      											</div>
				      										</div>
				      									</div>
				      								</div>
				      							</div>
				      							<div></div>
				      						</div>
				      					</div>
				      					<p>In the picture above you can see the central irrigation system. Above through that 63mm wide PE pipe we get the water for irrigation. In this pipe the standard pressure is around 6 bars. When service of water stops, pressure lowers in the pipe so putting around it a pressure switch can signal me (picture below).</p>
				      					<div data-react-class="ImageCarousel" data-react-props="{&quot;images&quot;:[{&quot;caption&quot;:&quot;Top of the pic is the main water pipe. Bottom of it shows the pressure switch.&quot;,&quot;id&quot;:441778,&quot;image_urls&quot;:{&quot;headline_url&quot;:&quot;https://hackster.imgix.net/uploads/attachments/441778/img_20180228_083340_sqLdjo1NEZ.jpg?auto=compress%2Cformat\u0026w=680\u0026h=510\u0026fit=max&quot;,&quot;lightbox_url&quot;:&quot;https://hackster.imgix.net/uploads/attachments/441778/img_20180228_083340_sqLdjo1NEZ.jpg?auto=compress%2Cformat\u0026w=1280\u0026h=960\u0026fit=max&quot;},&quot;position&quot;:0}],&quot;uid&quot;:&quot;cd29459754&quot;}" data-hydrate="t">
				      						<div data-reactroot="">
				      							<div class="image_carousel__container__hMJxn">
				      								<div class="image_carousel__wrapper__102VA" style="height: 510px; width: 638px;">
				      									<div class="image_carousel__scrollContainer__3mmPE ">
				      										<div class="image_carousel__imageContainer__22WPm">
				      											<div class="image_carousel__imageWrapper__39AG2">
				      												<img class="image_carousel__image__2-CjO " src="<?php bloginfo('template_url'); ?>/style/img_20180228_083340_sqLdjo1NEZ.jpg">
				      											</div>
				      										</div>
				      									</div>
				      								</div>
				      								<div class="image_carousel__caption__2sZrD">
				      									<span></span>
				      									<span>Top of the pic is the main water pipe. Bottom of it shows the pressure switch.</span>
				      								</div>
				      							</div>
				      							<div></div>
				      						</div>
				      					</div>
				      					<p></p>
				      					<div data-react-class="ImageCarousel" data-react-props="{&quot;images&quot;:[{&quot;caption&quot;:&quot;&quot;,&quot;id&quot;:440902,&quot;image_urls&quot;:{&quot;headline_url&quot;:&quot;https://hackster.imgix.net/uploads/attachments/440902/img_20180216_111526_ZXAzL0dqtb.jpg?auto=compress%2Cformat\u0026w=680\u0026h=510\u0026fit=max&quot;,&quot;lightbox_url&quot;:&quot;https://hackster.imgix.net/uploads/attachments/440902/img_20180216_111526_ZXAzL0dqtb.jpg?auto=compress%2Cformat\u0026w=1280\u0026h=960\u0026fit=max&quot;},&quot;position&quot;:0}],&quot;uid&quot;:&quot;f204a258c2&quot;}" data-hydrate="t">
				      						<div data-reactroot=""><div class="image_carousel__container__hMJxn">
				      							<div class="image_carousel__wrapper__102VA" style="height: 510px; width: 638px;">
				      								<div class="image_carousel__scrollContainer__3mmPE ">
				      									<div class="image_carousel__imageContainer__22WPm">
				      										<div class="image_carousel__imageWrapper__39AG2">
				      											<img class="image_carousel__image__2-CjO " src="<?php bloginfo('template_url'); ?>/style/img_20180216_111526_ZXAzL0dqtb.jpg">
				      										</div>
				      									</div>
				      								</div>
				      							</div>
				      						</div>
				      						<div></div>
				      					</div>
				      				</div>
				      				<p>I put the Alarm Cube into the metal box of the irrigation system. The wires from the pressure switch closes a 24VAC coil of a relay. This relay has an NO (normally open) state end which closes a circuit going into the Alarm Cube via an optocoupler (see the below picture for circuit details):</p>
				      				<div data-react-class="ImageCarousel" data-react-props="{&quot;images&quot;:[{&quot;caption&quot;:&quot;&quot;,&quot;id&quot;:443802,&quot;image_urls&quot;:{&quot;headline_url&quot;:&quot;https://hackster.imgix.net/uploads/attachments/443802/alarmcube02_bb_I8XFkjGTXP.jpg?auto=compress%2Cformat\u0026w=680\u0026h=510\u0026fit=max&quot;,&quot;lightbox_url&quot;:&quot;https://hackster.imgix.net/uploads/attachments/443802/alarmcube02_bb_I8XFkjGTXP.jpg?auto=compress%2Cformat\u0026w=1280\u0026h=960\u0026fit=max&quot;},&quot;position&quot;:0}],&quot;uid&quot;:&quot;94495e180e&quot;}" data-hydrate="t">
				      					<div data-reactroot="">
				      						<div class="image_carousel__container__hMJxn">
				      							<div class="image_carousel__wrapper__102VA" style="height: 299px; width: 638px;">
				      								<div class="image_carousel__scrollContainer__3mmPE ">
				      									<div class="image_carousel__imageContainer__22WPm">
				      										<div class="image_carousel__imageWrapper__39AG2">
				      											<img class="image_carousel__image__2-CjO " src="<?php bloginfo('template_url'); ?>/style/alarmcube02_bb_I8XFkjGTXP.jpg">
				      										</div>
				      									</div>
				      								</div>
				      							</div>
				      						</div>
				      						<div></div>
				      					</div>
				      				</div>
				      				<p>To 'visualise' the current condition of water pressure a red LED just connected to the GPIO 0 pin of the esp. It will blink rapidly if no water available and can be recognised by someone who just simply passes by :).  </p>
				      				<div data-react-class="ImageCarousel" data-react-props="{&quot;images&quot;:[{&quot;caption&quot;:&quot;When pressure switch closes the circuit the LED activates&quot;,&quot;id&quot;:440893,&quot;image_urls&quot;:{&quot;headline_url&quot;:&quot;https://hackster.imgix.net/uploads/attachments/440893/img_0314_s8tjTPrfdZ.JPG?auto=compress%2Cformat\u0026w=680\u0026h=510\u0026fit=max&quot;,&quot;lightbox_url&quot;:&quot;https://hackster.imgix.net/uploads/attachments/440893/img_0314_s8tjTPrfdZ.JPG?auto=compress%2Cformat\u0026w=1280\u0026h=960\u0026fit=max&quot;},&quot;position&quot;:0}],&quot;uid&quot;:&quot;387a6e99a7&quot;}" data-hydrate="t">
				      					<div data-reactroot="">
				      						<div class="image_carousel__container__hMJxn">
					      						<div class="image_carousel__wrapper__102VA" style="height: 425px; width: 638px;">
					      							<div class="image_carousel__scrollContainer__3mmPE ">
					      								<div class="image_carousel__imageContainer__22WPm">
						      								<div class="image_carousel__imageWrapper__39AG2">
						      									<img class="image_carousel__image__2-CjO " src="<?php bloginfo('template_url'); ?>/style/img_0314_s8tjTPrfdZ.JPG">
						      								</div>
					      								</div>
					      							</div>
					      						</div>
				      							<div class="image_carousel__caption__2sZrD">
				      								<span></span><span>When pressure switch closes the circuit the LED activates</span>
				      							</div>
				      						</div>
				      						<div></div>
				      					</div>
				      				</div>
				      				<p>
				      					<span>To communicate with PC using USB there is a need for the FTDI chip based board. If you look at the wiring diagram you can see that i put a dpdt type switch. It switches between the two states of normal RUN mode and firmware UPDATE mode. (</span>
				      					<a href="https://arduino-esp8266.readthedocs.io/en/latest/boards.html#generic-esp8266-module" rel="nofollow" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;ESP8266 details about pin outs&quot;,&quot;href&quot;:&quot;https://arduino-esp8266.readthedocs.io/en/latest/boards.html#generic-esp8266-module&quot;,&quot;type&quot;:&quot;story&quot;,&quot;location&quot;:&quot;story&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}">ESP8266 details about pin outs</a>
				      					<span>). Plus this switch not only pulls pins into the needed state but disconnects ground of the uart board. </span>
				      				</p>
				      				<p>
				      					<span>Little sidetrack. </span>
				      					<em>(There is a step-by-step process on how to upgrade firmware</em>
				      					<span> </span>
				      					<em>and</em>
				      					<span> </span>
				      					<em>debug</em>
				      					<span> </span>
				      					<em>it</em>
				      					<span> </span>
				      					<em>later. Switch</em>
				      					<span> </span>
				      					<em>off</em>
				      					<span> </span>
				      					<em>Alarm</em>
				      					<span> </span>
				      					<em>Cube</em>
				      					<span> </span>
				      					<em>then switch into upgrade mode where (as can be seen on diagram) GPIO 00 gets low state and uart board gets its ground connected. Connect</em>
				      					<span> </span>
				      					<em>USB</em>
				      					<span> </span>
				      					<em>cable,switch</em>
				      					<span> </span>
				      					<em>on</em>
				      					<span> </span>
				      					<em>the</em>
				      					<span> </span>
				      					<em>Cube,</em>
				      					<span> </span>
				      					<em>do the upgrade</em>
				      					<span> </span>
				      					<em>and</em>
				      					<span> </span>
				      					<em>switch</em>
				      					<span> </span>
				      					<em>off. Then you switch back to normal RUN mode, power the CUBE, and after then switch back into upgrade mode so the uart board become a part of the circuit and you can debug through USB.)</em>
				      				</p>
				      				<h3 id="toc-battery-powered-alarm-cube-2">
				      					<a class="title-anchor" href="https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8?ref=featured#toc-battery-powered-alarm-cube-2" rel="nofollow" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:null,&quot;href&quot;:&quot;#toc-battery-powered-alarm-cube-2&quot;,&quot;type&quot;:&quot;story&quot;,&quot;location&quot;:&quot;story&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}"><i class="fa fa-link"></i></a><span>Battery Powered Alarm Cube</span>
				      				</h3>
				      				<div data-react-class="ImageCarousel" data-react-props="{&quot;images&quot;:[{&quot;caption&quot;:&quot;&quot;,&quot;id&quot;:440929,&quot;image_urls&quot;:{&quot;headline_url&quot;:&quot;https://hackster.imgix.net/uploads/attachments/440929/img_0312_sVSSRiStcz.JPG?auto=compress%2Cformat\u0026w=680\u0026h=510\u0026fit=max&quot;,&quot;lightbox_url&quot;:&quot;https://hackster.imgix.net/uploads/attachments/440929/img_0312_sVSSRiStcz.JPG?auto=compress%2Cformat\u0026w=1280\u0026h=960\u0026fit=max&quot;},&quot;position&quot;:0},{&quot;caption&quot;:&quot;&quot;,&quot;id&quot;:440931,&quot;image_urls&quot;:{&quot;headline_url&quot;:&quot;https://hackster.imgix.net/uploads/attachments/440931/img_0316_NZkhsXarS1.JPG?auto=compress%2Cformat\u0026w=680\u0026h=510\u0026fit=max&quot;,&quot;lightbox_url&quot;:&quot;https://hackster.imgix.net/uploads/attachments/440931/img_0316_NZkhsXarS1.JPG?auto=compress%2Cformat\u0026w=1280\u0026h=960\u0026fit=max&quot;},&quot;position&quot;:1},{&quot;caption&quot;:&quot;&quot;,&quot;id&quot;:440932,&quot;image_urls&quot;:{&quot;headline_url&quot;:&quot;https://hackster.imgix.net/uploads/attachments/440932/img_0321_w1OaJH5ZFg.JPG?auto=compress%2Cformat\u0026w=680\u0026h=510\u0026fit=max&quot;,&quot;lightbox_url&quot;:&quot;https://hackster.imgix.net/uploads/attachments/440932/img_0321_w1OaJH5ZFg.JPG?auto=compress%2Cformat\u0026w=1280\u0026h=960\u0026fit=max&quot;},&quot;position&quot;:2}],&quot;uid&quot;:&quot;449a9507f6&quot;}" data-hydrate="t">
				      					<div data-reactroot="">
				      						<div class="image_carousel__container__hMJxn">
					      						<div class="image_carousel__wrapper__102VA" style="height: 425px; width: 638px;">
					      							<div class="image_carousel__navAreaLeft__1PU4a image_carousel__navArea__2Ef8D">
					      								<div class="image_carousel__hoverHighlightLeft__1S9h7 image_carousel__hoverHighlight__1YVDQ">
					      									<svg class="image_carousel__navArrowLeft__5F8Rp image_carousel__navArrow__310yF" viewBox="0 0 15 26" width="15px" height="15px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polyline stroke="" stroke-width="3" fill="none" points="1 1 13 13.0299571 1 25"></polyline>;</svg>
					      								</div>
					      							</div>
					      							<div class="image_carousel__navAreaRight__2Fd8H image_carousel__navArea__2Ef8D">
					      								<div class="image_carousel__hoverHighlightRight__2MeJj image_carousel__hoverHighlight__1YVDQ">
					      									<svg class="image_carousel__navArrowRight__HvDjb image_carousel__navArrow__310yF" viewBox="0 0 15 26" width="15px" height="15px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polyline stroke="" stroke-width="3" fill="none" points="1 1 13 13.0299571 1 25"></polyline>;</svg>
					      								</div>
					      							</div>
					      							<div class="image_carousel__scrollContainer__3mmPE ">
					      								<div class="image_carousel__imageContainer__22WPm">
					      									<div class="image_carousel__imageWrapper__39AG2"><i class="fa fa-circle-o-notch fa-spin"></i>
					      									</div>
					      								</div>
					      								<div class="image_carousel__imageContainer__22WPm">
					      									<div class="image_carousel__imageWrapper__39AG2">
					      										<img class="image_carousel__image__2-CjO " src="<?php bloginfo('template_url'); ?>/style/img_0312_sVSSRiStcz.JPG">
					      									</div>
					      								</div>
					      								<div class="image_carousel__imageContainer__22WPm">
					      									<div class="image_carousel__imageWrapper__39AG2">
					      										<i class="fa fa-circle-o-notch fa-spin"></i>
					      									</div>
					      								</div>
					      							</div>
					      						</div>
				      							<div class="image_carousel__caption__2sZrD"><span>1 / 3</span><span></span></div>
				      						</div>
				      						<div></div>
				      					</div>
				      				</div>
				      				<p>Hesitated a few days to use battery for this project but in the end I decided to lets have one. Actually there could be many reasons stopping central water service and what if the one is when there is no electricity.</p>
				      				<p>The tricky part was the LDO vreg. itself. The MICROCHIP has many types like the MCP1701 and ..03. Analog Devices also have many types like the ADP122 but it has not got that prefboard friendly TO-92 socket... Lets shorten the story, with the MCP1700 and that 2000 mAh battery and charger/batt. protection board the Alarm Cube can operate one day connected to IoT Cube and doing continuous uploadings. That is far enough for me and was a hard test.</p>
				      				<h3 id="toc-the-code-running-on-the-alarm-cube-3">
				      					<a class="title-anchor" href="https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8?ref=featured#toc-the-code-running-on-the-alarm-cube-3" rel="nofollow" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:null,&quot;href&quot;:&quot;#toc-the-code-running-on-the-alarm-cube-3&quot;,&quot;type&quot;:&quot;story&quot;,&quot;location&quot;:&quot;story&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}"><i class="fa fa-link"></i></a><span>The Code Running on the Alarm Cube</span>
				      				</h3>
				      				<p>Basically it is so simple that it only deserves one sentence. When water service (or mains) stops the GPIO 02 gets into LOW state and the program loop starts to blinking the LED and connects to the IoT Cube wifi network sending thingspeak channel a 1 value which then will be used by a thingspeak phone app to send an alarm signal to my ears when... sunbathing at a beach. :)</p>
				      				<h3 id="toc-more-to-come---4">
				      					<a class="title-anchor" href="https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8?ref=featured#toc-more-to-come---4" rel="nofollow" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:null,&quot;href&quot;:&quot;#toc-more-to-come---4&quot;,&quot;type&quot;:&quot;story&quot;,&quot;location&quot;:&quot;story&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}"><i class="fa fa-link"></i></a><span>More to Come...</span>
				      				</h3>
				      				<p>Next Cube project for Greenhouse going to be the Weight Cube for Greenhouse where... :)</p>
				      			</div>
				      		</div>
				      		<div class="read-more" style="display:none">
				      			<a class="btn btn-primary" href="javascript:void(0)">Read more</a>
				      		</div>
	      					</section>
					      	<section class="section-container" id="schematics">
					      		<a name="#schematics"></a>
					      		<h2 class="section-title"><a class="title-anchor" href="https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8?ref=featured#schematics"><i class="fa fa-link"></i></a><span class="title title-toggle">原理图 </span></h2>
					      		<div class="section-content">
					      			<div class="repository">
					      				<div class="button-content-container">
					      					<div class="button-content">
					      						<h5>项目原理图</h5>
					      						<div class="buttons" style="display:none">
					      							<a class="btn btn-primary btn-sm" href="<?php bloginfo('url');echo '/wp-content/'.$v['path']?>">下载 </a>
					      						</div>
					      					</div>
					      				</div>
					      				<?php
				      						if($res_ylt){
				      							foreach($res_ylt as $v){
				      					?>
						      				<div class="embed original">
						      					<img src="<?php bloginfo('url');echo '/wp-content/'.$v['path']?>" alt="Alarmcube02 schem qyvr3gleot">
						      				</div>
						      			<?php }} ?>
					      			</div>
					      		</div>
					      	</section>
					      	<section class="section-container" id="cad">
					      		<a name="#cad"></a>
					      		<h2 class="section-title"><a class="title-anchor" href="https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8?ref=featured#cad"><i class="fa fa-link"></i></a><span class="title title-toggle">CAD图 </span></h2>
					      		<div class="section-content">
					      			<div class="repository">
					      				<div class="button-content-container">
					      					<div class="button-content">
					      						<h5>项目CAD图</h5>
					      						<div class="buttons" style="display:none">
					      							<a class="btn btn-primary btn-sm" href="<?php bloginfo('url');echo '/wp-content/'.$v['path']?>">下载 </a>
					      						</div>
					      					</div>
					      				</div>
					      				<?php
				      						if($res_cad){
				      							foreach($res_cad as $v){
				      					?>
						      				<div class="embed original">
						      					<img src="<?php bloginfo('url');echo '/wp-content/'.$v['path']?>" alt="Alarmcube02 schem qyvr3gleot">
						      				</div>
						      			<?php }} ?>
					      			</div>
					      		</div>
					      	</section>
					      	<section class="section-container" id="code">
					      		<h2 class="section-title">
					      			<a class="title-anchor" href="https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8?ref=featured#code"><i class="fa fa-link"></i></a><span class="title title-toggle">项目关键代码 </span>
					      		</h2>
					      		<!-- ********************************************* -->
					      		<div class="section-content">
					      			<div class="repository">
					      				<div class="button-content-container">
					      					<div class="button-content">
					      						<h5>项目代码图</h5>
					      						<div class="buttons" style="display:none">
					      							<a class="btn btn-primary btn-sm" href="<?php bloginfo('url');echo '/wp-content/'.$v['path']?>">下载 </a>
					      						</div>
					      					</div>
					      				</div>
					      				<?php
				      						if($res_code){
				      							foreach($res_code as $v){
				      					?>
						      				<div class="embed original">
						      					<img src="<?php bloginfo('url');echo '/wp-content/'.$v['path']?>" alt="Alarmcube02 schem qyvr3gleot">
						      				</div>
						      			<?php }} ?>
					      			</div>
					      		</div>
					      		<!-- ********************************************* -->
					      		<div class="section-content">
					      			<div class="code-widgets single-file ">
					      				<div class="sidebar">
					      					<ul>
					      						<li>
					      							<a data-target="#code-widget-172409" class="active" href="javascript:void(0)">alarmcube02hackster.ino</a>
					      						</li>
					      					</ul>
					      				</div>
					      				<div class="preview-container">
					      					<div class="preview-pane active" id="code-widget-172409">
					      						<div class="preview-header">
					      							<div class="clearfix">
					      								<h5>关键代码名称(如***.php,需要录入数据库)<small>Arduino</small></h5>
					      								<div class="buttons btn-group btn-group-default">
					      									<button class="btn btn-primary btn-xs copy-code istooltip" data-container="body" data-trigger="hover" title="" data-original-title="复制代码"><i class="fa fa-clipboard"></i></button>
					      									<a class="btn btn-primary btn-xs" data-container="body" href="https://www.hackster.io/code_files/172409/download" rel="tooltip" title="" data-original-title="下载"><i class="fa fa-cloud-download"></i></a>
					      								</div>
					      							</div>
					      						</div>
					      						<div class="preview-body pygments-syntax arduino" style="height: 459px;">
					      							<div class="highlight">
					      								<pre>
					      									<span></span>
					      									<span id="line-1">
					      										<span class="c1">#include &lt;ESP8266WiFi.h&gt;</span>
															</span>
															<span id="line-2">
																<span class="c1">#include "ThingSpeak.h"</span>
															</span>
															<span id="line-3">
																<span class="c1">#include &lt;Metro.h&gt;</span>
															</span>
															<span id="line-4"></span>
															<span id="line-5">unsigned long 
																<span class="nv">myChannelNumber</span> 
																<span class="o">=</span> <span class="s2">"*****"</span>
																<span class="p">;</span>
															</span>
															<span id="line-6">const char * 
																<span class="nv">myWriteAPIKey</span> 
																<span class="o">=</span> 
																<span class="s2">"******"</span>
																<span class="p">;</span>
															</span>
															<span id="line-7"></span>
															<span id="line-8">const long 
																<span class="nv">ThingspeakDelay</span> 
																<span class="o">=</span> 
																<span class="m">300000</span>
																<span class="p">;</span> //waits 
																<span class="m">5</span> minutes between uploading status
															</span>
															<span id="line-9">const int 
																<span class="nv">blinkValue</span> 
																<span class="o">=</span> <span class="m">300</span><span class="p">;</span>
															</span>
															<span id="line-10">const int 
																<span class="nv">timeValue</span> <span class="o">=</span> <span class="m">2000</span><span class="p">;</span>
															</span>
															<span id="line-11">const long 
																<span class="nv">checkValue</span> <span class="o">=</span> <span class="m">3600000</span><span class="p">;</span> //1 hour
															</span>
															<span id="line-12">
															</span>
															<span id="line-13">Metro 
																<span class="nv">upload</span> <span class="o">=</span> Metro<span class="o">(</span>ThingspeakDelay<span class="o">)</span><span class="p">;</span>
															</span>
															<span id="line-14">Metro 
																<span class="nv">ledBlink</span> <span class="o">=</span> Metro<span class="o">(</span>blinkValue<span class="o">)</span><span class="p">;</span>
															</span>
															<span id="line-15">Metro 
																<span class="nv">statusTime</span> <span class="o">=</span> Metro<span class="o">(</span>timeValue<span class="o">)</span><span class="p">;</span>
															</span>
															<span id="line-16">Metro 
																<span class="nv">checkTime</span> <span class="o">=</span> Metro<span class="o">(</span>checkValue<span class="o">)</span><span class="p">;</span>
															</span>
															<span id="line-17">
															</span><span id="line-18">
															</span><span id="line-19">
															</span><span id="line-20">const char* 
																<span class="nv">ssid</span>     
																<span class="o">=</span> 
																<span class="s2">"************"</span>
																<span class="p">;</span>
															</span>
															<span id="line-21">const char* 
																<span class="nv">password</span> <span class="o">=</span> <span class="s2">"************"</span><span class="p">;</span>
															</span>
															<span id="line-22">int 
																<span class="nv">status</span> <span class="o">=</span> WL_IDLE_STATUS<span class="p">;</span>
															</span>
															<span id="line-23">WiFiClient client
																<span class="p">;</span>
															</span>
															<span id="line-24">
															</span>
															<span id="line-25">//pin numbers:
															</span>
															<span id="line-26">const int 
																<span class="nv">pressureSwitch</span> <span class="o">=</span> <span class="m">2</span><span class="p">;</span>     
															</span>
															<span id="line-27">const int 
																<span class="nv">ledPin</span> <span class="o">=</span> <span class="m">0</span><span class="p">;</span>
															</span>
															<span id="line-28"></span>
															<span id="line-29"></span>
															<span id="line-30">int 
																<span class="nv">switchState</span> <span class="o">=</span>HIGH<span class="p">;</span>         // variable <span class="k">for</span> reading the pressure switch
															</span>
															<span id="line-31">int 
																<span class="nv">ledState</span> <span class="o">=</span>LOW<span class="p">;</span>          // An ON status <span class="k">for</span> LED
															</span>
															<span id="line-32">int <span class="nv">TempcheckTime</span> <span class="o">=</span> LOW<span class="p">;</span>    //
															</span><span id="line-33">
															</span><span id="line-34">void setup<span class="o">()</span> <span class="o">{</span>
															</span><span id="line-35">  
															</span><span id="line-36">  pinMode<span class="o">(</span>ledPin, OUTPUT<span class="o">)</span><span class="p">;</span>
															</span><span id="line-37">  pinMode<span class="o">(</span>pressureSwitch, INPUT<span class="o">)</span><span class="p">;</span>
															</span><span id="line-38">  Serial.begin<span class="o">(</span><span class="m">9600</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-39">  delay<span class="o">(</span><span class="m">10</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-40">  ThingSpeak.begin<span class="o">(</span>client<span class="o">)</span><span class="p">;</span>
															</span><span id="line-41">  
															</span><span id="line-42">  Serial.println<span class="o">()</span><span class="p">;</span>
															</span><span id="line-43">  Serial.println<span class="o">()</span><span class="p">;</span>
															</span><span id="line-44">  Serial.print<span class="o">(</span><span class="s2">"Connecting to "</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-45">  Serial.println<span class="o">(</span>ssid<span class="o">)</span><span class="p">;</span>
															</span><span id="line-46">  
															</span><span id="line-47">  
															</span><span id="line-48">  WiFi.mode<span class="o">(</span>WIFI_STA<span class="o">)</span><span class="p">;</span>
															</span><span id="line-49">  WiFi.disconnect<span class="o">(</span><span class="nb">true</span><span class="o">)</span><span class="p">;</span>  // Erases SSID/password
															</span><span id="line-50">  WiFi.setPhyMode<span class="o">(</span>WIFI_PHY_MODE_11B<span class="o">)</span><span class="p">;</span>
															</span><span id="line-51">  WiFi.begin<span class="o">(</span>ssid, password<span class="o">)</span><span class="p">;</span>
															</span><span id="line-52">  int <span class="nv">tries</span> <span class="o">=</span> <span class="m">0</span><span class="p">;</span>
															</span><span id="line-53">  <span class="k">while</span> <span class="o">(</span>WiFi.status<span class="o">()</span> !<span class="o">=</span> WL_CONNECTED <span class="o">&amp;&amp;</span> tries &lt; <span class="m">20</span><span class="o">)</span> <span class="o">{</span>
															</span><span id="line-54">    Serial.print<span class="o">(</span><span class="s2">"Connecting due to checking: "</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-55">        Serial.println<span class="o">(</span>ssid<span class="o">)</span><span class="p">;</span>
															</span><span id="line-56">    // <span class="nb">wait</span> <span class="m">10</span> seconds <span class="k">for</span> connection:
															</span><span id="line-57">    delay<span class="o">(</span><span class="m">500</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-58">    tries++<span class="p">;</span>
															</span><span id="line-59">  <span class="o">}</span>
															</span><span id="line-60">  Serial.println<span class="o">(</span><span class="s2">""</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-61">  Serial.println<span class="o">(</span><span class="s2">"WiFi connected"</span><span class="o">)</span><span class="p">;</span> 
															</span><span id="line-62">  digitalWrite<span class="o">(</span>ledPin, ledState<span class="o">)</span><span class="p">;</span> 
															</span><span id="line-63">  Serial.println<span class="o">(</span><span class="s2">"IP address: "</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-64">  Serial.println<span class="o">(</span>WiFi.localIP<span class="o">())</span><span class="p">;</span>
															</span><span id="line-65">  long <span class="nv">rssi</span> <span class="o">=</span> WiFi.RSSI<span class="o">()</span><span class="p">;</span>
															</span><span id="line-66">  Serial.print<span class="o">(</span><span class="s2">"signal strength (RSSI):"</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-67">  Serial.println<span class="o">(</span>rssi<span class="o">)</span><span class="p">;</span>
															</span><span id="line-68">  int <span class="nv">switchState</span> <span class="o">=</span> digitalRead<span class="o">(</span>pressureSwitch<span class="o">)</span><span class="p">;</span>
															</span><span id="line-69">  Serial.println<span class="o">(</span><span class="s2">"Pressure state is: "</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-70">  Serial.println<span class="o">(</span>switchState<span class="o">)</span><span class="p">;</span>
															</span><span id="line-71">  <span class="k">if</span> <span class="o">(</span><span class="nv">switchState</span> <span class="o">=</span> LOW<span class="o">){</span>
															</span><span id="line-72">  Serial.print<span class="o">(</span><span class="s2">"Uploading to ThingSpeak the current state of pressure switch."</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-73">  ThingSpeak.writeField<span class="o">(</span>myChannelNumber, <span class="m">1</span>, switchState, myWriteAPIKey<span class="o">)</span><span class="p">;</span>
															</span><span id="line-74">  Serial.print<span class="o">(</span><span class="s2">"Upload is complete"</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-75">  <span class="o">}</span>
															</span><span id="line-76">  WiFi.disconnect<span class="o">(</span><span class="nb">true</span><span class="o">)</span><span class="p">;</span>  // Erases SSID/password
															</span><span id="line-77">  Serial.println<span class="o">(</span><span class="s2">"Wifi disconnected"</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-78">  Serial.println<span class="o">(</span><span class="s2">"IP address: "</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-79">  Serial.println<span class="o">(</span>WiFi.localIP<span class="o">())</span><span class="p">;</span>
															</span><span id="line-80">  <span class="k">if</span> <span class="o">(</span><span class="nv">switchState</span> <span class="o">==</span> LOW<span class="o">)</span> <span class="o">{</span>
															</span><span id="line-81">    <span class="nv">switchState</span><span class="o">=</span>HIGH<span class="p">;</span>
															</span><span id="line-82">    <span class="o">}</span>
															</span><span id="line-83">  upload.reset<span class="o">()</span><span class="p">;</span>
															</span><span id="line-84">  statusTime.reset<span class="o">()</span><span class="p">;</span>
															</span><span id="line-85"><span class="o">}</span>
															</span><span id="line-86">
															</span><span id="line-87">void loop<span class="o">()</span> <span class="o">{</span>//*****************************************************************************************************
															</span><span id="line-88">  
															</span><span id="line-89">  int <span class="nv">TempswitchState</span> <span class="o">=</span> digitalRead<span class="o">(</span>pressureSwitch<span class="o">)</span><span class="p">;</span>
															</span><span id="line-90">  <span class="k">if</span><span class="o">(</span><span class="nv">TempswitchState</span> <span class="o">==</span> LOW<span class="o">){</span> //If there is no water
															</span><span id="line-91">    <span class="nv">switchState</span><span class="o">=</span>HIGH<span class="p">;</span>
															</span><span id="line-92">  <span class="o">}</span>
															</span><span id="line-93">  <span class="k">else</span><span class="o">{</span>
															</span><span id="line-94">    <span class="nv">switchState</span><span class="o">=</span>LOW<span class="p">;</span>
															</span><span id="line-95">  <span class="o">}</span>
															</span><span id="line-96">  
															</span><span id="line-97">  <span class="k">if</span><span class="o">((</span>checkTime.check<span class="o">()</span> <span class="o">==</span> <span class="m">1</span> <span class="o">&amp;&amp;</span> <span class="nv">TempswitchState</span> <span class="o">==</span> HIGH<span class="o">)</span> <span class="o">||</span> <span class="o">(</span><span class="nv">TempcheckTime</span> <span class="o">==</span> HIGH <span class="o">&amp;&amp;</span> <span class="nv">TempswitchState</span> <span class="o">==</span> HIGH<span class="o">)){</span>
															</span><span id="line-98">    delay<span class="o">(</span><span class="m">1000</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-99">    Serial.println<span class="o">(</span><span class="s2">"RESET software state in ThingSpeak"</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-100">    <span class="nv">TempcheckTime</span><span class="o">=</span>LOW<span class="p">;</span>
															</span><span id="line-101">    digitalWrite<span class="o">(</span>ledPin, LOW<span class="o">)</span><span class="p">;</span> 
															</span><span id="line-102">    int <span class="nv">wifitries</span> <span class="o">=</span> <span class="m">0</span><span class="p">;</span>
															</span><span id="line-103">      <span class="k">while</span> <span class="o">((</span>WiFi.status<span class="o">()</span> !<span class="o">=</span> WL_CONNECTED<span class="o">)</span> <span class="o">&amp;&amp;</span> wifitries &lt; <span class="m">2</span> <span class="o">)</span> <span class="o">{</span>
															</span><span id="line-104">        Serial.print<span class="o">(</span><span class="s2">"Attempting to connect to WPA SSID to reset: "</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-105">        Serial.println<span class="o">(</span>ssid<span class="o">)</span><span class="p">;</span>
															</span><span id="line-106">        //Connect to WPA/WPA2 network:
															</span><span id="line-107">        <span class="nv">status</span> <span class="o">=</span> WiFi.begin<span class="o">(</span>ssid, password<span class="o">)</span><span class="p">;</span>
															</span><span id="line-108">
															</span><span id="line-109">    // <span class="nb">wait</span> <span class="m">10</span> seconds <span class="k">for</span> connection:
															</span><span id="line-110">    delay<span class="o">(</span><span class="m">10000</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-111">    wifitries++<span class="p">;</span>
															</span><span id="line-112">  <span class="o">}</span>
															</span><span id="line-113">  
															</span><span id="line-114">  
															</span><span id="line-115">  <span class="k">if</span><span class="o">(</span>WiFi.status<span class="o">()</span> <span class="o">==</span> WL_CONNECTED<span class="o">){</span>
															</span><span id="line-116">    long <span class="nv">rssi</span> <span class="o">=</span> WiFi.RSSI<span class="o">()</span><span class="p">;</span>
															</span><span id="line-117">    Serial.println<span class="o">(</span><span class="s2">"RSSI: "</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-118">    Serial.println<span class="o">(</span>rssi<span class="o">)</span><span class="p">;</span>
															</span><span id="line-119">    Serial.println<span class="o">(</span><span class="s2">"Uploading RESET status to Thingspeak"</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-120">    ThingSpeak.writeField<span class="o">(</span>myChannelNumber, <span class="m">1</span>, switchState, myWriteAPIKey<span class="o">)</span><span class="p">;</span>
															</span><span id="line-121">    WiFi.disconnect<span class="o">(</span><span class="nb">true</span><span class="o">)</span><span class="p">;</span>  // Erases SSID/password
															</span><span id="line-122">    delay<span class="o">(</span><span class="m">500</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-123">    Serial.println<span class="o">(</span><span class="s2">"Wifi disconnected"</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-124">    Serial.println<span class="o">(</span><span class="s2">"IP address: "</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-125">    Serial.println<span class="o">(</span>WiFi.localIP<span class="o">())</span><span class="p">;</span>
															</span><span id="line-126">  <span class="o">}</span>
															</span><span id="line-127">  <span class="o">}</span>
															</span><span id="line-128">  
															</span><span id="line-129">  
															</span><span id="line-130">  <span class="k">if</span><span class="o">(</span><span class="nv">switchState</span> <span class="o">==</span> LOW<span class="o">){</span> //LOW means water pressure is OK
															</span><span id="line-131">    digitalWrite<span class="o">(</span>ledPin, HIGH<span class="o">)</span><span class="p">;</span> // HIGH means LED is off
															</span><span id="line-132">  <span class="o">}</span>
															</span><span id="line-133">  <span class="k">if</span><span class="o">(</span>statusTime.check<span class="o">()==</span><span class="m">1</span><span class="o">){</span>
															</span><span id="line-134">    Serial.println<span class="o">(</span><span class="s2">"Reading switchState: "</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-135">    <span class="k">if</span><span class="o">(</span><span class="nv">switchState</span> <span class="o">==</span> LOW<span class="o">){</span> //LOW means ok
															</span><span id="line-136">      Serial.println<span class="o">(</span><span class="s2">"PRESSURE is OK"</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-137">  <span class="o">}</span>
															</span><span id="line-138">  <span class="k">else</span><span class="o">{</span>
															</span><span id="line-139">    Serial.println<span class="o">(</span><span class="s2">"NO WATER or CHECK MAINS!"</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-140">  <span class="o">}</span>
															</span><span id="line-141">  <span class="o">}</span>
															</span><span id="line-142">  
															</span><span id="line-143">  
															</span><span id="line-144">  // check <span class="k">if</span> the pushbutton is pressed. If it is, the buttonState is HIGH:
															</span><span id="line-145">  <span class="k">if</span> <span class="o">(</span>upload.check<span class="o">()</span> <span class="o">==</span> <span class="m">1</span> <span class="o">&amp;&amp;</span> <span class="nv">switchState</span> <span class="o">==</span> HIGH<span class="o">)</span> <span class="o">{</span>
															</span><span id="line-146">    digitalWrite<span class="o">(</span>ledPin, LOW<span class="o">)</span><span class="p">;</span> 
															</span><span id="line-147">    int <span class="nv">wifitries</span> <span class="o">=</span> <span class="m">0</span><span class="p">;</span>
															</span><span id="line-148">      <span class="k">while</span> <span class="o">((</span>WiFi.status<span class="o">()</span> !<span class="o">=</span> WL_CONNECTED<span class="o">)</span> <span class="o">&amp;&amp;</span> wifitries &lt; <span class="m">2</span> <span class="o">)</span> <span class="o">{</span>
															</span><span id="line-149">        Serial.print<span class="o">(</span><span class="s2">"Attempting to connect to WPA SSID: "</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-150">        Serial.println<span class="o">(</span>ssid<span class="o">)</span><span class="p">;</span>
															</span><span id="line-151">        //Connect to WPA/WPA2 network:
															</span><span id="line-152">        <span class="nv">status</span> <span class="o">=</span> WiFi.begin<span class="o">(</span>ssid, password<span class="o">)</span><span class="p">;</span>
															</span><span id="line-153">
															</span><span id="line-154">    // <span class="nb">wait</span> <span class="m">10</span> seconds <span class="k">for</span> connection:
															</span><span id="line-155">    delay<span class="o">(</span><span class="m">10000</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-156">    wifitries++<span class="p">;</span>
															</span><span id="line-157">  <span class="o">}</span>
															</span><span id="line-158">  
															</span><span id="line-159">  
															</span><span id="line-160">  <span class="k">if</span><span class="o">(</span>WiFi.status<span class="o">()</span> <span class="o">==</span> WL_CONNECTED<span class="o">){</span>
															</span><span id="line-161">    long <span class="nv">rssi</span> <span class="o">=</span> WiFi.RSSI<span class="o">()</span><span class="p">;</span>
															</span><span id="line-162">    Serial.println<span class="o">(</span><span class="s2">"RSSI: "</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-163">    Serial.println<span class="o">(</span>rssi<span class="o">)</span><span class="p">;</span>
															</span><span id="line-164">    Serial.println<span class="o">(</span><span class="s2">"Uploading status to Thingspeak"</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-165">    ThingSpeak.writeField<span class="o">(</span>myChannelNumber, <span class="m">1</span>, switchState, myWriteAPIKey<span class="o">)</span><span class="p">;</span>
															</span><span id="line-166">    WiFi.disconnect<span class="o">(</span><span class="nb">true</span><span class="o">)</span><span class="p">;</span>  // Erases SSID/password
															</span><span id="line-167">    delay<span class="o">(</span><span class="m">500</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-168">    Serial.println<span class="o">(</span><span class="s2">"Wifi disconnected"</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-169">    Serial.println<span class="o">(</span><span class="s2">"IP address: "</span><span class="o">)</span><span class="p">;</span>
															</span><span id="line-170">    Serial.println<span class="o">(</span>WiFi.localIP<span class="o">())</span><span class="p">;</span>
															</span><span id="line-171">    <span class="nv">TempcheckTime</span> <span class="o">=</span> HIGH<span class="p">;</span>
															</span><span id="line-172">  <span class="o">}</span>
															</span><span id="line-173">  <span class="o">}</span>
															</span><span id="line-174">  
															</span><span id="line-175">  <span class="k">if</span><span class="o">(</span><span class="nv">switchState</span> <span class="o">==</span> HIGH <span class="o">&amp;&amp;</span> ledBlink.check<span class="o">()</span> <span class="o">==</span> <span class="m">1</span><span class="o">){</span> // blinking the LED without delay<span class="o">()</span> when no water
															</span><span id="line-176">      <span class="k">if</span> <span class="o">(</span><span class="nv">ledState</span><span class="o">==</span>HIGH<span class="o">)</span>  <span class="o">{</span> 
															</span><span id="line-177">        <span class="nv">ledState</span><span class="o">=</span>LOW<span class="p">;</span>
															</span><span id="line-178">        ledBlink.interval<span class="o">(</span>blinkValue<span class="o">)</span><span class="p">;</span>
															</span><span id="line-179">      <span class="o">}</span> 
															</span><span id="line-180">      <span class="k">else</span> <span class="o">{</span>
															</span><span id="line-181">        ledBlink.interval<span class="o">(</span>blinkValue<span class="o">)</span><span class="p">;</span>
															</span><span id="line-182">        <span class="nv">ledState</span><span class="o">=</span>HIGH<span class="p">;</span>
															</span><span id="line-183">      <span class="o">}</span>
															</span><span id="line-184">    digitalWrite<span class="o">(</span>ledPin,ledState<span class="o">)</span><span class="p">;</span>
															</span><span id="line-185">  <span class="o">}</span>
															</span>
															<span id="line-186">
																<span class="o">}</span>
															</span>
														</pre>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>
							<hr>
							<section class="section-container" id="team" style="display:none">
								<h2 class="section-title"><a class="title-anchor" href="https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8?ref=featured#team"><i class="fa fa-link"></i></a><span class="title">Credits</span></h2>
								<div class="section-content">
									<div class="big-card">
										<div>
											<div class="user-card media">
												<div class="media-left">
													<a href="https://www.hackster.io/Pistikukac"><img class="img-circle media-object" src="<?php bloginfo('template_url'); ?>/style/5d4053150d59ba94e2eea13bb91c457e.png" alt="5d4053150d59ba94e2eea13bb91c457e"></a>
												</div>
												<div class="media-body">
													<h5 class="media-heading"><a href="https://www.hackster.io/Pistikukac">Istvan Sipka</a> </h5>
													<div class="stats">
														<span>3 projects • 15 followers</span>
													</div>
													<div class="bio">Heart of an engineer mind of an economist. Actually an entreprenuer at the field of growing sweet pepper. My goal is: IoT for Plants!</div>
													<div class="actions">
														<span style="display:inline-block;vertical-align:bottom;">
															<span data-hypernova-key="UserRelationButton" data-hypernova-id="7e9531d4-dc41-4d82-a215-d14e2c6491cf">
																<button class="buttons__button__lYBnk buttons__joinChannel__3L37k buttons__button__lYBnk" type="button" data-reactroot="">Follow</button>
															</span>
															<script type="application/json" data-hypernova-key="UserRelationButton" data-hypernova-id="7e9531d4-dc41-4d82-a215-d14e2c6491cf"><!--{"id":129152,"type":"followed_user"}--></script>
														</span>
														<a class="btn btn-link btn-sm" href="https://www.hackster.io/messages/new?recipient_id=129152">Contact</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>
							<section class="section-container" id="replicas" style="display:none">
								<h2 class="section-title">
									<a class="title-anchor" href="https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8?ref=featured#replicas"><i class="fa fa-link"></i></a><span class="title">Replications</span>
								</h2>
								<div class="section-content">
									<p>你有没有复制这个项目?分享它</p><a class="btn btn-primary btn-sm show-replica-form" href="javascript:void(0)"><i class="fa fa-retweet"></i><span>I made one</span></a>
								</div>
							</section>
							<section class="section-container project-feedback-form" style="display: none;">
								<div class="section-content">
									<div class="alert alert-info" style="display: none;">
										<p>Love this project? Think it could be improved? Tell us what you think!</p>
										<p><a class="btn btn-secondary btn-sm show-feedback-form project-feedback-form" href="javascript:void(0)" style="display: inline;"><i class="fa fa-pencil-square-o"></i><span>Give feedback</span></a></p>
									</div>
								</div>
							</section>
							<section class="section-container" id="comments">
								<h2 class="section-title"><a class="title-anchor" href="https://www.hackster.io/Pistikukac/alarm-cube-for-greenhouse-fab1c8?ref=featured#comments"><i class="fa fa-link"></i></a>
									<span class="title title-toggle">评论 </span>
								</h2>
								<div class="section-content">
									<div class="comments">
										<?php [bbp-reply-form] ?>
										<div class="user-signed-out" style="display:none">
											<p class="sign-up-to-comment">请 先<a href="https://www.hackster.io/users/sign_in?id=82007&amp;m=base_article&amp;reason=comment&amp;redirect_to=%2FPistikukac%2Falarm-cube-for-greenhouse-fab1c8%23comments">登录</a> / <a href="https://www.hackster.io/users/sign_up?id=82007&amp;m=base_article&amp;reason=comment&amp;redirect_to=%2FPistikukac%2Falarm-cube-for-greenhouse-fab1c8%23comments&amp;source=popup">注册</a></p>
										</div>
										<!-- <div data-react-class="Comments" data-react-props="{&quot;commentable&quot;:{&quot;id&quot;:&quot;fab1c8&quot;,&quot;type&quot;:&quot;projects&quot;},&quot;newCommentsDisabled&quot;:null,&quot;placeholder&quot;:&quot;Share your thoughts! What do you like about this project? How could it be improved? Be respectful and constructive – most Hackster members create and share personal projects in their free time.&quot;,&quot;cacheVersion&quot;:null}"> -->
										<div data-react-class="Comments" >
											<div class="r-comments">
												<div class="comments-form">
													<nav class="comments-form-nav">
														<a href="javascript:void(0);" class="comments-form-tab active">写</a>
														<a href="javascript:void(0);" class="comments-form-tab">
															<img src="<?php bloginfo('template_url'); ?>/style/.png" class="markdown-supported">Preview
														</a>
														</nav>
														<textarea class="comments-textarea" placeholder="填写您的评论信息" rows="3">11111111111111</textarea>
													<div class="comments-form-button-container">
														<button class="btn btn-primary">Post</button>
													</div>
												</div>
												<div class=""></div>
											</div>
										</div>
									</div>
								</div>
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
											<?php if($res_pro[0]['pro_name']) echo $res_pro[0]['pro_name'] ?>
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
<!-- <li class="small-toc">
	<a class="smooth-scroll" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;The Past&quot;,&quot;href&quot;:&quot;#toc-0&quot;,&quot;type&quot;:&quot;toc&quot;,&quot;location&quot;:&quot;toc&quot;}}" data-offset="-10" href="#toc-the-past-0">The Past</a>
</li>
<li class="small-toc">
	<a class="smooth-scroll" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;The Present&quot;,&quot;href&quot;:&quot;#toc-1&quot;,&quot;type&quot;:&quot;toc&quot;,&quot;location&quot;:&quot;toc&quot;}}" data-offset="-10" href="#toc-the-present-1">The Present</a>
</li>
<li class="small-toc">
	<a class="smooth-scroll" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;Battery Powered Alarm Cube&quot;,&quot;href&quot;:&quot;#toc-2&quot;,&quot;type&quot;:&quot;toc&quot;,&quot;location&quot;:&quot;toc&quot;}}" data-offset="-10" href="#toc-battery-powered-alarm-cube-2">Battery Powered Alarm Cube</a>
</li>
<li class="small-toc">
	<a class="smooth-scroll" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;The Code Running on the Alarm Cube&quot;,&quot;href&quot;:&quot;#toc-3&quot;,&quot;type&quot;:&quot;toc&quot;,&quot;location&quot;:&quot;toc&quot;}}" data-offset="-10" href="#toc-the-code-running-on-the-alarm-cube-3">The Code Running on the Alarm Cube</a>
</li>
<li class="small-toc">
	<a class="smooth-scroll" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;More to Come..&quot;,&quot;href&quot;:&quot;#toc-4&quot;,&quot;type&quot;:&quot;toc&quot;,&quot;location&quot;:&quot;toc&quot;}}" data-offset="-10" href="#toc-more-to-come---4">More to Come..</a>
</li> -->
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
										<a class="smooth-scroll" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;Comments&quot;,&quot;href&quot;:&quot;#comments&quot;,&quot;type&quot;:&quot;toc&quot;,&quot;location&quot;:&quot;toc&quot;}}" href="#comments">Comments<span class="nav-count">(0)</span></a>
									</li>
									<li>
										<a class="smooth-scroll" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;Similar projects&quot;,&quot;href&quot;:&quot;#other-projects&quot;,&quot;type&quot;:&quot;toc&quot;,&quot;location&quot;:&quot;toc&quot;}}" href="#other-projects">类似项目</a>
									</li>
								</ul>
							</div>
							<!-- JS代码实现点哪个就给哪个加粗********************************** -->
							<script type="text/javascript">
								var ul = document.getElementById("scroll-nav");
								var lis = ul.childNodes;
								// alert(lis);
								for(var i = 0;i<lis.length;i++){
									lis[i].click = function(){
										// alert();
									}
								}
							</script>
							<!-- ************************************************************** -->
							<div class="show-on-affix" id="scrolling-actions" style="margin-top:15px;">
								<span data-react-class="ProjectRespectButton" data-react-props="{&quot;projectId&quot;:82007,&quot;redirect_to&quot;:&quot;/articles/fab1c8/respects/create&quot;,&quot;source&quot;:&quot;project_side_nav&quot;}" data-hydrate="t">
									<button class="buttons__button__lYBnk project_respect_button__button__1LWAT" type="button" data-reactroot="">
										<span><i class="fa fa-thumbs-o-up"></i><span>尊重项目</span></span>
									</button>
								</span>
								<a class="btn btn-primary btn-sm show-replica-form" href="javascript:void(0)"><i class="fa fa-retweet"></i>
									<span class="sr-only">I made one</span>
								</a>
								<div data-react-class="ListsDropdown" data-react-props="{&quot;projectId&quot;:&quot;fab1c8&quot;,&quot;btnClass&quot;:&quot;btn-secondary&quot;,&quot;iconOnly&quot;:true}" class="react-btn" style="display:inline-block;">
									<div class="lists-dropdown">
										<a href="javascript:void(0)" class="btn btn-secondary btn-sm toggle-lists-btn" title="Bookmark"><i class="fa fa-bookmark-o"></i></a>
									</div>
								</div>
								<a class="btn btn-secondary btn-sm" data-container="body" data-content="&lt;div class=&#39;sharing-actions&#39;&gt;&lt;ul&gt;&lt;li&gt;&lt;a class=&#39;social-share-link clearfix&#39; data-url=&#39;https://www.hackster.io/social/share/link?service=facebook&amp;amp;sharable_id=82007&amp;amp;sharable_type=BaseArticle&amp;amp;target_host=www.hackster.io&#39; href=&#39;&#39;&gt;&lt;i class=&#39;fa fa-facebook&#39;&gt;&lt;/i&gt;&lt;span&gt;Share on Facebook&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a class=&#39;social-share-link clearfix&#39; data-url=&#39;https://www.hackster.io/social/share/link?service=googleplus&amp;amp;sharable_id=82007&amp;amp;sharable_type=BaseArticle&amp;amp;target_host=www.hackster.io&#39; href=&#39;&#39;&gt;&lt;i class=&#39;fa fa-google-plus-official&#39;&gt;&lt;/i&gt;&lt;span&gt;Share on Google+&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a class=&#39;social-share-link clearfix&#39; data-url=&#39;https://www.hackster.io/social/share/link?service=linkedin&amp;amp;sharable_id=82007&amp;amp;sharable_type=BaseArticle&amp;amp;target_host=www.hackster.io&#39; href=&#39;&#39;&gt;&lt;i class=&#39;fa fa-linkedin&#39;&gt;&lt;/i&gt;&lt;span&gt;Share on LinkedIn&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a class=&#39;social-share-link clearfix&#39; data-url=&#39;https://www.hackster.io/social/share/link?service=pinterest&amp;amp;sharable_id=82007&amp;amp;sharable_type=BaseArticle&amp;amp;target_host=www.hackster.io&#39; href=&#39;&#39;&gt;&lt;i class=&#39;fa fa-pinterest&#39;&gt;&lt;/i&gt;&lt;span&gt;Share on Pinterest&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a class=&#39;social-share-link clearfix&#39; data-url=&#39;https://www.hackster.io/social/share/link?service=reddit&amp;amp;sharable_id=82007&amp;amp;sharable_type=BaseArticle&amp;amp;target_host=www.hackster.io&#39; href=&#39;&#39;&gt;&lt;i class=&#39;fa fa-reddit&#39;&gt;&lt;/i&gt;&lt;span&gt;Share on Reddit&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a class=&#39;social-share-link clearfix&#39; data-url=&#39;https://www.hackster.io/social/share/link?service=twitter&amp;amp;sharable_id=82007&amp;amp;sharable_type=BaseArticle&amp;amp;target_host=www.hackster.io&#39; href=&#39;&#39;&gt;&lt;i class=&#39;fa fa-twitter&#39;&gt;&lt;/i&gt;&lt;span&gt;Share on Twitter&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a data-target=&#39;#embed-popup&#39; class=&#39;modal-open&#39; href=&#39;javascript:void(0)&#39;&gt;&lt;i class=&#39;fa fa-code&#39;&gt;&lt;/i&gt;&lt;span&gt;Embed&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;&lt;/ul&gt;&lt;/div&gt;" data-html="true" data-placement="bottom" data-toggle="popover" data-trigger="click" data-original-title="" title="">
									<i class="fa fa-share-square-o"></i>
								</a>
								<a class="btn btn-secondary btn-sm show-feedback-form project-feedback-form" href="javascript:void(0)" style="display: inline;">
									<i class="fa fa-pencil-square-o"></i><span class="sr-only">Give feedback</span>
								</a>
							</div>
						</div>
					</section>
				</div>
				</div>
				</div>
			</section>
<section id="other-projects">
	<div data-react-class="SimilarProjectsList" data-react-props="{&quot;project&quot;:{&quot;hid&quot;:&quot;fab1c8&quot;}}"><div class=""></div></div>
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
	<a class="mo-nav-link" title="Projects" href="https://www.hackster.io/projects?ref=topnav">Projects</a>
	<a class="mo-nav-link" title="Platforms" href="https://www.hackster.io/channels/platforms">Platforms</a>
	<a class="mo-nav-link" title="Topics" href="https://www.hackster.io/channels/topics">Topics</a>
	<a class="mo-nav-link" title="Contests" href="https://www.hackster.io/contests">Contests</a>
	<a class="mo-nav-link" title="Live" href="https://www.hackster.io/live">Live</a>
	<a class="mo-nav-link" title="Live" href="https://www.hackster.io/apps">
		<span>Apps</span>
		<span class="label-beta">Beta</span>
	</a>
	<a class="mo-nav-link" title="Blog" href="https://blog.hackster.io/">Blog</a>
	<a class="mo-nav-link" href="https://www.hackster.io/projects/new">
		<i class="fa fa-plus"></i>
		<span>Add project</span>
	</a>
	<a class="mo-nav-link" href="https://www.hackster.io/hackster2">Profile and projects</a>
	<a class="mo-nav-link" href="https://www.hackster.io/messages">Messages</a>
	<a class="mo-nav-link" href="https://www.hackster.io/users/edit">Account settings</a>
	<a class="mo-nav-link" href="https://www.hackster.io/dashboard/notifications">Notifications</a>
	<a class="mo-nav-link" rel="nofollow" data-method="delete" href="https://www.hackster.io/users/sign_out">Log out</a>
</div>
<script src="<?php bloginfo('template_url'); ?>/style/manifest.d41d8cd98f00b204e980.js"></script>
<script src="<?php bloginfo('template_url'); ?>/style/vendor.3ac88e7d0490ec1957db.js"></script>
<script type="text/javascript" id="">
	(function(){function a(){window.hj?window.hj("trigger","project_page"):10>b&&(b++,window.setTimeout(function(){a()},250))}var b=0;a()})();
</script>
<!-- <script type="text/javascript" id="">!function(b,e,f,g,a,c,d){b.fbq||(a=b.fbq=function(){a.callMethod?a.callMethod.apply(a,arguments):a.queue.push(arguments)},b._fbq||(b._fbq=a),a.push=a,a.loaded=!0,a.version="2.0",a.queue=[],c=e.createElement(f),c.async=!0,c.src=g,d=e.getElementsByTagName(f)[0],d.parentNode.insertBefore(c,d))}(window,document,"script","https://connect.facebook.net/en_US/fbevents.js");fbq("init","1055054847899682");fbq("set","agent","tmgoogletagmanager","1055054847899682");fbq("track","PageView");</script> -->
<script type="text/javascript" id="">
	var askAvnetConfig=[{userId:"true"=="true"?"dongxinyu_it@163.com":"guestUser",userFirstName:"true"=="true"?"hackster":"guestUser",userType:"true"=="true"?"R":"G",pageType:"projects#show",entityId:google_tag_manager["GTM-KR3BZMN"].macro('gtm3'),site:"hackster",storeId:715839035,langId:-1,regionId:"US",botId:"askavnetbot"}];
</script>
<div id="chatbotOut" style="z-index: 99999; width: 105px; height: 65px; display: block; position: fixed; right: 0px;">
	<object id="chatbotIn" style="box-sizing: border-box; border-radius: 10px; z-index: 99999; bottom: 5px; right: 0px; position: fixed; width: 105px; height: 65px;" type="text/html" data="<?php bloginfo('template_url'); ?>/style/chat.html"></object>
</div>
<script src="<?php bloginfo('template_url'); ?>/style/client_bundle.0be82cc9f726b2aa6615.js"></script>
<script src="<?php bloginfo('template_url'); ?>/style/application-9cb8da0a6926bf65dd02df18910aa535173d961c3a5ee9c62b51e27afe46203e.js"></script>
<script type="text/javascript">
	(function(){
	var request = new XMLHttpRequest();
	request.open('POST', 'https://api.hackster.io/private/stats', true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
	request.withCredentials = true;
	var data = {
	  referrer: (document.referrer || document.origin),

	  id: '82007',
	  type: 'BaseArticle',

	  a: 'show',
	  c: 'projects'
	};
	var params = Object.keys(data).map(function(key) { return [key, encodeURIComponent(data[key])].join('='); }).join('&');
	request.send(params);
	})();
</script>
<div data-react-class="SigninDialog" data-react-props="{&quot;redirect_to&quot;:&quot;/Pistikukac/alarm-cube-for-greenhouse-fab1c8?ref=featured&quot;,&quot;omniauth_urls&quot;:{&quot;facebook&quot;:&quot;https://www.hackster.io/users/auth/facebook?login_locale=en\u0026redirect_to=%2FPistikukac%2Falarm-cube-for-greenhouse-fab1c8%3Fref%3Dfeatured\u0026setup=true&quot;,&quot;github&quot;:&quot;https://www.hackster.io/users/auth/github?login_locale=en\u0026redirect_to=%2FPistikukac%2Falarm-cube-for-greenhouse-fab1c8%3Fref%3Dfeatured\u0026setup=true&quot;,&quot;gplus&quot;:&quot;https://www.hackster.io/users/auth/gplus?login_locale=en\u0026redirect_to=%2FPistikukac%2Falarm-cube-for-greenhouse-fab1c8%3Fref%3Dfeatured\u0026setup=true&quot;,&quot;twitter&quot;:&quot;https://www.hackster.io/users/auth/twitter?login_locale=en\u0026redirect_to=%2FPistikukac%2Falarm-cube-for-greenhouse-fab1c8%3Fref%3Dfeatured\u0026setup=true&quot;,&quot;windowslive&quot;:&quot;https://www.hackster.io/users/auth/windowslive?login_locale=en\u0026redirect_to=%2FPistikukac%2Falarm-cube-for-greenhouse-fab1c8%3Fref%3Dfeatured\u0026setup=true&quot;},&quot;signup_action&quot;:&quot;/users?redirect_to=%2FPistikukac%2Falarm-cube-for-greenhouse-fab1c8%3Fref%3Dfeatured&quot;,&quot;signin_action&quot;:&quot;/users/sign_in?redirect_to=%2FPistikukac%2Falarm-cube-for-greenhouse-fab1c8%3Fref%3Dfeatured&quot;,&quot;openEvent&quot;:&quot;open:SigninDialog&quot;,&quot;forgot_password_link&quot;:&quot;/users/password/new&quot;,&quot;simplified_signup_action&quot;:&quot;/users/simplified_registrations&quot;}">
	<div></div>
</div>
<div data-react-class="GlobalDialog" data-react-props="{}">
	<div></div>
</div>
<div data-react-class="GlobalPopover" data-react-props="{}">
	<div></div>
</div>
<script>$(function(){
  var s = "<span class='stat-figure' itemprop='userInteractionCount'>347</span>";
  $('.impression-stats .stat-figure').replaceWith(s);
  s = "<span class='stat-figure' itemprop='userInteractionCount'>7</span>";
  $('.respect-stats .stat-figure').replaceWith(s);
});</script>
<script>$('.project-feedback-form').show();</script>
<div data-react-class="FeedbackForm" data-react-props="{&quot;project&quot;:{&quot;id&quot;:82007},&quot;openEvent&quot;:&quot;open:feedbackForm&quot;,&quot;siteName&quot;:&quot;Hackster.io&quot;}">
	<div>
		<div></div>
	</div>
</div>
<div data-react-class="ProjectReplicaForm" data-react-props="{&quot;projectId&quot;:82007,&quot;userId&quot;:421784,&quot;S3BucketURL&quot;:&quot;https://halckemy.s3.amazonaws.com&quot;,&quot;AWSAccessKeyId&quot;:&quot;AKIAJIDYI4LI7VOFSTEQ&quot;,&quot;openEvent&quot;:&quot;open:replicaForm&quot;}">
	<div>
		<div></div>
		<div></div>
	</div>
</div>
<iframe name="_hjRemoteVarsFrame" title="_hjRemoteVarsFrame" id="_hjRemoteVarsFrame" src="<?php bloginfo('template_url'); ?>/style/rcj-99d43ead6bdf30da8ed5ffcb4f17100c.html" style="display: none !important; width: 1px !important; height: 1px !important; opacity: 0 !important; pointer-events: none !important;">
</iframe>
<div id="ads"></div>
<!-- ************************************************************** -->
<hr>
<div class="clearfix"></div>
</body>
<?php //get_footer(); ?>
<!-- 测试页面响应时间 -->