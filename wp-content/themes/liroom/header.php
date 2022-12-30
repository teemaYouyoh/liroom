<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package liroom
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if (is_single()) { ?>
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'ru'}
</script>
<?php } ?>
<?php wp_head(); ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K24SSJ');</script>
<!-- End Google Tag Manager -->
<!--lib-->
<script type='text/javascript'>
	(function() {
	var w = window,
			d = document,
			protocol =/https/i.test(w.location.protocol) ? 'https:' : 'http:',
			aml = typeof admixerML !== 'undefined' ? admixerML : { };
	aml.fn = aml.fn || [];
	aml.invPath = aml.invPath || (protocol + '//inv-nets.admixer.net/');
	aml.cdnPath = aml.cdnPath || (protocol + '//cdn.admixer.net/');
	if (!w.admixerML)
	{
		var lodash = document.createElement('script');
		lodash.id = 'amlScript';
		lodash.async = true;
		lodash.type = 'text/javascript';
		lodash.src = aml.cdnPath + 'scripts3/loader2.js';
		var node = d.getElementsByTagName('script')[0];
		node.parentNode.insertBefore(lodash, node);
		w.admixerML = aml;
	}
})();
</script>
<script type='text/javascript'>
admixerML.fn.push(function() {
admixerML.defineSlot({z: 'ae0f3c68-ec4b-4a6d-97d4-1ce2c14b7ea7', ph: 'admixer_ae0f3c68ec4b4a6d97d41ce2c14b7ea7_zone_12255_sect_3677_site_3331', i: 'inv-nets'});
admixerML.singleRequest();
});
</script>


  <script data-source="googbase_min.js" data-version="4" data-exports-type="googbase">(function(){(window.goog=window.goog||{}).inherits=function(a,d){function b(){}b.prototype=d.prototype;a.b=d.prototype;a.prototype=new b;a.prototype.constructor=a;a.a=function(a,b,f){for(var e=Array(arguments.length-2),c=2;c<arguments.length;c++)e[c-2]=arguments[c];return d.prototype[b].apply(a,e)}};}).call(this);
</script>
  <script data-source="gwd_webcomponents_min.js" data-version="6" data-exports-type="gwd_webcomponents">"undefined"==typeof document.register&&(document.register=function(a){return document.registerElement.apply(document,arguments)});document.createElement||(document.createElement=document.constructor.prototype.createElement,document.createElementNS=document.constructor.prototype.createElementNS);

/**
 * @license
 * Copyright (c) 2014 The Polymer Project Authors. All rights reserved.
 * This code may only be used under the BSD style license found at http://polymer.github.io/LICENSE.txt
 * The complete set of authors may be found at http://polymer.github.io/AUTHORS.txt
 * The complete set of contributors may be found at http://polymer.github.io/CONTRIBUTORS.txt
 * Code distributed by Google as part of the polymer project is also
 * subject to an additional IP rights grant found at http://polymer.github.io/PATENTS.txt
 */
// @version 0.7.24-5b70476
"undefined"==typeof WeakMap&&!function(){var e=Object.defineProperty,t=Date.now()%1e9,n=function(){this.name="__st"+(1e9*Math.random()>>>0)+(t++ +"__")};n.prototype={set:function(t,n){var o=t[this.name];return o&&o[0]===t?o[1]=n:e(t,this.name,{value:[t,n],writable:!0}),this},get:function(e){var t;return(t=e[this.name])&&t[0]===e?t[1]:void 0},"delete":function(e){var t=e[this.name];return!(!t||t[0]!==e)&&(t[0]=t[1]=void 0,!0)},has:function(e){var t=e[this.name];return!!t&&t[0]===e}},window.WeakMap=n}(),function(e){function t(e){E.push(e),b||(b=!0,m(o))}function n(e){return window.ShadowDOMPolyfill&&window.ShadowDOMPolyfill.wrapIfNeeded(e)||e}function o(){b=!1;var e=E;E=[],e.sort(function(e,t){return e.uid_-t.uid_});var t=!1;e.forEach(function(e){var n=e.takeRecords();r(e),n.length&&(e.callback_(n,e),t=!0)}),t&&o()}function r(e){e.nodes_.forEach(function(t){var n=v.get(t);n&&n.forEach(function(t){t.observer===e&&t.removeTransientObservers()})})}function i(e,t){for(var n=e;n;n=n.parentNode){var o=v.get(n);if(o)for(var r=0;r<o.length;r++){var i=o[r],a=i.options;if(n===e||a.subtree){var d=t(a);d&&i.enqueue(d)}}}}function a(e){this.callback_=e,this.nodes_=[],this.records_=[],this.uid_=++_}function d(e,t){this.type=e,this.target=t,this.addedNodes=[],this.removedNodes=[],this.previousSibling=null,this.nextSibling=null,this.attributeName=null,this.attributeNamespace=null,this.oldValue=null}function s(e){var t=new d(e.type,e.target);return t.addedNodes=e.addedNodes.slice(),t.removedNodes=e.removedNodes.slice(),t.previousSibling=e.previousSibling,t.nextSibling=e.nextSibling,t.attributeName=e.attributeName,t.attributeNamespace=e.attributeNamespace,t.oldValue=e.oldValue,t}function u(e,t){return y=new d(e,t)}function c(e){return N?N:(N=s(y),N.oldValue=e,N)}function l(){y=N=void 0}function f(e){return e===N||e===y}function p(e,t){return e===t?e:N&&f(e)?N:null}function w(e,t,n){this.observer=e,this.target=t,this.options=n,this.transientObservedNodes=[]}if(!e.JsMutationObserver){var m,v=new WeakMap;if(/Trident|Edge/.test(navigator.userAgent))m=setTimeout;else if(window.setImmediate)m=window.setImmediate;else{var h=[],g=String(Math.random());window.addEventListener("message",function(e){if(e.data===g){var t=h;h=[],t.forEach(function(e){e()})}}),m=function(e){h.push(e),window.postMessage(g,"*")}}var b=!1,E=[],_=0;a.prototype={observe:function(e,t){if(e=n(e),!t.childList&&!t.attributes&&!t.characterData||t.attributeOldValue&&!t.attributes||t.attributeFilter&&t.attributeFilter.length&&!t.attributes||t.characterDataOldValue&&!t.characterData)throw new SyntaxError;var o=v.get(e);o||v.set(e,o=[]);for(var r,i=0;i<o.length;i++)if(o[i].observer===this){r=o[i],r.removeListeners(),r.options=t;break}r||(r=new w(this,e,t),o.push(r),this.nodes_.push(e)),r.addListeners()},disconnect:function(){this.nodes_.forEach(function(e){for(var t=v.get(e),n=0;n<t.length;n++){var o=t[n];if(o.observer===this){o.removeListeners(),t.splice(n,1);break}}},this),this.records_=[]},takeRecords:function(){var e=this.records_;return this.records_=[],e}};var y,N;w.prototype={enqueue:function(e){var n=this.observer.records_,o=n.length;if(n.length>0){var r=n[o-1],i=p(r,e);if(i)return void(n[o-1]=i)}else t(this.observer);n[o]=e},addListeners:function(){this.addListeners_(this.target)},addListeners_:function(e){var t=this.options;t.attributes&&e.addEventListener("DOMAttrModified",this,!0),t.characterData&&e.addEventListener("DOMCharacterDataModified",this,!0),t.childList&&e.addEventListener("DOMNodeInserted",this,!0),(t.childList||t.subtree)&&e.addEventListener("DOMNodeRemoved",this,!0)},removeListeners:function(){this.removeListeners_(this.target)},removeListeners_:function(e){var t=this.options;t.attributes&&e.removeEventListener("DOMAttrModified",this,!0),t.characterData&&e.removeEventListener("DOMCharacterDataModified",this,!0),t.childList&&e.removeEventListener("DOMNodeInserted",this,!0),(t.childList||t.subtree)&&e.removeEventListener("DOMNodeRemoved",this,!0)},addTransientObserver:function(e){if(e!==this.target){this.addListeners_(e),this.transientObservedNodes.push(e);var t=v.get(e);t||v.set(e,t=[]),t.push(this)}},removeTransientObservers:function(){var e=this.transientObservedNodes;this.transientObservedNodes=[],e.forEach(function(e){this.removeListeners_(e);for(var t=v.get(e),n=0;n<t.length;n++)if(t[n]===this){t.splice(n,1);break}},this)},handleEvent:function(e){switch(e.stopImmediatePropagation(),e.type){case"DOMAttrModified":var t=e.attrName,n=e.relatedNode.namespaceURI,o=e.target,r=new u("attributes",o);r.attributeName=t,r.attributeNamespace=n;var a=e.attrChange===MutationEvent.ADDITION?null:e.prevValue;i(o,function(e){if(e.attributes&&(!e.attributeFilter||!e.attributeFilter.length||e.attributeFilter.indexOf(t)!==-1||e.attributeFilter.indexOf(n)!==-1))return e.attributeOldValue?c(a):r});break;case"DOMCharacterDataModified":var o=e.target,r=u("characterData",o),a=e.prevValue;i(o,function(e){if(e.characterData)return e.characterDataOldValue?c(a):r});break;case"DOMNodeRemoved":this.addTransientObserver(e.target);case"DOMNodeInserted":var d,s,f=e.target;"DOMNodeInserted"===e.type?(d=[f],s=[]):(d=[],s=[f]);var p=f.previousSibling,w=f.nextSibling,r=u("childList",e.target.parentNode);r.addedNodes=d,r.removedNodes=s,r.previousSibling=p,r.nextSibling=w,i(e.relatedNode,function(e){if(e.childList)return r})}l()}},e.JsMutationObserver=a,e.MutationObserver||(e.MutationObserver=a,a._isPolyfilled=!0)}}(self),function(e){"use strict";if(!window.performance||!window.performance.now){var t=Date.now();window.performance={now:function(){return Date.now()-t}}}window.requestAnimationFrame||(window.requestAnimationFrame=function(){var e=window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame;return e?function(t){return e(function(){t(performance.now())})}:function(e){return window.setTimeout(e,1e3/60)}}()),window.cancelAnimationFrame||(window.cancelAnimationFrame=function(){return window.webkitCancelAnimationFrame||window.mozCancelAnimationFrame||function(e){clearTimeout(e)}}());var n=function(){var e=document.createEvent("Event");return e.initEvent("foo",!0,!0),e.preventDefault(),e.defaultPrevented}();if(!n){var o=Event.prototype.preventDefault;Event.prototype.preventDefault=function(){this.cancelable&&(o.call(this),Object.defineProperty(this,"defaultPrevented",{get:function(){return!0},configurable:!0}))}}var r=/Trident/.test(navigator.userAgent);if((!window.CustomEvent||r&&"function"!=typeof window.CustomEvent)&&(window.CustomEvent=function(e,t){t=t||{};var n=document.createEvent("CustomEvent");return n.initCustomEvent(e,Boolean(t.bubbles),Boolean(t.cancelable),t.detail),n},window.CustomEvent.prototype=window.Event.prototype),!window.Event||r&&"function"!=typeof window.Event){var i=window.Event;window.Event=function(e,t){t=t||{};var n=document.createEvent("Event");return n.initEvent(e,Boolean(t.bubbles),Boolean(t.cancelable)),n},window.Event.prototype=i.prototype}}(window.WebComponents),window.CustomElements=window.CustomElements||{flags:{}},function(e){var t=e.flags,n=[],o=function(e){n.push(e)},r=function(){n.forEach(function(t){t(e)})};e.addModule=o,e.initializeModules=r,e.hasNative=Boolean(document.registerElement),e.isIE=/Trident/.test(navigator.userAgent),e.useNative=!t.register&&e.hasNative&&!window.ShadowDOMPolyfill&&(!window.HTMLImports||window.HTMLImports.useNative)}(window.CustomElements),window.CustomElements.addModule(function(e){function t(e,t){n(e,function(e){return!!t(e)||void o(e,t)}),o(e,t)}function n(e,t,o){var r=e.firstElementChild;if(!r)for(r=e.firstChild;r&&r.nodeType!==Node.ELEMENT_NODE;)r=r.nextSibling;for(;r;)t(r,o)!==!0&&n(r,t,o),r=r.nextElementSibling;return null}function o(e,n){for(var o=e.shadowRoot;o;)t(o,n),o=o.olderShadowRoot}function r(e,t){i(e,t,[])}function i(e,t,n){if(e=window.wrap(e),!(n.indexOf(e)>=0)){n.push(e);for(var o,r=e.querySelectorAll("link[rel="+a+"]"),d=0,s=r.length;d<s&&(o=r[d]);d++)o["import"]&&i(o["import"],t,n);t(e)}}var a=window.HTMLImports?window.HTMLImports.IMPORT_LINK_TYPE:"none";e.forDocumentTree=r,e.forSubtree=t}),window.CustomElements.addModule(function(e){function t(e,t){return n(e,t)||o(e,t)}function n(t,n){return!!e.upgrade(t,n)||void(n&&a(t))}function o(e,t){b(e,function(e){if(n(e,t))return!0})}function r(e){N.push(e),y||(y=!0,setTimeout(i))}function i(){y=!1;for(var e,t=N,n=0,o=t.length;n<o&&(e=t[n]);n++)e();N=[]}function a(e){_?r(function(){d(e)}):d(e)}function d(e){e.__upgraded__&&!e.__attached&&(e.__attached=!0,e.attachedCallback&&e.attachedCallback())}function s(e){u(e),b(e,function(e){u(e)})}function u(e){_?r(function(){c(e)}):c(e)}function c(e){e.__upgraded__&&e.__attached&&(e.__attached=!1,e.detachedCallback&&e.detachedCallback())}function l(e){for(var t=e,n=window.wrap(document);t;){if(t==n)return!0;t=t.parentNode||t.nodeType===Node.DOCUMENT_FRAGMENT_NODE&&t.host}}function f(e){if(e.shadowRoot&&!e.shadowRoot.__watched){g.dom&&console.log("watching shadow-root for: ",e.localName);for(var t=e.shadowRoot;t;)m(t),t=t.olderShadowRoot}}function p(e,n){if(g.dom){var o=n[0];if(o&&"childList"===o.type&&o.addedNodes&&o.addedNodes){for(var r=o.addedNodes[0];r&&r!==document&&!r.host;)r=r.parentNode;var i=r&&(r.URL||r._URL||r.host&&r.host.localName)||"";i=i.split("/?").shift().split("/").pop()}console.group("mutations (%d) [%s]",n.length,i||"")}var a=l(e);n.forEach(function(e){"childList"===e.type&&(M(e.addedNodes,function(e){e.localName&&t(e,a)}),M(e.removedNodes,function(e){e.localName&&s(e)}))}),g.dom&&console.groupEnd()}function w(e){for(e=window.wrap(e),e||(e=window.wrap(document));e.parentNode;)e=e.parentNode;var t=e.__observer;t&&(p(e,t.takeRecords()),i())}function m(e){if(!e.__observer){var t=new MutationObserver(p.bind(this,e));t.observe(e,{childList:!0,subtree:!0}),e.__observer=t}}function v(e){e=window.wrap(e),g.dom&&console.group("upgradeDocument: ",e.baseURI.split("/").pop());var n=e===window.wrap(document);t(e,n),m(e),g.dom&&console.groupEnd()}function h(e){E(e,v)}var g=e.flags,b=e.forSubtree,E=e.forDocumentTree,_=window.MutationObserver._isPolyfilled&&g["throttle-attached"];e.hasPolyfillMutations=_,e.hasThrottledAttached=_;var y=!1,N=[],M=Array.prototype.forEach.call.bind(Array.prototype.forEach),O=Element.prototype.createShadowRoot;O&&(Element.prototype.createShadowRoot=function(){var e=O.call(this);return window.CustomElements.watchShadow(this),e}),e.watchShadow=f,e.upgradeDocumentTree=h,e.upgradeDocument=v,e.upgradeSubtree=o,e.upgradeAll=t,e.attached=a,e.takeRecords=w}),window.CustomElements.addModule(function(e){function t(t,o){if("template"===t.localName&&window.HTMLTemplateElement&&HTMLTemplateElement.decorate&&HTMLTemplateElement.decorate(t),!t.__upgraded__&&t.nodeType===Node.ELEMENT_NODE){var r=t.getAttribute("is"),i=e.getRegisteredDefinition(t.localName)||e.getRegisteredDefinition(r);if(i&&(r&&i.tag==t.localName||!r&&!i["extends"]))return n(t,i,o)}}function n(t,n,r){return a.upgrade&&console.group("upgrade:",t.localName),n.is&&t.setAttribute("is",n.is),o(t,n),t.__upgraded__=!0,i(t),r&&e.attached(t),e.upgradeSubtree(t,r),a.upgrade&&console.groupEnd(),t}function o(e,t){Object.__proto__?e.__proto__=t.prototype:(r(e,t.prototype,t["native"]),e.__proto__=t.prototype)}function r(e,t,n){for(var o={},r=t;r!==n&&r!==HTMLElement.prototype;){for(var i,a=Object.getOwnPropertyNames(r),d=0;i=a[d];d++)o[i]||(Object.defineProperty(e,i,Object.getOwnPropertyDescriptor(r,i)),o[i]=1);r=Object.getPrototypeOf(r)}}function i(e){e.createdCallback&&e.createdCallback()}var a=e.flags;e.upgrade=t,e.upgradeWithDefinition=n,e.implementPrototype=o}),window.CustomElements.addModule(function(e){function t(t,o){var s=o||{};if(!t)throw new Error("document.registerElement: first argument `name` must not be empty");if(t.indexOf("-")<0)throw new Error("document.registerElement: first argument ('name') must contain a dash ('-'). Argument provided was '"+String(t)+"'.");if(r(t))throw new Error("Failed to execute 'registerElement' on 'Document': Registration failed for type '"+String(t)+"'. The type name is invalid.");if(u(t))throw new Error("DuplicateDefinitionError: a type with name '"+String(t)+"' is already registered");return s.prototype||(s.prototype=Object.create(HTMLElement.prototype)),s.__name=t.toLowerCase(),s["extends"]&&(s["extends"]=s["extends"].toLowerCase()),s.lifecycle=s.lifecycle||{},s.ancestry=i(s["extends"]),a(s),d(s),n(s.prototype),c(s.__name,s),s.ctor=l(s),s.ctor.prototype=s.prototype,s.prototype.constructor=s.ctor,e.ready&&v(document),s.ctor}function n(e){if(!e.setAttribute._polyfilled){var t=e.setAttribute;e.setAttribute=function(e,n){o.call(this,e,n,t)};var n=e.removeAttribute;e.removeAttribute=function(e){o.call(this,e,null,n)},e.setAttribute._polyfilled=!0}}function o(e,t,n){e=e.toLowerCase();var o=this.getAttribute(e);n.apply(this,arguments);var r=this.getAttribute(e);this.attributeChangedCallback&&r!==o&&this.attributeChangedCallback(e,o,r)}function r(e){for(var t=0;t<_.length;t++)if(e===_[t])return!0}function i(e){var t=u(e);return t?i(t["extends"]).concat([t]):[]}function a(e){for(var t,n=e["extends"],o=0;t=e.ancestry[o];o++)n=t.is&&t.tag;e.tag=n||e.__name,n&&(e.is=e.__name)}function d(e){if(!Object.__proto__){var t=HTMLElement.prototype;if(e.is){var n=document.createElement(e.tag);t=Object.getPrototypeOf(n)}for(var o,r=e.prototype,i=!1;r;)r==t&&(i=!0),o=Object.getPrototypeOf(r),o&&(r.__proto__=o),r=o;i||console.warn(e.tag+" prototype not found in prototype chain for "+e.is),e["native"]=t}}function s(e){return g(M(e.tag),e)}function u(e){if(e)return y[e.toLowerCase()]}function c(e,t){y[e]=t}function l(e){return function(){return s(e)}}function f(e,t,n){return e===N?p(t,n):O(e,t)}function p(e,t){e&&(e=e.toLowerCase()),t&&(t=t.toLowerCase());var n=u(t||e);if(n){if(e==n.tag&&t==n.is)return new n.ctor;if(!t&&!n.is)return new n.ctor}var o;return t?(o=p(e),o.setAttribute("is",t),o):(o=M(e),e.indexOf("-")>=0&&b(o,HTMLElement),o)}function w(e,t){var n=e[t];e[t]=function(){var e=n.apply(this,arguments);return h(e),e}}var m,v=(e.isIE,e.upgradeDocumentTree),h=e.upgradeAll,g=e.upgradeWithDefinition,b=e.implementPrototype,E=e.useNative,_=["annotation-xml","color-profile","font-face","font-face-src","font-face-uri","font-face-format","font-face-name","missing-glyph"],y={},N="http://www.w3.org/1999/xhtml",M=document.createElement.bind(document),O=document.createElementNS.bind(document);m=Object.__proto__||E?function(e,t){return e instanceof t}:function(e,t){if(e instanceof t)return!0;for(var n=e;n;){if(n===t.prototype)return!0;n=n.__proto__}return!1},w(Node.prototype,"cloneNode"),w(document,"importNode"),document.registerElement=t,document.createElement=p,document.createElementNS=f,e.registry=y,e["instanceof"]=m,e.reservedTagList=_,e.getRegisteredDefinition=u,document.register=document.registerElement}),function(e){function t(){i(window.wrap(document)),window.CustomElements.ready=!0;window.requestAnimationFrame||function(e){setTimeout(e,16)};setTimeout(function(){window.CustomElements.readyTime=Date.now(),window.HTMLImports&&(window.CustomElements.elapsed=window.CustomElements.readyTime-window.HTMLImports.readyTime),document.dispatchEvent(new CustomEvent("WebComponentsReady",{bubbles:!0}))})}var n=e.useNative,o=e.initializeModules;e.isIE;if(n){var r=function(){};e.watchShadow=r,e.upgrade=r,e.upgradeAll=r,e.upgradeDocumentTree=r,e.upgradeSubtree=r,e.takeRecords=r,e["instanceof"]=function(e,t){return e instanceof t}}else o();var i=e.upgradeDocumentTree,a=e.upgradeDocument;if(window.wrap||(window.ShadowDOMPolyfill?(window.wrap=window.ShadowDOMPolyfill.wrapIfNeeded,window.unwrap=window.ShadowDOMPolyfill.unwrapIfNeeded):window.wrap=window.unwrap=function(e){return e}),window.HTMLImports&&(window.HTMLImports.__importsParsingHook=function(e){e["import"]&&a(wrap(e["import"]))}),"complete"===document.readyState||e.flags.eager)t();else if("interactive"!==document.readyState||window.attachEvent||window.HTMLImports&&!window.HTMLImports.ready){var d=window.HTMLImports&&!window.HTMLImports.ready?"HTMLImportsLoaded":"DOMContentLoaded";window.addEventListener(d,t)}else t()}(window.CustomElements);
</script>
  <script data-source="gwdpage_min.js" data-version="12" data-exports-type="gwd-page">(function(){'use strict';var c;var d=function(a,f){var b=document.createEvent("Event");b.initEvent(a,!0,!0);f.dispatchEvent(b)};var e=function(){};goog.inherits(e,HTMLElement);c=e.prototype;c.createdCallback=function(){this.h=this.i.bind(this);this.a=[];this.g=this.b=this.f=!1;var a=parseInt(this.getAttribute("data-gwd-width"),10)||this.clientWidth;this.j=(parseInt(this.getAttribute("data-gwd-height"),10)||this.clientHeight)>=a;this.c=!1};
c.attachedCallback=function(){this.addEventListener("ready",this.h,!1);setTimeout(function(){this.a=Array.prototype.slice.call(this.querySelectorAll("*")).filter(function(a){return"function"!=typeof a.gwdLoad||"function"!=typeof a.gwdIsLoaded||a.gwdIsLoaded()?!1:!0},this);this.g=!0;0<this.a.length?(this.style.visibility="hidden",this.f=!1):g(this);this.b=!0;d("attached",this)}.bind(this),0)};
c.detachedCallback=function(){this.removeEventListener("ready",this.h,!1);this.classList.remove("gwd-play-animation");d("detached",this)};c.gwdActivate=function(){this.classList.remove("gwd-inactive");Array.prototype.slice.call(this.querySelectorAll("*")).forEach(function(a){"function"==typeof a.gwdActivate&&"function"==typeof a.gwdIsActive&&0==a.gwdIsActive()&&a.gwdActivate()});this.c=!0;this.b?this.b=!1:d("attached",this);d("pageactivated",this)};
c.gwdDeactivate=function(){this.classList.add("gwd-inactive");this.classList.remove("gwd-play-animation");var a=Array.prototype.slice.call(this.querySelectorAll("*"));a.push(this);for(var f=0;f<a.length;f++){var b=a[f];if(b.classList&&(b.classList.remove("gwd-pause-animation"),b.hasAttribute("data-gwd-current-label"))){var h=b.getAttribute("data-gwd-current-label");b.classList.remove(h);b.removeAttribute("data-gwd-current-label")}delete b.gwdGotoCounters;b!=this&&"function"==typeof b.gwdDeactivate&&
"function"==typeof b.gwdIsActive&&1==b.gwdIsActive()&&b.gwdDeactivate()}this.c=!1;d("pagedeactivated",this);d("detached",this)};c.gwdIsActive=function(){return this.c};c.gwdIsLoaded=function(){return this.g&&0==this.a.length};c.gwdLoad=function(){if(this.gwdIsLoaded())g(this);else for(var a=this.a.length-1;0<=a;a--)this.a[a].gwdLoad()};c.i=function(a){a=this.a.indexOf(a.target);0<=a&&(this.a.splice(a,1),0==this.a.length&&g(this))};
var g=function(a){a.style.visibility="";a.f||(d("ready",a),d("pageload",a));a.f=!0};e.prototype.gwdPresent=function(){d("pagepresenting",this);this.classList.add("gwd-play-animation")};e.prototype.isPortrait=function(){return this.j};e.prototype.attributeChangedCallback=function(){};document.registerElement("gwd-page",{prototype:e.prototype});}).call(this);
</script>
  <script data-source="gwdpagedeck_min.js" data-version="11" data-exports-type="gwd-pagedeck">(function(){'use strict';var g;var l=["-ms-","-moz-","-webkit-",""],m=function(a,c){for(var b,d,e=0;e<l.length;++e)b=l[e]+"transition-duration",d=""+c,a.style.setProperty(b,d)};function n(a,c,b,d,e,h,f){this.j=a;this.f=c;this.w=b;a=d||"none";this.l=e="none"===a?0:e||1E3;this.g=h||"linear";this.i=[];if(e){h=f||"top";if(f=this.j){f.classList.add("gwd-page");f.classList.add("center");f="center";if("push"==a)switch(h){case "top":f="top";break;case "bottom":f="bottom";break;case "left":f="left";break;case "right":f="right"}this.i.push(f);"fade"==a&&this.i.push("transparent")}f=this.f;e="center";if("none"!=a&&"fade"!=a)switch(h){case "top":e="bottom";break;case "bottom":e="top";
break;case "left":e="right";break;case "right":e="left"}f.classList.add(e);f.classList.add("gwd-page");"fade"==a&&f.classList.add("transparent")}}n.prototype.start=function(){if(this.l){var a=this.j,c=this.f;p(c,this.J.bind(this));a&&(m(a,this.l+"ms"),a.classList.add(this.g));m(c,this.l+"ms");c.classList.add(this.g);c.setAttribute("gwd-reflow",c.offsetWidth);if(a)for(var b=0;b<this.i.length;++b)a.classList.add(this.i[b]);q(c)}else this.w()};
var r=function(a,c,b,d){b="transform: matrix3d(1,0,0,0,0,1,0,0,0,0,1,0,"+b+","+d+",0,1);";return a+"."+c+"{-webkit-"+b+"-moz-"+b+"-ms-"+b+b+"}"},t="center top bottom left right transparent".split(" "),q=function(a){t.forEach(function(c){a.classList.remove(c)})},p=function(a,c){var b=function(){a.removeEventListener("webkitTransitionEnd",b);a.removeEventListener("transitionend",b);c()};a.addEventListener("webkitTransitionEnd",b);a.addEventListener("transitionend",b)};
n.prototype.J=function(){var a=this.j;a&&(q(a),m(a,0),a.classList.remove(this.g));m(this.f,0);this.f.classList.remove(this.g);this.w()};var u=function(a,c,b){if(b){var d=document.createEvent("CustomEvent");d.initCustomEvent(a,!0,!0,b)}else d=document.createEvent("Event"),d.initEvent(a,!0,!0);c.dispatchEvent(d)},w=function(a,c){var b=function(d){a.removeEventListener("attached",b);c(d)};a.addEventListener("attached",b)};var x=function(){};goog.inherits(x,HTMLElement);x.prototype.createdCallback=function(){window.addEventListener("WebComponentsReady",this.I.bind(this),!1);this.u=this.h.bind(this,"shake");this.v=this.h.bind(this,"tilt");this.s=this.h.bind(this,"rotatetoportrait");this.o=this.h.bind(this,"rotatetolandscape");this.a=[];this.A=this.H.bind(this);this.D=this.F.bind(this);this.c=this.B=null;this.b=-1;this.m=!1;this.classList.add("gwd-pagedeck");Object.defineProperty(this,"currentIndex",{enumerable:!0,get:this.G.bind(this)})};
x.prototype.I=function(){this.a=Array.prototype.slice.call(this.querySelectorAll("gwd-page"));this.a.forEach(function(a){a.classList.add("gwd-page")});for(u("beforepagesdetached",this,{pages:this.a.slice()});this.firstChild;)this.removeChild(this.firstChild);-1==this.b&&void 0!==this.C&&this.goToPage(this.C)};
x.prototype.attachedCallback=function(){if(!this.B){var a=this.id;var c=this.offsetWidth;var b=this.offsetHeight;a=(a&&"#")+a+".gwd-pagedeck > .gwd-page";c=r(a,"center",0,0)+r(a,"top",0,b)+r(a,"bottom",0,-b)+r(a,"left",c,0)+r(a,"right",-c,0);b=document.createElement("style");void 0!==b.cssText?b.cssText=c:(b.type="text/css",b.innerText=c);document.head.appendChild(b);this.B=b}this.addEventListener("pageload",this.A,!1);document.body.addEventListener("shake",this.u,!0);document.body.addEventListener("tilt",
this.v,!0);document.body.addEventListener("rotatetoportrait",this.s,!0);document.body.addEventListener("rotatetolandscape",this.o,!0)};x.prototype.detachedCallback=function(){this.removeEventListener("pageload",this.A,!1);document.body&&(document.body.removeEventListener("shake",this.u,!0),document.body.removeEventListener("tilt",this.v,!0),document.body.removeEventListener("rotatetoportrait",this.s,!0),document.body.removeEventListener("rotatetolandscape",this.o,!0))};
var z=function(a,c,b,d,e,h){if(!(a.b==c||0>c||c>a.a.length-1||a.c)){var f=a.a[a.b],k=a.a[c];a.b=c;a.c=new n(f,k,a.D,b,d,e,h);var v=k.gwdLoad&&!k.gwdIsLoaded();a.m=v;w(k,function(){k.gwdActivate();v?k.gwdLoad():y(this)}.bind(a));a.appendChild(k)}};x.prototype.H=function(a){this.m&&a.target.parentNode==this&&(y(this),this.m=!1)};var y=function(a){u("pagetransitionstart",a);a.c.start()};g=x.prototype;
g.F=function(){if(this.c){var a=this.c.j,c=this.c.f;this.c=null;u("pagetransitionend",this,{outgoingPage:a?a:null,incomingPage:c});a&&a.gwdDeactivate();c.gwdPresent()}};g.findPageIndexByAttributeValue=function(a,c){for(var b=this.a.length,d,e=0;e<b;e++)if(d=this.a[e],"boolean"==typeof c){if(d.hasAttribute(a))return e}else if(d.getAttribute(a)==c)return e;return-1};g.goToNextPage=function(a,c,b,d,e){var h=this.b,f=h+1;f>=this.a.length&&(f=a?0:h);z(this,f,c,b,d,e)};
g.goToPreviousPage=function(a,c,b,d,e){var h=this.b,f=this.a.length,k=h-1;0>k&&(k=a?f-1:h);z(this,k,c,b,d,e)};g.goToPage=function(a,c,b,d,e){this.a.length?(a="number"==typeof a?a:this.findPageIndexByAttributeValue("id",a),0<=a&&z(this,a,c,b,d,e)):this.C=a};g.G=function(){return 0<=this.b?this.b:void 0};g.getPages=function(){return this.a};g.getPage=function(a){if("number"!=typeof a){if(!a)return null;a=this.findPageIndexByAttributeValue("id",a)}return 0>a||a>this.a.length-1?null:this.a[a]};
g.getCurrentPage=function(){return this.getPage(this.b)};g.getDefaultPage=function(){var a=this.getAttribute("default-page");return a?this.getPage(this.findPageIndexByAttributeValue("id",a)):this.getPage(0)};g.getOrientationSpecificPage=function(a,c){c=this.getPage(c);var b=c.getAttribute("alt-orientation-page");if(!b)return c;var d=c.isPortrait();a=1==a;b=this.getPage(b);return a==d?c:b};g.h=function(a,c){if(c.target==document.body){var b=this.getPage(this.b);u(a,b,c.detail)}};
g.getElementById=function(a){for(var c=this.a.length,b=0;b<c;b++){var d=this.a[b].querySelector("#"+a);if(d)return d}return null};g.getElementsBySelector=function(a){for(var c=this.a.length,b=[],d=0;d<c;d++){var e=this.a[d].querySelectorAll(a);e&&(b=b.concat(Array.prototype.slice.call(e)))}return b};g.attributeChangedCallback=function(){};document.registerElement("gwd-pagedeck",{prototype:x.prototype});}).call(this);
</script>
  <script data-source="gwdgenericad_min.js" data-version="5" data-exports-type="gwd-genericad">(function(){'use strict';var b;var d=function(){};goog.inherits(d,HTMLElement);b=d.prototype;b.createdCallback=function(){document.body.style.opacity="0";this.c=this.f.bind(this);this.b=this.a=null};b.attachedCallback=function(){this.a=this.querySelector("gwd-pagedeck")||this.querySelector("[is=gwd-pagedeck]");window.addEventListener("resize",this.c,!1)};b.detachedCallback=function(){window.removeEventListener("resize",this.c,!1)};
b.initAd=function(){document.body.style.opacity="";var a=document.createEvent("Event");a.initEvent("adinitialized",!0,!0);this.dispatchEvent(a);this.goToPage()};b.goToPage=function(a,c,e,f,g){this.a.getPage(this.a.currentIndex);if(a=a?this.a.getPage(a):this.a.getDefaultPage())a=this.a.getOrientationSpecificPage(window.innerHeight>=window.innerWidth?1:2,a.id),c?this.a.goToPage(a.id,c,e,f,g):this.a.goToPage(a.id)};
b.f=function(){var a=window.innerHeight>=window.innerWidth?1:2;this.b!=a&&(this.b=a,(a=this.a.getPage(this.a.currentIndex))&&this.goToPage(a.id))};b.exit=function(a,c,e){window.open(a,"_newtab");c&&this.goToPage(e)};b.attributeChangedCallback=function(){};document.registerElement("gwd-genericad",{prototype:d.prototype});}).call(this);
</script>
  <script data-source="gwdimage_min.js" data-version="12" data-exports-type="gwd-image">(function(){'use strict';var c=function(a){return"gwd-page"==a.tagName.toLowerCase()||"gwd-page"==a.getAttribute("is")},f=function(a){if(c(a))return a;for(;a&&9!=a.nodeType;)if((a=a.parentElement)&&c(a))return a;return null},g=function(a,b,d){var e=e||b;a.hasAttribute(b)?(a=a.getAttribute(b),d.setAttribute(e,a)):d.removeAttribute(e)};var h=["height","width","alt"];var k=function(){};goog.inherits(k,HTMLElement);
k.prototype.createdCallback=function(){for(var a;a=this.firstChild;)this.removeChild(a);this.a=document.createElement("img");this.g=this.h.bind(this);this.b=0;this.c=this.f=-1;Object.defineProperty(this,"nativeElement",{enumerable:!0,get:function(){return this.a}});Object.defineProperty(this,"assetWidth",{enumerable:!0,get:function(){return this.f}});Object.defineProperty(this,"assetHeight",{enumerable:!0,get:function(){return this.c}});Object.defineProperty(this,"naturalWidth",{enumerable:!0,get:function(){return this.a.naturalWidth}});
Object.defineProperty(this,"naturalHeight",{enumerable:!0,get:function(){return this.a.naturalHeight}});Object.defineProperty(this,"height",{enumerable:!0,get:function(){return this.a.height},set:function(a){this.a.height=a}});Object.defineProperty(this,"width",{enumerable:!0,get:function(){return this.a.width},set:function(a){this.a.width=a}});Object.defineProperty(this,"alt",{enumerable:!0,get:function(){return this.a.alt},set:function(a){this.a.alt=a}});Object.defineProperty(this,"src",{enumerable:!0,
get:function(){return this.a.src}});a=document.createElement("div");a.classList.add("intermediate-element");a.appendChild(this.a);this.appendChild(a);if(a=this.getAttribute("src"))this.setAttribute("source",a),this.removeAttribute("src");this.a.addEventListener("load",this.g,!1);this.a.addEventListener("error",this.g,!1);for(a=0;a<h.length;a++)g(this,h[a],this.a)};
k.prototype.attachedCallback=function(){if("function"==typeof this.gwdLoad&&"function"==typeof this.gwdIsLoaded&&!this.gwdIsLoaded()){var a=f(this),b=a&&"function"==typeof a.gwdIsLoaded;(!a||b&&a.gwdIsLoaded())&&this.gwdLoad()}};k.prototype.gwdIsLoaded=function(){return 2==this.b||3==this.b};k.prototype.gwdLoad=function(){this.b=1;this.c=this.f=-1;var a=this.getAttribute("source")||"data:image/gif;base64,R0lGODlhAQABAPAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==";this.a.setAttribute("src",a)};
k.prototype.h=function(a){2!=this.b&&(a&&"error"==a.type?(this.b=3,this.c=this.f=-1,this.a.style.backgroundImage=""):(-1!=this.f&&-1!=this.c||!this.getAttribute("source")||(this.f=this.naturalWidth,this.c=this.naturalHeight),this.b=2),l(this),m(this),a=document.createEvent("Event"),a.initEvent("ready",!0,!0),this.dispatchEvent(a))};
var m=function(a){if(2==a.b){var b=a.getAttribute("source"),d=a.getAttribute("scaling")||"stretch";"stretch"==d?(a.classList.remove("scaled-proportionally"),a.a.style.backgroundImage="",a=a.a,b=b||"data:image/gif;base64,R0lGODlhAQABAPAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==",b!=a.getAttribute("src")&&a.setAttribute("src",b)):(a.classList.add("scaled-proportionally"),a.a.style.backgroundImage=b?"url("+JSON.stringify(b)+")":"",a.a.style.backgroundSize="none"!=d?d:"auto",b=a.a,"data:image/gif;base64,R0lGODlhAQABAPAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="!=
b.getAttribute("src")&&b.setAttribute("src","data:image/gif;base64,R0lGODlhAQABAPAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="))}},l=function(a){var b=a.getAttribute("alignment")||"center";a.a.style.backgroundPosition=b};k.prototype.attributeChangedCallback=function(a){"source"==a?0!==this.b&&this.gwdLoad():"scaling"==a?m(this):"alignment"==a?l(this):"alt"==a&&g(this,a,this.a)};document.registerElement("gwd-image",{prototype:k.prototype});}).call(this);
</script>
  <script type="text/javascript" gwd-events="support">var gwd=gwd||{};gwd.actions=gwd.actions||{};gwd.actions.events=gwd.actions.events||{};gwd.actions.events.getElementById=function(id){var element=document.getElementById(id);if(!element){var pageDeck=document.querySelector("gwd-pagedeck")||document.querySelector("[is=gwd-pagedeck]");if(pageDeck){if(typeof pageDeck.getElementById==="function"){element=pageDeck.getElementById(id)}}}if(!element){switch(id){case"document.body":element=document.body;break;case"document":element=document;break;case"window":element=window;break;default:break}}return element};gwd.actions.events.addHandler=function(eventTarget,eventName,eventHandler,useCapture){var targetElement=gwd.actions.events.getElementById(eventTarget);if(targetElement){targetElement.addEventListener(eventName,eventHandler,useCapture)}};gwd.actions.events.removeHandler=function(eventTarget,eventName,eventHandler,useCapture){var targetElement=gwd.actions.events.getElementById(eventTarget);if(targetElement){targetElement.removeEventListener(eventName,eventHandler,useCapture)}};gwd.actions.events.setInlineStyle=function(id,styles){var element=gwd.actions.events.getElementById(id);if(!element||!styles){return}var transitionProperty=element.style.transition!==undefined?"transition":"-webkit-transition";var prevTransition=element.style[transitionProperty];var splitStyles=styles.split(/\s*;\s*/);var nameValue;splitStyles.forEach(function(splitStyle){if(splitStyle){var regex=new RegExp("[:](?![/]{2})");nameValue=splitStyle.split(regex);nameValue[1]=nameValue[1]?nameValue[1].trim():null;if(!(nameValue[0]&&nameValue[1])){return}element.style.setProperty(nameValue[0],nameValue[1])}});function restoreTransition(event){var el=event.target;el.style.transition=prevTransition;el.removeEventListener(event.type,restoreTransition,false)}element.addEventListener("transitionend",restoreTransition,false);element.addEventListener("webkitTransitionEnd",restoreTransition,false)};gwd.actions.timeline=gwd.actions.timeline||{};gwd.actions.timeline.dispatchTimedEvent=function(event){var customEventTarget=event.target;if(customEventTarget){var customEventName=customEventTarget.getAttribute("data-event-name");if(customEventName){event.stopPropagation();var event=document.createEvent("CustomEvent");event.initCustomEvent(customEventName,true,true,null);customEventTarget.dispatchEvent(event)}}};gwd.actions.timeline.captureAnimationEnd=function(element){if(!element){return}var animationEndEvents=["animationend","webkitAnimationEnd"];for(var i=0;i<animationEndEvents.length;i++){element.addEventListener(animationEndEvents[i],gwd.actions.timeline.dispatchTimedEvent,true)}};gwd.actions.timeline.releaseAnimationEnd=function(element){if(!element){return}var animationEndEvents=["animationend","webkitAnimationEnd"];for(var i=0;i<animationEndEvents.length;i++){element.removeEventListener(animationEndEvents[i],gwd.actions.timeline.dispatchTimedEvent,true)}};gwd.actions.timeline.pauseAnimationClassName="gwd-pause-animation";gwd.actions.timeline.CURRENT_LABEL_ANIMATION="data-gwd-current-label";gwd.actions.timeline.reflow=function(el){el.offsetWidth=el.offsetWidth};gwd.actions.timeline.pause=function(id){var el=gwd.actions.events.getElementById(id);el&&el.classList&&el.classList.add(gwd.actions.timeline.pauseAnimationClassName)};gwd.actions.timeline.play=function(id){var el=gwd.actions.events.getElementById(id);el&&el.classList&&el.classList.remove(gwd.actions.timeline.pauseAnimationClassName)};gwd.actions.timeline.togglePlay=function(id){var el=gwd.actions.events.getElementById(id);el&&el.classList&&el.classList.toggle(gwd.actions.timeline.pauseAnimationClassName)};gwd.actions.timeline.gotoAndPlay=function(id,animClass){var el=gwd.actions.events.getElementById(id);if(!(el&&el.classList&&id&&animClass)){return false}var currentLabelAnimClass=el.getAttribute(gwd.actions.timeline.CURRENT_LABEL_ANIMATION);if(currentLabelAnimClass){el.classList.remove(currentLabelAnimClass);el.removeAttribute(gwd.actions.timeline.CURRENT_LABEL_ANIMATION)}gwd.actions.timeline.play(id);if(currentLabelAnimClass==animClass){gwd.actions.timeline.reflow(el)}el.classList.add(animClass);el.setAttribute(gwd.actions.timeline.CURRENT_LABEL_ANIMATION,animClass);return true};gwd.actions.timeline.gotoAndPause=function(id,animClass){var el=gwd.actions.events.getElementById(id);if(!(el&&el.classList)){return false}if(gwd.actions.timeline.gotoAndPlay(id,animClass)){var timeoutId=window.setTimeout(function(){el.classList.add(gwd.actions.timeline.pauseAnimationClassName)},40)}return!!timeoutId};gwd.actions.timeline.gotoAndPlayNTimes=function(id,animClass,count,eventName){var el=gwd.actions.events.getElementById(id);el.gwdGotoCounters=el.gwdGotoCounters||{};var counters=el.gwdGotoCounters;var counterName=eventName+"_"+animClass+"_counter";if(typeof counters[counterName]=="undefined"){counters[counterName]=0}if(counters[counterName]<count){gwd.actions.timeline.gotoAndPlay(id,animClass)}counters[counterName]++}</script>
  <script type="text/javascript" gwd-events="handlers">gwd.auto_Page1Event_1=function(event){gwd.actions.timeline.gotoAndPlay("page1","label-1")}</script>
  <script type="text/javascript" gwd-events="registration">gwd.actions.events.registerEventHandlers=function(event){gwd.actions.events.addHandler("page1","event-1",gwd.auto_Page1Event_1,false);gwd.actions.timeline.captureAnimationEnd(document.body)};gwd.actions.events.deregisterEventHandlers=function(event){gwd.actions.events.removeHandler("page1","event-1",gwd.auto_Page1Event_1,false);gwd.actions.timeline.releaseAnimationEnd(document.body)};document.addEventListener("DOMContentLoaded",gwd.actions.events.registerEventHandlers);document.addEventListener("unload",gwd.actions.events.deregisterEventHandlers)</script>

</head>

<body <?php body_class('sticky-header'); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K24SSJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!--custom Branding-->
<?php if (is_single()) { ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.12&appId=574147689456312&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php } ?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'liroom-lite' ); ?></a>
	<div class="header-top">
      <div class="container">
        <div class="mag-content">
          <div class="row">
            <div class="col-md-12">
			  <div class="menu-liroom-container">
				<?php if ( has_nav_menu( 'top' ) ): ?>
				<div class="top-navigation">
					<?php wp_nav_menu( array('theme_location' => 'top', 'container' => 'top-menu', 'container' => 'top-menu', 'fallback_cb' => false ) ); ?>
				</div>
				<?php endif; ?>
			  </div>
			  <div class="social-icons pull-right"><?php liroom_social(true,true); ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
	<?php do_action( 'liroom_before_topbar' ); ?>
	<div id="topbar" class="site-topbar">
		<div class="container">
			<div class="topbar-left pull-left">
				<nav id="site-navigation" class="main-navigation" >
					<span class="nav-toggle"><a href="#0" id="nav-toggle"><?php esc_html_e( 'Menu', 'liroom-lite' ); ?><span></span></a></span>
					<ul class="ft-menu">
						<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => '', 'items_wrap' => '%3$s', 'fallback_cb' => 'liroom_link_to_menu_editor' ) ); ?>
					</ul>
					<?php
						$liroom_site_logo = get_theme_mod( 'liroom_site_logo', apply_filters('customizer_default_logo', '' ) );
						if ( isset( $liroom_site_logo ) && $liroom_site_logo != '' ) {
							echo '<a title="'. get_bloginfo( 'name' ) .'" class="site-logo" href="' . esc_url( home_url( '/' ) ) . '" rel="home"><img src="'. esc_url( $liroom_site_logo ) .'" alt="'. get_bloginfo( 'name' ) .'"></a>';
						}
					?>
				</nav><!-- #site-navigation -->
			</div>
			<div class="topbar-right pull-right">
				<ul class="topbar-elements">
					<?php do_action( 'liroom_before_topbar_search' ); ?>
					<li class="topbar-search">
						<a href="javascript:void(0)"><i class="search-icon fa fa-search"></i></a>
						<div class="dropdown-content dropdown-search">
							<?php get_search_form( true ); ?>
						</div>
					</li>
					<?php do_action( 'liroom_after_topbar_search' ); ?>
					<div class="clear"></div>
				</ul>
			</div>
		</div>
	</div><!--topbar-->
	<?php do_action( 'liroom_after_topbar' ); ?>

	<div class="mobile-navigation">
		<?php do_action( 'liroom_before_mobile_navigation' ); ?>
		<ul>
			<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => '', 'items_wrap' => '%3$s', 'fallback_cb' => 'liroom_link_to_menu_editor' ) ); ?>
		</ul>
		<?php do_action( 'liroom_after_mobile_navigation' ); ?>
	</div>
	<?php if ( is_active_sidebar( 'ads-before' ) ) { ?>
	<div class="ads-before">
		<?php dynamic_sidebar( 'ads-before' ); ?>
	</div>
	<?php } ?>
	<div class="header_fixed">
      <div class="container">
        <div class="mag-content">
          <div class="row">
            <div class="col-md-12">

            <a class="navbar-toggle collapsed" id="nav-button" href="#mobile-nav">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>


            <nav class="navbar mega-menu">

					<?php
						$liroom_site_logo = get_theme_mod( 'liroom_site_logo', apply_filters('customizer_default_logo', '' ) );
						if ( isset( $liroom_site_logo ) && $liroom_site_logo != '' ) {
							echo '<a title="'. get_bloginfo( 'name' ) .'" class="site-logo" href="' . esc_url( home_url( '/' ) ) . '" rel="home"><img src="'. esc_url( $liroom_site_logo ) .'" alt="'. get_bloginfo( 'name' ) .'"></a>';
						}
					?>

				<?php
					global $wp;
					$current_url = home_url(add_query_arg(array(),$wp->request));

					if (is_front_page()) {
						if ( $header_layout != '5' ):
						  wp_nav_menu( array(
							'menu'              => 'primary',
							'theme_location'    => 'primary',
							'container'         => 'div',
							'container_class'   => 'collapse navbar-collapse',
							'menu_class'        => 'nav navbar-nav ft-menu',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback')
						  );
						endif;
					}else {
						$the_ID = get_the_ID();
						$page_term = '';

						if (is_category()) {
							$taxonomy = get_queried_object();
							$page_title = $taxonomy->name;
						}else if (is_search()) {
							$page_title = '';
							if (isset($_GET['s']) && $_GET['s'] != '')$page_title = get_bloginfo( 'name' ).' :: '.$_GET['s'];
						}else if ($the_ID != '') {
							$taxonomy = 'category';
							$args = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all');
							$terms = wp_get_post_terms( get_the_ID(), $taxonomy, $args );
							foreach ($terms as $item)
								if ($item->parent == 0) {
									$page_term = $item->name;
									$page_link = $item->slug ;
									console_log($item);
								}
							$page_title = $wp_query->post->post_title;
						}else {
							$page_title = $wp_query->post->post_title;
						}
					?>
					<ul class="breadcrumbs pull-left">
						<?php if ($page_term != '') { ?><li class="cat"><a href="<?php echo site_url().'/'.$page_link.'/';?>" title="<?php echo $page_term;?>"><?php echo $page_term;?></a></li><?php } ?>
						<?php if ($page_title != '') { ?><li><h5 class="title"><?php echo $page_title;?></h5></li><?php } ?>
					</ul>
					<?php } ?>

				<div class="topbar-right pull-right">
					<ul class="topbar-elements">
						<?php do_action( 'liroom_before_topbar_search' ); ?>
						<li class="topbar-search">
							<a href="javascript:void(0)"><i class="search-icon fa fa-search"></i></a>
							<div class="dropdown-content dropdown-search">
								<?php get_search_form( true ); ?>
							</div>
						</li>
						<?php do_action( 'liroom_after_topbar_search' ); ?>
						<div class="clear"></div>
					</ul>
				</div>
				<div class="social-icons pull-right"><?php liroom_social(true,true); ?></div>
                 </nav>
            </div>
          </div>
        </div><!-- .header-fixed -->
      </div><!-- .container -->
    </div>
