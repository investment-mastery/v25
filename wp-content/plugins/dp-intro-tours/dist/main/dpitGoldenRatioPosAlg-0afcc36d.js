/*!
 * 
 * Intro Tour Tutorial
 * 
 * @author [object Object]
 * @version 6.4.4
 * @link http://www.gnu.org/licenses/gpl-2.0.txt
 * @license GPL-2.0+
 * 
 * Copyright (c) 2023 [object Object]
 * 
 * This plugin is released under GPL-2.0+ license to be included in wordpres.org plugin repository
 * 
 * Compiled with the help of https://wpack.io
 * A zero setup Webpack Bundler Script for WordPress
 */
(window.wpackiodpIntroToursmainJsonp=window.wpackiodpIntroToursmainJsonp||[]).push([[20],{39:function(t,e,o){"use strict";o.r(e);var i=o(4),s=o(6),l=o(7);const n=(t,e,o)=>{let i=t.width/e.width,s=t.height/e.height;return o?i-s:s-i},r=(t,e,o,i,s,l,n)=>{let r=Math.sign(t)<0;e&&(r=o);let h=[0,0];switch(n.base){case"left":h=r?[i.left,s.left]:[s.left,l.left];break;case"right":h=r?[s.right,i.right]:[l.right,s.right];break;case"top":h=r?[i.top,s.top]:[s.top,l.top];break;case"bottom":h=r?[s.bottom,i.bottom]:[l.bottom,s.bottom]}return Math.floor((r?-1:1)*(h[1]-h[0])/2)},h=(t,e,o,l,n,r,h)=>{if(r){if(l.width-t<h)return!1;const s={...l};if(o.style.width=Object(i.u)(l.width-t)+"px","left"===n.base){const t=$(o).outerWidth(!1);t!==s.width&&(o.style.left=Object(i.d)(l.left-(t-s.width)-e.left)+"px")}switch(n.align){case"middle":{const t=$(o).outerHeight(!1);t!==s.height&&(o.style.top=Object(i.h)((e.height-t)/2)+"px");break}case"bottom":{const t=$(o).outerHeight(!1);t!==s.height&&(o.style.top=Object(i.h)(l.bottom-t+1-e.top)+"px");break}}}else{if(l.width+t<h)return!1;const r=l.height,a=l.width,c=Object(s.d)(o,"left",0);o.style.width=Object(i.u)(l.width+t)+"px";const u=$(o).outerWidth(!1),f=u-a;if(a!==u&&("center"===n.align?o.style.left=Object(i.u)(c-f/2)+"px":"right"===n.align&&(o.style.left=Object(i.u)(l.left-f-e.left)+"px")),"top"===n.base){const t=$(o).outerHeight(!1);t!==r&&(o.style.top=Object(i.h)(l.top-(t-r)-e.top)+"px")}}return!0},a=(t,e,o,i,s)=>(i&&(e?console.log("[dpit] GOLDEN RATIO:","success (by ".concat(o," iterations)")):console.log("[dpit] GOLDEN RATIO: ".concat(s),"iterations: ".concat(o))),{wasPosAdjusted:e,isOverHeight:t}),c=(t,e,o,i,s,l)=>(e.setAttribute("style",t),i--,a(o,i>0,i,s,l)),u=t=>{let e=t.getAttribute("style");return null!==e&&("object"==typeof e&&(e=e.cssText),e)};e.default=function(t,e,o,i,s,f,b,d,g){let p=arguments.length>9&&void 0!==arguments[9]?arguments[9]:10;const w=e.height>s.height,O=["left","right"].includes(i.base);let m=0,y=u(o),j={...e},x=null,v=w,M=null,k=null,A=n(j,s,O);for(;m<p;){let e=!1;if(!v)if(k){const t=Math.abs(k)-Math.abs(A);e=Math.abs(A)<=.1||t<=.05}else e=Math.abs(A)<=.03;if(e)return a(v,m>0,m,g,"was not needed");const p=r(A,v,O,f,j,0===m?t:j,i);m++;let H=!1;if(p&&h(p,t,o,j,i,O,d)){j=l.default.fromElement(o,b);const t=s;var T;if(!(j&&j.left>=t.left-1&&j.right<=t.right+1))return c(y,o,null!==(T=M)&&void 0!==T?T:w,m,g,"out of win");H=!0}var $,E;if(!H||x&&l.default.isEqual(x,j))return c(y,o,null!==($=M)&&void 0!==$?$:w,m,g,"no effect");if(v=j.height>s.height,k=A,A=n(j,s,O),k&&!v&&Math.abs(A)>Math.abs(k))return c(y,o,null!==(E=M)&&void 0!==E?E:w,m,g,"worse feature");y=u(o),x={...j},M=v}return a(w,!1,m,g,"too many iterations")}}}]);
//# sourceMappingURL=dpitGoldenRatioPosAlg-0afcc36d.js.map