(function($){var c=['DOMMouseScroll','mousewheel'];$.event.special.mousewheel={setup:function(){if(this.addEventListener)for(var i=c.length;i;)this.addEventListener(c[--i],handler,false);else this.onmousewheel=handler},teardown:function(){if(this.removeEventListener)for(var i=c.length;i;)this.removeEventListener(c[--i],handler,false);else this.onmousewheel=null}};$.fn.extend({mousewheel:function(a){return a?this.bind("mousewheel",a):this.trigger("mousewheel")},unmousewheel:function(a){return this.unbind("mousewheel",a)}});function handler(a){var b=[].slice.call(arguments,1),delta=0,returnValue=true;a=$.event.fix(a||window.event);a.type="mousewheel";if(a.wheelDelta)delta=a.wheelDelta/120;if(a.detail)delta=-a.detail/3;b.unshift(a,delta);return $.event.handle.apply(this,b)}})(jQuery);