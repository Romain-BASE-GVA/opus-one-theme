/**
 * SplitType
 * https://github.com/lukePeavey/SplitType
 * @version 0.3.0
 * @author Luke Peavey <lwpeavey@gmail.com>
 */

 !function(t,e){"object"==typeof exports&&"undefined"!=typeof module?module.exports=e():"function"==typeof define&&define.amd?define(e):(t="undefined"!=typeof globalThis?globalThis:t||self).SplitType=e()}(this,(function(){"use strict";function t(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}function e(t,e){return function(t){if(Array.isArray(t))return t}(t)||function(t,e){var n=null==t?null:"undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"];if(null==n)return;var r,i,o=[],a=!0,s=!1;try{for(n=n.call(t);!(a=(r=n.next()).done)&&(o.push(r.value),!e||o.length!==e);a=!0);}catch(t){s=!0,i=t}finally{try{a||null==n.return||n.return()}finally{if(s)throw i}}return o}(t,e)||r(t,e)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function n(t){return function(t){if(Array.isArray(t))return i(t)}(t)||function(t){if("undefined"!=typeof Symbol&&null!=t[Symbol.iterator]||null!=t["@@iterator"])return Array.from(t)}(t)||r(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function r(t,e){if(t){if("string"==typeof t)return i(t,e);var n=Object.prototype.toString.call(t).slice(8,-1);return"Object"===n&&t.constructor&&(n=t.constructor.name),"Map"===n||"Set"===n?Array.from(t):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?i(t,e):void 0}}function i(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,r=new Array(e);n<e;n++)r[n]=t[n];return r}function o(t,e){return Object.getOwnPropertyNames(Object(t)).reduce((function(n,r){var i=Object.getOwnPropertyDescriptor(Object(t),r),o=Object.getOwnPropertyDescriptor(Object(e),r);return Object.defineProperty(n,r,o||i)}),{})}function a(t){return"string"==typeof t}function s(t){return Array.isArray(t)}function c(){var t,e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},n=o(e);return void 0!==n.types?t=n.types:void 0!==n.split&&(t=n.split),void 0!==t&&(n.types=(a(t)||s(t)?String(t):"").split(",").map((function(t){return String(t).trim()})).filter((function(t){return/((line)|(word)|(char))/i.test(t)}))),(n.absolute||n.position)&&(n.absolute=n.absolute||/absolute/.test(e.position)),n}function l(t){var e=a(t)||s(t)?String(t):"";return{none:!e,lines:/line/i.test(e),words:/word/i.test(e),chars:/char/i.test(e)}}function u(t){return null!==t&&"object"==typeof t}function d(t){return s(t)?t:null==t?[]:function(t){return u(t)&&function(t){return"number"==typeof t&&t>-1&&t%1==0}(t.length)}(t)?Array.prototype.slice.call(t):[t]}function f(t){return u(t)&&/^(1|3|11)$/.test(t.nodeType)}function p(t){var e=t;return a(t)&&(e=/^(#[a-z]\w+)$/.test(t.trim())?document.getElementById(t.trim().slice(1)):document.querySelectorAll(t)),d(e).reduce((function(t,e){return[].concat(n(t),n(d(e).filter(f)))}),[])}function h(t,e,n){var r={},i=null;return u(t)&&(i=t[h.expando]||(t[h.expando]=++h.uid),r=h.cache[i]||(h.cache[i]={})),void 0===n?void 0===e?r:r[e]:void 0!==e?(r[e]=n,n):void 0}function y(t){var e=t&&t[h.expando];e&&(delete t[e],delete h.cache[e])}!function(){function t(){for(var t=arguments.length,e=0;e<t;e++){var n=e<0||arguments.length<=e?void 0:arguments[e];1===n.nodeType||11===n.nodeType?this.appendChild(n):this.appendChild(document.createTextNode(String(n)))}}function e(){for(;this.lastChild;)this.removeChild(this.lastChild);arguments.length&&this.append.apply(this,arguments)}function n(){for(var t=this.parentNode,e=arguments.length,n=new Array(e),r=0;r<e;r++)n[r]=arguments[r];var i=n.length;if(t)for(i||t.removeChild(this);i--;){var o=n[i];"object"!=typeof o?o=this.ownerDocument.createTextNode(o):o.parentNode&&o.parentNode.removeChild(o),i?t.insertBefore(this.previousSibling,o):t.replaceChild(o,this)}}Element.prototype.append||(Element.prototype.append=t,DocumentFragment.prototype.append=t),Element.prototype.replaceChildren||(Element.prototype.replaceChildren=e,DocumentFragment.prototype.replaceChildren=e),Element.prototype.replaceWith||(Element.prototype.replaceWith=n,DocumentFragment.prototype.replaceWith=n)}(),h.expando="splitType".concat(1*new Date),h.cache={},h.uid=0;var m="\\ud800-\\udfff",g="\\u0300-\\u036f\\ufe20-\\ufe23",v="\\u20d0-\\u20f0",b="\\ufe0e\\ufe0f",w="[".concat(m,"]"),C="[".concat(g).concat(v,"]"),E="\\ud83c[\\udffb-\\udfff]",S="(?:".concat(C,"|").concat(E,")"),x="[^".concat(m,"]"),T="(?:\\ud83c[\\udde6-\\uddff]){2}",j="[\\ud800-\\udbff][\\udc00-\\udfff]",O="\\u200d",W="".concat(S,"?"),A="[".concat(b,"]?"),N=A+W+("(?:\\u200d(?:"+[x,T,j].join("|")+")"+A+W+")*"),k="(?:".concat(["".concat(x).concat(C,"?"),C,T,j,w].join("|"),"\n)"),D=RegExp("".concat(E,"(?=").concat(E,")|").concat(k).concat(N),"g"),L=RegExp("[".concat([O,m,g,v,b].join(""),"]"));function H(t){return L.test(t)}function M(t){return H(t)?function(t){return t.match(D)||[]}(t):function(t){return t.split("")}(t)}function P(t){return null==t?"":String(t)}function $(t){return document.createTextNode(t)}function B(t,e){var n=document.createElement(t);return e?(Object.keys(e).forEach((function(t){var r=e[t];null!==r&&("textContent"===t||"innerHTML"===t?n[t]=r:"children"===t?d(r).forEach((function(t){f(t)&&n.appendChild(t),a(t)&&n.appendChild($(t))})):n.setAttribute(t,String(r).trim()))})),n):n}var F={splitClass:"",lineClass:"line",wordClass:"word",charClass:"char",types:["lines","words","chars"],absolute:!1,tagName:"div"};function I(t,e){var r,i=l((e=o(F,e)).types),s=e.tagName,c=(t.nodeValue||"").replace(/\s+/g," ").trim(),u=document.createDocumentFragment(),d=[];return/^\s/.test(t.nodeValue)&&u.append(" "),r=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:" ";return(t=t?String(t):"").split(e)}(c).reduce((function(t,r,o,c){var l,f;return i.chars&&(f=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"";return(t=P(t))&&a(t)&&!e&&H(t)?M(t):t.split(e)}(r).map((function(t){var r=B(s,{class:"".concat(e.splitClass," ").concat(e.charClass),style:"display: inline-block;",children:t});return h(r).isChar=!0,d=[].concat(n(d),[r]),r}))),i.words||i.lines?(h(l=B(s,{class:"".concat(e.wordClass," ").concat(e.splitClass),style:"display: inline-block; position: ".concat(i.words?"relative":"static"),children:i.chars?f:r})).isWord=!0,h(l).isWordStart=!0,h(l).isWordEnd=!0,u.appendChild(l)):f.forEach((function(t){u.appendChild(t)})),o<c.length-1&&u.appendChild($(" ")),i.words?t.concat(l):t}),[]),/\s$/.test(t.nodeValue)&&u.append(" "),t.replaceWith(u),{words:r,chars:d}}function R(t,e){if(3===t.nodeType)return I(t,e);var r=d(t.childNodes);if(r.length&&(h(t).isSplit=!0,!h(t).isRoot)){t.style.display="inline-block",t.style.position="relative";var i=t.nextSibling,o=t.previousSibling,a=t.textContent||"",s=i?i.textContent:" ",c=o?o.textContent:" ";h(t).isWordEnd=/\s$/.test(a)||/^\s/.test(s),h(t).isWordStart=/^\s/.test(a)||/\s$/.test(c)}return r.reduce((function(t,r){var i=R(r,e),o=i.words,a=i.chars;return{words:[].concat(n(t.words),n(o)),chars:[].concat(n(t.chars),n(a))}}),{words:[],chars:[]})}function V(t){h(t).isWord?t.replaceWith.apply(t,n(t.childNodes)):d(t.children).forEach((function(t){return V(t)}))}function z(t,n,r){var i,o,a,s=l(n.types),c=n.tagName,u=t.getElementsByTagName("*"),f=[],p=[],y=null,m=[];h(t).nodes=u;var g=t.parentElement,v=t.nextElementSibling,b=document.createDocumentFragment(),w=window.getComputedStyle(t),C=w.textAlign,E=.2*parseFloat(w.fontSize);return n.absolute&&(a={left:t.offsetLeft,top:t.offsetTop,width:t.offsetWidth},o=t.offsetWidth,i=t.offsetHeight,h(t).cssWidth=t.style.width,h(t).cssHeight=t.style.height),d(u).forEach((function(i){var o=i.parentElement===t,a=function(t,n,r,i){if(!r.absolute)return{top:n?t.offsetTop:null};var o=t.offsetParent,a=e(i,2),s=a[0],c=a[1],l=0,u=0;if(o&&o!==document.body){var d=o.getBoundingClientRect();l=d.x+s,u=d.y+c}var f=t.getBoundingClientRect(),p=f.width,h=f.height,y=f.x;return{width:p,height:h,top:f.y+c-u,left:y+s-l}}(i,o,n,r),c=a.width,l=a.height,u=a.top,d=a.left;/^br$/i.test(i.nodeName)||(s.lines&&o&&((null===y||u-y>=E)&&(y=u,f.push(p=[])),p.push(i)),n.absolute&&(h(i).top=u,h(i).left=d,h(i).width=c,h(i).height=l))})),g&&g.removeChild(t),s.lines&&(m=f.map((function(t){var e=B(c,{class:"".concat(n.splitClass," ").concat(n.lineClass),style:"display: block; text-align: ".concat(C,"; width: 100%;")});h(e).isLine=!0;var r={height:0,top:1e4};return b.appendChild(e),t.forEach((function(t,n,i){var o=h(t),a=o.isWordEnd,s=o.top,c=o.height,l=i[n+1];r.height=Math.max(r.height,c),r.top=Math.min(r.top,s),e.appendChild(t),a&&h(l).isWordStart&&e.append(" ")})),n.absolute&&(h(e).height=r.height,h(e).top=r.top),e})),s.words||V(b),t.replaceChildren(b)),n.absolute&&(t.style.width="".concat(t.style.width||o,"px"),t.style.height="".concat(i,"px"),d(u).forEach((function(t){var e=h(t),n=e.isLine,r=e.top,i=e.left,o=e.width,s=e.height,c=h(t.parentElement),l=!n&&c.isLine;t.style.top="".concat(l?r-c.top:r,"px"),t.style.left="".concat(n?a.left:i-(l?a.left:0),"px"),t.style.height="".concat(s,"px"),t.style.width="".concat(n?a.width:o,"px"),t.style.position="absolute"}))),g&&(v?g.insertBefore(t,v):g.appendChild(t)),m}var q=o(F,{});return function(){function e(t,n){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,e),this.isSplit=!1,this.settings=o(q,c(n)),this.elements=p(t)||[],this.revert(),this.elements.forEach((function(t){h(t).html=t.innerHTML})),this.split()}var r,i,a;return r=e,a=[{key:"defaults",get:function(){return q},set:function(t){q=o(q,c(t))}},{key:"setDefaults",value:function(t){return q=o(q,c(t)),F}},{key:"revert",value:function(t){p(t).forEach((function(t){var e=h(t),n=e.isSplit,r=e.html;n&&(t.innerHTML=r||"",h(t).isSplit=!1,h(t).html=null)}))}},{key:"create",value:function(t,n){return new e(t,n)}}],(i=[{key:"split",value:function(t){var e=this;this.revert(),this.lines=[],this.words=[],this.chars=[];var r=[window.pageXOffset,window.pageYOffset];void 0!==t&&(this.settings=o(this.settings,c(t)));var i=l(this.settings.types);i.none||(this.elements.forEach((function(t){h(t).isRoot=!0;var r=R(t,e.settings),i=r.words,o=r.chars;e.words=[].concat(n(e.words),n(i)),e.chars=[].concat(n(e.chars),n(o))})),this.elements.forEach((function(t){if(i.lines||e.settings.absolute){var o=z(t,e.settings,r);e.lines=[].concat(n(e.lines),n(o))}})),this.isSplit=!0,window.scrollTo(r[0],r[1]),this.elements.forEach((function(t){d(h(t).nodes).forEach(y),h(t).nodes=null})))}},{key:"revert",value:function(){this.elements.forEach((function(t){var e=h(t),n=e.isSplit,r=e.html,i=e.cssWidth,o=e.cssHeight;n&&(t.innerHTML=r,t.style.width=i||"",t.style.height=o||"",h(t).isSplit=!1)})),this.isSplit&&(this.lines=null,this.words=null,this.chars=null,this.isSplit=!1)}}])&&t(r.prototype,i),a&&t(r,a),Object.defineProperty(r,"prototype",{writable:!1}),e}()}));