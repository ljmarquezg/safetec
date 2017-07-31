"use strict";(function(ap){var y="mousedown",ai="mousemove",Y="mouseup",ak="mousewheel",L="resize",b="change",aw="load",h="click";var K=null,k=null,B=null,t=null,an=null,aa=null,az={},r={},x={},e=new Image,v=ap(document),C=ap(window),al=1,s=0,l=null,G=null,X=null,p=null,T=null,u=null,I=null,n={},A=[{width:200,height:200,minWidth:200,minHeight:200,maxWidth:350,maxHeight:350}],E=[];var ar={init:function(aB){K=ap(this);G=ap(aB.selectors.inputFile);u=ap(aB.selectors.inputInfo);X=ap(aB.selectors.btnReset);p=ap(aB.selectors.btnCrop);T=ap(aB.selectors.resultContainer);A=aB.variants||A;n=aB.imageOptions||n;E=aB.messages||E;if(typeof aB.selectors.messageBlock!="undefined"){I=ap(aB.selectors.messageBlock)}W();H();M();V();ad()}};var H=function(){B=K.find(".image-cropbox");k=K.find(".frame-cropbox");t=K.find(".workarea-cropbox");an=K.find(".membrane-cropbox");aa=K.find(".resize-cropbox")},ad=function(){k.on(y,f);k.on(ai,R);v.on(Y,av);aa.on(y,ay);v.on(ai,z);v.on(Y,N);an.on(y,j);an.on(ai,S);an.on(Y,au);an.on(ak,am);C.on(L,at);G.on(b,F);p.on(h,d);X.on(h,Q)},F=function(){var aB=new FileReader();aB.readAsDataURL(this.files[0]);ap(aB).one(aw,P)},d=function(){var aB=k.position().left-B.position().left,aG=k.position().top-B.position().top,aC=k.width(),aE=k.height(),aD=ap("<canvas/>").attr({width:aC,height:aE})[0],aF=null;aD.getContext("2d").drawImage(B[0],0,0,e.width,e.height,-aB,-aG,B.width(),B.height());aF=aD.toDataURL("image/png");af({sWidth:e.width,sHeight:e.height,x:aB,y:aG,dWidth:B.width(),dHeight:B.height(),ratio:al,width:aC,height:aE,image:aF});Z(ap("<img>",ap.extend(n,{src:aF})));if(ao()){q()}},J=function(){var aB=aj(),aD=t.width()/2-aB.width/2,aC=t.height()/2-aB.height/2;k.css({width:aB.width,height:aB.height,backgroundImage:'url("'+e.src+'")'});U(aD,aC)},U=function(aE,aD){var aF=B.position().left,aC=B.position().top,aB=aF-aE,aG=aC-aD;if(aB>0){aB=0;aE=aF}else{if(B.width()+aF<aE+k.width()){aB=k.width()-B.width();aE=aF+B.width()-k.width()}}if(aG>0){aG=0;aD=aC}else{if(B.height()+aC<aD+k.height()){aG=k.height()-B.height();aD=aC+B.height()-k.height()}}k.css({left:aE,top:aD,backgroundPosition:aB+"px "+aG+"px"})},ab=function(aC,aM){var aN=B.position().left,aH=B.position().top,aG=k.position().left,aD=k.position().top,aI=k.width(),aE=k.height(),aF=aj(),aK=aF.maxWidth,aJ=aF.maxHeight,aB=aF.minWidth,aL=aF.minHeight;if(aC>aI&&typeof aK=="undefined"){aK=aI}else{if(aC<aI&&typeof aB=="undefined"){aB=aI}}if(aM>aE&&typeof aJ=="undefined"){aJ=aE}else{if(aM<aE&&typeof aL=="undefined"){aL=aE}}if(aC>aK){aC=aK}else{if(aC<aB){aC=aB}}if(B.width()+aN<aG+aC){aC=B.width()+aN-aG}if(aM>aJ){aM=aJ}else{if(aM<aL){aM=aL}}if(B.height()+aH<aD+aM){aM=B.height()+aH-aD}k.css({width:aC,height:aM})},f=function(aB){az.dragable=true;az.mouseX=aB.clientX;az.mouseY=aB.clientY},R=function(aD){if(az.dragable){var aC=k.position().left,aB=k.position().top,aF=aD.clientX-az.mouseX+aC,aE=aD.clientY-az.mouseY+aB;az.mouseX=aD.clientX;az.mouseY=aD.clientY;U(aF,aE)}},av=function(aB){aB.preventDefault();aB.stopPropagation();az.dragable=false},ay=function(aB){aB.stopImmediatePropagation();x.dragable=true;x.mouseX=aB.clientX;x.mouseY=aB.clientY},z=function(aD){if(x.dragable){var aE=k.width(),aF=k.height(),aC=aD.clientX-x.mouseX+aE,aB=aD.clientY-x.mouseY+aF;x.mouseX=aD.clientX;x.mouseY=aD.clientY;ab(aC,aB)}},N=function(aB){aB.preventDefault();aB.stopPropagation();x.dragable=false},j=function(aB){r.dragable=true;r.mouseX=aB.clientX;r.mouseY=aB.clientY},S=function(aD){if(r.dragable){var aC=B.position().left,aB=B.position().top,aF=aD.clientX-r.mouseX+aC,aE=aD.clientY-r.mouseY+aB;r.mouseX=aD.clientX;r.mouseY=aD.clientY;w(aF,aE);az.mouseX=aD.clientX;az.mouseY=aD.clientY;U(k.position().left,k.position().top)}},au=function(aB){aB.preventDefault();aB.stopPropagation();r.dragable=false},w=function(aC,aB){B.css({left:aC,top:aB})},ae=function(){var aC=B.width()/2-t.width()/2,aB=B.height()/2-t.height()/2;w(-aC,-aB)},P=function(aB){ap(e).one(aw,function(){B.one(aw,o);B.attr("src",this.src)});e.src=aB.target.result},at=function(){ag();ae();J()},am=function(aB){if(aB.deltaY>0){m()}else{D()}aB.preventDefault?aB.preventDefault():(aB.returnValue=false)},m=function(){al*=1.01;var aC=e.width*al,aB=e.height*al;g(aC,aB);U(k.position().left,k.position().top)},D=function(){var aC=al;al*=0.99;var aD=e.width*al,aB=e.height*al;if(aD>=k.width()&&aB>=k.height()){g(aD,aB);U(k.position().left,k.position().top)}else{al=aC}},g=function(aC,aB){B.css({width:aC,height:aB});k.css({backgroundSize:aC+"px "+aB+"px"})},ag=function(){var aC=aj();if(aC.width>e.width||aC.height>e.height){var aB=aC.width/e.width,aD=aC.height/e.height;if(aB>aD){al=aB}else{al=aD}}else{al=1}g(e.width*al,e.height*al)},O=function(){t.fadeIn()},aA=function(){t.fadeOut()},a=function(){s=0},aj=function(){return A[s]},ao=function(){if(A.length<=s+1){s=0;ah();return false}++s;ag();ae();J();return true},ac=function(aB){u.val(JSON.stringify(aB))},af=function(aC){var aB=JSON.parse(u.val());aB.push(aC);u.val(JSON.stringify(aB))},Q=function(){aq();ac([]);a();aA();M();V()},o=function(){ax();ac([]);a();O();ag();ae();J();i();c()},ah=function(){aA();M();V()},M=function(){p.prop("disabled",true)},i=function(){p.prop("disabled",false)},q=function(){if(!c()){V()}},c=function(){if(typeof E[s]!="undefined"&&I!==null){I.html(E[s]).show();return true}return false},V=function(){if(I!==null){I.hide()}},W=function(){l=T.clone()},aq=function(){T.html(l.html())},Z=function(aB){T.append(aB)},ax=function(){T.empty()};ap.fn.cropbox=function(aB){if(ar[aB]){return ar[aB].apply(this,Array.prototype.slice.call(arguments,1))}else{if(typeof aB==="object"||!aB){return ar.init.apply(this,arguments)}else{ap.error('Method "'+aB+'" not exists.')}}}})(jQuery);