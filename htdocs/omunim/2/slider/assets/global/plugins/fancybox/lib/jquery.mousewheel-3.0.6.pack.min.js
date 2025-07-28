/* Copyright (c) 2011 Brandon Aaron (http://brandonaaron.net)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * Thanks to: http://adomas.org/javascript-mouse-wheel/ for some pointers.
 * Thanks to: Mathias Bank(http://www.mathias-bank.de) for a scope bug fix.
 * Thanks to: Seamus Leahy for adding deltaX and deltaY
 *
 * Version: 3.0.6
 * 
 * Requires: 1.2.2+
 */
(function(b){function f(d){var h=d||window.event,i=[].slice.call(arguments,1),k=0,j=0,l=0,d=b.event.fix(h);d.type="mousewheel";h.wheelDelta&&(k=h.wheelDelta/120);h.detail&&(k=-h.detail/3);l=k;h.axis!==void 0&&h.axis===h.HORIZONTAL_AXIS&&(l=0,j=-1*k);h.wheelDeltaY!==void 0&&(l=h.wheelDeltaY/120);h.wheelDeltaX!==void 0&&(j=-1*h.wheelDeltaX/120);i.unshift(d,k,j,l);return(b.event.dispatch||b.event.handle).apply(this,i)}var a=["DOMMouseScroll","mousewheel"];if(b.event.fixHooks){for(var g=a.length;g;){b.event.fixHooks[a[--g]]=b.event.mouseHooks}}b.event.special.mousewheel={setup:function(){if(this.addEventListener){for(var c=a.length;c;){this.addEventListener(a[--c],f,false)}}else{this.onmousewheel=f}},teardown:function(){if(this.removeEventListener){for(var c=a.length;c;){this.removeEventListener(a[--c],f,false)}}else{this.onmousewheel=null}}};b.fn.extend({mousewheel:function(c){return c?this.bind("mousewheel",c):this.trigger("mousewheel")},unmousewheel:function(c){return this.unbind("mousewheel",c)}})})(jQuery);