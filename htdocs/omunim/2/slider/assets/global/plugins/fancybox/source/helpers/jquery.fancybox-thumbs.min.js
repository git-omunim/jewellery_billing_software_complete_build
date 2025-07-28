/*
 * Thumbnail helper for fancyBox
 * version: 1.0.7 (Mon, 01 Oct 2012)
 * @requires fancyBox v2.0 or later
 *
 * Usage:
 *     $(".fancybox").fancybox({
 *         helpers : {
 *             thumbs: {
 *                 width  : 50,
 *                 height : 50
 *             }
 *         }
 *     });
 *
 */
(function(a){var b=a.fancybox;b.helpers.thumbs={defaults:{width:50,height:50,position:"bottom",source:function(d){var c;if(d.element){c=a(d.element).find("img").attr("src")}if(!c&&d.type==="image"&&d.href){c=d.href}return c}},wrap:null,list:null,width:0,init:function(f,e){var g=this,c,j=f.width,h=f.height,i=f.source;c="";for(var d=0;d<e.group.length;d++){c+='<li><a style="width:'+j+"px;height:"+h+'px;" href="javascript:jQuery.fancybox.jumpto('+d+');"></a></li>'}this.wrap=a('<div id="fancybox-thumbs"></div>').addClass(f.position).appendTo("body");this.list=a("<ul>"+c+"</ul>").appendTo(this.wrap);a.each(e.group,function(l){var k=i(e.group[l]);if(!k){return}a("<img />").load(function(){var p=this.width,m=this.height,q,n,o;if(!g.list||!p||!m){return}q=p/j;n=m/h;o=g.list.children().eq(l).find("a");if(q>=1&&n>=1){if(q>n){p=Math.floor(p/n);m=h}else{p=j;m=Math.floor(m/q)}}a(this).css({width:p,height:m,top:Math.floor(h/2-m/2),left:Math.floor(j/2-p/2)});o.width(j).height(h);a(this).hide().appendTo(o).fadeIn(300)}).attr("src",k)});this.width=this.list.children().eq(0).outerWidth(true);this.list.width(this.width*(e.group.length+1)).css("left",Math.floor(a(window).width()*0.5-(e.index*this.width+this.width*0.5)))},beforeLoad:function(d,c){if(c.group.length<2){c.helpers.thumbs=false;return}c.margin[d.position==="top"?0:2]+=((d.height)+15)},afterShow:function(d,c){if(this.list){this.onUpdate(d,c)}else{this.init(d,c)}this.list.children().removeClass("active").eq(c.index).addClass("active")},onUpdate:function(d,c){if(this.list){this.list.stop(true).animate({left:Math.floor(a(window).width()*0.5-(c.index*this.width+this.width*0.5))},150)}},beforeClose:function(){if(this.wrap){this.wrap.remove()}this.wrap=null;this.list=null;this.width=0}}}(jQuery));