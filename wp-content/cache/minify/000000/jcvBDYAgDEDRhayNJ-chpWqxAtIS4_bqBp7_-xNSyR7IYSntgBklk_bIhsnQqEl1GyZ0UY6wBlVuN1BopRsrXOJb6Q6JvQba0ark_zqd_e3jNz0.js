(function($){if(typeof _wpcf7=='undefined'||_wpcf7===null)
_wpcf7={};_wpcf7=$.extend({cached:0},_wpcf7);$(function(){_wpcf7.supportHtml5=$.wpcf7SupportHtml5();$('div.wpcf7 > form').wpcf7InitForm();});$.fn.wpcf7InitForm=function(){this.ajaxForm({beforeSubmit:function(arr,$form,options){$form.wpcf7ClearResponseOutput();$form.find('[aria-invalid]').attr('aria-invalid','false');$form.find('img.ajax-loader').css({visibility:'visible'});return true;},beforeSerialize:function($form,options){$form.find('[placeholder].placeheld').each(function(i,n){$(n).val('');});return true;},data:{'_wpcf7_is_ajax_call':1},dataType:'json',success:$.wpcf7AjaxSuccess,error:function(xhr,status,error,$form){var e=$('<div class="ajax-error"></div>').text(error.message);$form.after(e);}});if(_wpcf7.cached)
this.wpcf7OnloadRefill();this.wpcf7ToggleSubmit();this.find('.wpcf7-submit').wpcf7AjaxLoader();this.find('.wpcf7-acceptance').click(function(){$(this).closest('form').wpcf7ToggleSubmit();});this.find('.wpcf7-exclusive-checkbox').wpcf7ExclusiveCheckbox();this.find('.wpcf7-list-item.has-free-text').wpcf7ToggleCheckboxFreetext();this.find('[placeholder]').wpcf7Placeholder();if(_wpcf7.jqueryUi&&!_wpcf7.supportHtml5.date){this.find('input.wpcf7-date[type="date"]').each(function(){$(this).datepicker({dateFormat:'yy-mm-dd',minDate:new Date($(this).attr('min')),maxDate:new Date($(this).attr('max'))});});}
if(_wpcf7.jqueryUi&&!_wpcf7.supportHtml5.number){this.find('input.wpcf7-number[type="number"]').each(function(){$(this).spinner({min:$(this).attr('min'),max:$(this).attr('max'),step:$(this).attr('step')});});}
this.find('.wpcf7-character-count').wpcf7CharacterCount();this.find('.wpcf7-validates-as-url').change(function(){$(this).wpcf7NormalizeUrl();});};$.wpcf7AjaxSuccess=function(data,status,xhr,$form){if(!$.isPlainObject(data)||$.isEmptyObject(data))
return;var $responseOutput=$form.find('div.wpcf7-response-output');$form.wpcf7ClearResponseOutput();$form.find('.wpcf7-form-control').removeClass('wpcf7-not-valid');$form.removeClass('invalid spam sent failed');if(data.captcha)
$form.wpcf7RefillCaptcha(data.captcha);if(data.quiz)
$form.wpcf7RefillQuiz(data.quiz);if(data.invalids){$.each(data.invalids,function(i,n){$form.find(n.into).wpcf7NotValidTip(n.message);$form.find(n.into).find('.wpcf7-form-control').addClass('wpcf7-not-valid');$form.find(n.into).find('[aria-invalid]').attr('aria-invalid','true');});$responseOutput.addClass('wpcf7-validation-errors');$form.addClass('invalid');$(data.into).trigger('invalid.wpcf7');}else if(1==data.spam){$responseOutput.addClass('wpcf7-spam-blocked');$form.addClass('spam');$(data.into).trigger('spam.wpcf7');}else if(1==data.mailSent){$responseOutput.addClass('wpcf7-mail-sent-ok');$form.addClass('sent');if(data.onSentOk)
$.each(data.onSentOk,function(i,n){eval(n)});$(data.into).trigger('mailsent.wpcf7');}else{$responseOutput.addClass('wpcf7-mail-sent-ng');$form.addClass('failed');$(data.into).trigger('mailfailed.wpcf7');}
if(data.onSubmit)
$.each(data.onSubmit,function(i,n){eval(n)});$(data.into).trigger('submit.wpcf7');if(1==data.mailSent)
$form.resetForm();$form.find('[placeholder].placeheld').each(function(i,n){$(n).val($(n).attr('placeholder'));});$responseOutput.append(data.message).slideDown('fast');$responseOutput.attr('role','alert');$.wpcf7UpdateScreenReaderResponse($form,data);};$.fn.wpcf7ExclusiveCheckbox=function(){return this.find('input:checkbox').click(function(){var name=$(this).attr('name');$(this).closest('form').find('input:checkbox[name="'+name+'"]').not(this).prop('checked',false);});};$.fn.wpcf7Placeholder=function(){if(_wpcf7.supportHtml5.placeholder)
return this;return this.each(function(){$(this).val($(this).attr('placeholder'));$(this).addClass('placeheld');$(this).focus(function(){if($(this).hasClass('placeheld'))
$(this).val('').removeClass('placeheld');});$(this).blur(function(){if(''==$(this).val()){$(this).val($(this).attr('placeholder'));$(this).addClass('placeheld');}});});};$.fn.wpcf7AjaxLoader=function(){return this.each(function(){var loader=$('<img class="ajax-loader" />').attr({src:_wpcf7.loaderUrl,alt:_wpcf7.sending}).css('visibility','hidden');$(this).after(loader);});};$.fn.wpcf7ToggleSubmit=function(){return this.each(function(){var form=$(this);if(this.tagName.toLowerCase()!='form')
form=$(this).find('form').first();if(form.hasClass('wpcf7-acceptance-as-validation'))
return;var submit=form.find('input:submit');if(!submit.length)return;var acceptances=form.find('input:checkbox.wpcf7-acceptance');if(!acceptances.length)return;submit.removeAttr('disabled');acceptances.each(function(i,n){n=$(n);if(n.hasClass('wpcf7-invert')&&n.is(':checked')||!n.hasClass('wpcf7-invert')&&!n.is(':checked'))
submit.attr('disabled','disabled');});});};$.fn.wpcf7ToggleCheckboxFreetext=function(){return this.each(function(){var $wrap=$(this).closest('.wpcf7-form-control');if($(this).find(':checkbox, :radio').is(':checked')){$(this).find(':input.wpcf7-free-text').prop('disabled',false);}else{$(this).find(':input.wpcf7-free-text').prop('disabled',true);}
$wrap.find(':checkbox, :radio').change(function(){var $cb=$('.has-free-text',$wrap).find(':checkbox, :radio');var $freetext=$(':input.wpcf7-free-text',$wrap);if($cb.is(':checked')){$freetext.prop('disabled',false).focus();}else{$freetext.prop('disabled',true);}});});};$.fn.wpcf7CharacterCount=function(){return this.each(function(){var $count=$(this);var name=$count.attr('data-target-name');var down=$count.hasClass('down');var starting=parseInt($count.attr('data-starting-value'),10);var maximum=parseInt($count.attr('data-maximum-value'),10);var minimum=parseInt($count.attr('data-minimum-value'),10);var updateCount=function($target){var length=$target.val().length;var count=down?starting-length:length;$count.attr('data-current-value',count);$count.text(count);if(maximum&&maximum<length){$count.addClass('too-long');}else{$count.removeClass('too-long');}
if(minimum&&length<minimum){$count.addClass('too-short');}else{$count.removeClass('too-short');}};$count.closest('form').find(':input[name="'+name+'"]').each(function(){updateCount($(this));$(this).keyup(function(){updateCount($(this));});});});};$.fn.wpcf7NormalizeUrl=function(){return this.each(function(){var val=$.trim($(this).val());if(!val.match(/^[a-z][a-z0-9.+-]*:/i)){val=val.replace(/^\/+/,'');val='http://'+val;}
$(this).val(val);});};$.fn.wpcf7NotValidTip=function(message){return this.each(function(){var $into=$(this);$into.find('span.wpcf7-not-valid-tip').remove();$into.append('<span role="alert" class="wpcf7-not-valid-tip">'+message+'</span>');if($into.is('.use-floating-validation-tip *')){$('.wpcf7-not-valid-tip',$into).mouseover(function(){$(this).wpcf7FadeOut();});$(':input',$into).focus(function(){$('.wpcf7-not-valid-tip',$into).not(':hidden').wpcf7FadeOut();});}});};$.fn.wpcf7FadeOut=function(){return this.each(function(){$(this).animate({opacity:0},'fast',function(){$(this).css({'z-index':-100});});});};$.fn.wpcf7OnloadRefill=function(){return this.each(function(){var url=$(this).attr('action');if(0<url.indexOf('#'))
url=url.substr(0,url.indexOf('#'));var id=$(this).find('input[name="_wpcf7"]').val();var unitTag=$(this).find('input[name="_wpcf7_unit_tag"]').val();$.getJSON(url,{_wpcf7_is_ajax_call:1,_wpcf7:id,_wpcf7_request_ver:$.now()},function(data){if(data&&data.captcha)
$('#'+unitTag).wpcf7RefillCaptcha(data.captcha);if(data&&data.quiz)
$('#'+unitTag).wpcf7RefillQuiz(data.quiz);});});};$.fn.wpcf7RefillCaptcha=function(captcha){return this.each(function(){var form=$(this);$.each(captcha,function(i,n){form.find(':input[name="'+i+'"]').clearFields();form.find('img.wpcf7-captcha-'+i).attr('src',n);var match=/([0-9]+)\.(png|gif|jpeg)$/.exec(n);form.find('input:hidden[name="_wpcf7_captcha_challenge_'+i+'"]').attr('value',match[1]);});});};$.fn.wpcf7RefillQuiz=function(quiz){return this.each(function(){var form=$(this);$.each(quiz,function(i,n){form.find(':input[name="'+i+'"]').clearFields();form.find(':input[name="'+i+'"]').siblings('span.wpcf7-quiz-label').text(n[0]);form.find('input:hidden[name="_wpcf7_quiz_answer_'+i+'"]').attr('value',n[1]);});});};$.fn.wpcf7ClearResponseOutput=function(){return this.each(function(){$(this).find('div.wpcf7-response-output').hide().empty().removeClass('wpcf7-mail-sent-ok wpcf7-mail-sent-ng wpcf7-validation-errors wpcf7-spam-blocked').removeAttr('role');$(this).find('span.wpcf7-not-valid-tip').remove();$(this).find('img.ajax-loader').css({visibility:'hidden'});});};$.wpcf7UpdateScreenReaderResponse=function($form,data){$('.wpcf7 .screen-reader-response').html('').attr('role','');if(data.message){var $response=$form.siblings('.screen-reader-response').first();$response.append(data.message);if(data.invalids){var $invalids=$('<ul></ul>');$.each(data.invalids,function(i,n){if(n.idref){var $li=$('<li></li>').append($('<a></a>').attr('href','#'+n.idref).append(n.message));}else{var $li=$('<li></li>').append(n.message);}
$invalids.append($li);});$response.append($invalids);}
$response.attr('role','alert').focus();}};$.wpcf7SupportHtml5=function(){var features={};var input=document.createElement('input');features.placeholder='placeholder'in input;var inputTypes=['email','url','tel','number','range','date'];$.each(inputTypes,function(index,value){input.setAttribute('type',value);features[value]=input.type!=='text';});return features;};})(jQuery);;(function(root,factory){if(typeof exports=='object')module.exports=factory()
else if(typeof define=='function'&&define.amd)define(factory)
else root.Spinner=factory()}
(this,function(){"use strict";var prefixes=['webkit','Moz','ms','O'],animations={},useCssAnimations
function createEl(tag,prop){var el=document.createElement(tag||'div'),n
for(n in prop)el[n]=prop[n]
return el}
function ins(parent){for(var i=1,n=arguments.length;i<n;i++)
parent.appendChild(arguments[i])
return parent}
var sheet=(function(){var el=createEl('style',{type:'text/css'})
ins(document.getElementsByTagName('head')[0],el)
return el.sheet||el.styleSheet}())
function addAnimation(alpha,trail,i,lines){var name=['opacity',trail,~~(alpha*100),i,lines].join('-'),start=0.01+i/lines*100,z=Math.max(1-(1-alpha)/trail*(100-start),alpha),prefix=useCssAnimations.substring(0,useCssAnimations.indexOf('Animation')).toLowerCase(),pre=prefix&&'-'+prefix+'-'||''
if(!animations[name]){sheet.insertRule('@'+pre+'keyframes '+name+'{'+'0%{opacity:'+z+'}'+
start+'%{opacity:'+alpha+'}'+
(start+0.01)+'%{opacity:1}'+
(start+trail)%100+'%{opacity:'+alpha+'}'+'100%{opacity:'+z+'}'+'}',sheet.cssRules.length)
animations[name]=1}
return name}
function vendor(el,prop){var s=el.style,pp,i
if(s[prop]!==undefined)return prop
prop=prop.charAt(0).toUpperCase()+prop.slice(1)
for(i=0;i<prefixes.length;i++){pp=prefixes[i]+prop
if(s[pp]!==undefined)return pp}}
function css(el,prop){for(var n in prop)
el.style[vendor(el,n)||n]=prop[n]
return el}
function merge(obj){for(var i=1;i<arguments.length;i++){var def=arguments[i]
for(var n in def)
if(obj[n]===undefined)obj[n]=def[n]}
return obj}
function pos(el){var o={x:el.offsetLeft,y:el.offsetTop}
while((el=el.offsetParent))
o.x+=el.offsetLeft,o.y+=el.offsetTop
return o}
var defaults={lines:12,length:7,width:5,radius:10,rotate:0,corners:1,color:'#000',direction:1,speed:1,trail:100,opacity:1/4,fps:20,zIndex:2e9,className:'spinner',top:'auto',left:'auto',position:'relative'}
function Spinner(o){if(typeof this=='undefined')return new Spinner(o)
this.opts=merge(o||{},Spinner.defaults,defaults)}
Spinner.defaults={}
merge(Spinner.prototype,{spin:function(target){this.stop()
var self=this,o=self.opts,el=self.el=css(createEl(0,{className:o.className}),{position:o.position,width:0,zIndex:o.zIndex}),mid=o.radius+o.length+o.width,ep,tp
if(target){target.insertBefore(el,target.firstChild||null)
tp=pos(target)
ep=pos(el)
css(el,{left:(o.left=='auto'?tp.x-ep.x+(target.offsetWidth>>1):parseInt(o.left,10)+mid)+'px',top:(o.top=='auto'?tp.y-ep.y+(target.offsetHeight>>1):parseInt(o.top,10)+mid)+'px'})}
el.setAttribute('role','progressbar')
self.lines(el,self.opts)
if(!useCssAnimations){var i=0,start=(o.lines-1)*(1-o.direction)/2,alpha,fps=o.fps,f=fps/o.speed,ostep=(1-o.opacity)/(f*o.trail/100),astep=f/o.lines;(function anim(){i++;for(var j=0;j<o.lines;j++){alpha=Math.max(1-(i+(o.lines-j)*astep)%f*ostep,o.opacity)
self.opacity(el,j*o.direction+start,alpha,o)}
self.timeout=self.el&&setTimeout(anim,~~(1000/fps))})()}
return self},stop:function(){var el=this.el
if(el){clearTimeout(this.timeout)
if(el.parentNode)el.parentNode.removeChild(el)
this.el=undefined}
return this},lines:function(el,o){var i=0,start=(o.lines-1)*(1-o.direction)/2,seg
function fill(color,shadow){return css(createEl(),{position:'absolute',width:(o.length+o.width)+'px',height:o.width+'px',background:color,boxShadow:shadow,transformOrigin:'left',transform:'rotate('+~~(360/o.lines*i+o.rotate)+'deg) translate('+o.radius+'px'+',0)',borderRadius:(o.corners*o.width>>1)+'px'})}
for(;i<o.lines;i++){seg=css(createEl(),{position:'absolute',top:1+~(o.width/2)+'px',transform:o.hwaccel?'translate3d(0,0,0)':'',opacity:o.opacity,animation:useCssAnimations&&addAnimation(o.opacity,o.trail,start+i*o.direction,o.lines)+' '+1/o.speed+'s linear infinite'})
if(o.shadow)ins(seg,css(fill('#000','0 0 4px '+'#000'),{top:2+'px'}))
ins(el,ins(seg,fill(o.color,'0 0 1px rgba(0,0,0,.1)')))}
return el},opacity:function(el,i,val){if(i<el.childNodes.length)el.childNodes[i].style.opacity=val}})
function initVML(){function vml(tag,attr){return createEl('<'+tag+' xmlns="urn:schemas-microsoft.com:vml" class="spin-vml">',attr)}
sheet.addRule('.spin-vml','behavior:url(#default#VML)')
Spinner.prototype.lines=function(el,o){var r=o.length+o.width,s=2*r
function grp(){return css(vml('group',{coordsize:s+' '+s,coordorigin:-r+' '+-r}),{width:s,height:s})}
var margin=-(o.width+o.length)*2+'px',g=css(grp(),{position:'absolute',top:margin,left:margin}),i
function seg(i,dx,filter){ins(g,ins(css(grp(),{rotation:360/o.lines*i+'deg',left:~~dx}),ins(css(vml('roundrect',{arcsize:o.corners}),{width:r,height:o.width,left:o.radius,top:-o.width>>1,filter:filter}),vml('fill',{color:o.color,opacity:o.opacity}),vml('stroke',{opacity:0}))))}
if(o.shadow)
for(i=1;i<=o.lines;i++)
seg(i,-2,'progid:DXImageTransform.Microsoft.Blur(pixelradius=2,makeshadow=1,shadowopacity=.3)')
for(i=1;i<=o.lines;i++)seg(i)
return ins(el,g)}
Spinner.prototype.opacity=function(el,i,val,o){var c=el.firstChild
o=o.shadow&&o.lines||0
if(c&&i+o<c.childNodes.length){c=c.childNodes[i+o];c=c&&c.firstChild;c=c&&c.firstChild
if(c)c.opacity=val}}}
var probe=css(createEl('group'),{behavior:'url(#default#VML)'})
if(!vendor(probe,'transform')&&probe.adj)initVML()
else useCssAnimations=vendor(probe,'animation')
return Spinner}));;(function(factory){if(typeof exports=='object'){factory(require('jquery'),require('spin'))}
else if(typeof define=='function'&&define.amd){define(['jquery','spin'],factory)}
else{if(!window.Spinner)throw new Error('Spin.js not present')
factory(window.jQuery,window.Spinner)}}(function($,Spinner){$.fn.spin=function(opts,color){return this.each(function(){var $this=$(this),data=$this.data();if(data.spinner){data.spinner.stop();delete data.spinner;}
if(opts!==false){opts=$.extend({color:color||$this.css('color')},$.fn.spin.presets[opts]||opts)
if(typeof opts.right!=='undefined'&&typeof opts.length!=='undefined'&&typeof opts.width!=='undefined'&&typeof opts.radius!=='undefined'){var pad=$this.css('padding-left');pad=(typeof pad==='undefined')?0:parseInt(pad,10);opts.left=$this.outerWidth()-(2*(opts.length+opts.width+opts.radius))-pad-opts.right;delete opts.right;}
data.spinner=new Spinner(opts).spin(this)}})}
$.fn.spin.presets={tiny:{lines:8,length:2,width:2,radius:3},small:{lines:8,length:4,width:3,radius:5},large:{lines:10,length:8,width:4,radius:8}}}));(function($){$.fn.spin.presets.wp={trail:60,speed:1.3};$.fn.spin.presets.small=$.extend({lines:8,length:2,width:2,radius:3},$.fn.spin.presets.wp);$.fn.spin.presets.medium=$.extend({lines:8,length:4,width:3,radius:5},$.fn.spin.presets.wp);$.fn.spin.presets.large=$.extend({lines:10,length:6,width:4,radius:7},$.fn.spin.presets.wp);$.fn.spin.presets['small-left']=$.extend({left:5},$.fn.spin.presets.small);$.fn.spin.presets['small-right']=$.extend({right:5},$.fn.spin.presets.small);$.fn.spin.presets['medium-left']=$.extend({left:5},$.fn.spin.presets.medium);$.fn.spin.presets['medium-right']=$.extend({right:5},$.fn.spin.presets.medium);$.fn.spin.presets['large-left']=$.extend({left:5},$.fn.spin.presets.large);$.fn.spin.presets['large-right']=$.extend({right:5},$.fn.spin.presets.large);})(jQuery);