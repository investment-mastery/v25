/*!
 * 
 * Intro Tour Tutorial PRO
 * 
 * @author [object Object]
 * @version 4.4.0
 * @link #
 * @license 
 * 
 * Copyright (c) 2022 [object Object]
 * 
 * Copyright (c) 2020 DeepPresentation <Tomáš Groulík>. All rights reserved.
 * 
 * Compiled with the help of https://wpack.io
 * A zero setup Webpack Bundler Script for WordPress
 */
(window.wpackiodpIntroToursmainJsonp=window.wpackiodpIntroToursmainJsonp||[]).push([[4],{108:function(o,n,r){r(15),o.exports=r(109)},109:function(o,n){jQuery(document).ready((function(o){window.dpIntroTourCreateNewConfig.dpDebugEn&&console.log("dp-intro-create-new"),o("#wp-admin-bar-create-new-tour a, #wp-admin-bar-new-dp_intro_tours a").on("click",(function(n){n.preventDefault();var r=prompt(window.dpIntroTourCreateNewConfig.i18n.setNewTourNamePrompt,window.dpIntroTourCreateNewConfig.defaultTourName);if(r){var t=o(n.target).attr("href");t&&(window.location="".concat(t,"&").concat(window.dpIntroTourCreateNewConfig.tourNameQParamName,"=").concat(r))}}))}))},15:function(o,n,r){var t="dpIntroToursdist".replace(/[^a-zA-Z0-9_-]/g,"");r.p=window["__wpackIo".concat(t)]}},[[108,0]]]);