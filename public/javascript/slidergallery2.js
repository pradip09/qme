$(function(){
	$('div.carusel').galleryCircle({
		btPrev: 'a.arrow-prev',
		btNext: 'a.arrow-next',
		holderList: ' div',
		scrollElParent: 'ul',
		scrollEl: 'li',
		duration : 300,
		slideNum: false,
		step: 1,
		autoRotation:false
	});
})

jQuery.fn.galleryCircle = function(_options){
	// defaults options	
	var _options = jQuery.extend({
		btPrev: 'a.prev',
		btNext: 'a.next',
		holderList: 'div',
		scrollElParent: 'ul',
		scrollEl: 'li',
		duration : 1000,
		slideNum: false,
		step: false,
		autoRotation:false
	},_options);

	return this.each(function(){
		var _this = jQuery(this);
		var _next = $(_options.btNext, _this).length ? $(_options.btNext, _this) : false;
		var _prev = $(_options.btPrev, _this).length ? $(_options.btPrev, _this) : false;
		var _holderList = $(_options.holderList, _this);
		var _scrollElParent = $(_options.scrollElParent, _holderList);
		var _scrollEl = $(_options.scrollEl, _scrollElParent);
		var _cloneEl = _scrollEl.clone();
		var _cloneEl2 = _scrollEl.clone();
		var _scrollElWidth = _scrollEl.outerWidth(true);
		
		var _widthSum = _scrollElWidth * _scrollEl.length;
		var _step = _holderList.outerWidth();		
		var _margin = _widthSum;
		if (_options.step) {
			_step = _scrollEl.eq(0).outerWidth(true) * _options.step;
		}
		
		_scrollElParent.append(_cloneEl);
		_scrollElParent.prepend(_cloneEl2);
		_scrollElParent.css('marginLeft', -_margin);
		
		if (_next) {
			_next.click(function(){
				if (!_scrollElParent.is(':animated')) {
					nextSlides();
				}
				return false;
			});
		}
		if (_prev) {
			_prev.click(function(){
				if (!_scrollElParent.is(':animated')) {
					prevSlides();
				}
				return false;
			});
		}
		
		var _timer = false;
		if (_options.autoRotation) {
			_timer = setInterval(function(){nextSlides();},_options.autoRotation);
		}
		
		if (_options.slideNum) {
			if (!$(_options.slideNum, _this).is('a')) {
				var _lis = '<ul>';
				for (var i=0; i<_widthSum/_step; i++) {
					_lis += '<li><a href="#">'+i+'</a></li>';
				}
				_lis += '</ul>';
				$(_options.slideNum, _this).append(_lis);
				var _tabs = $(_options.slideNum+' a', _this);
			} else _tabs = $(_options.slideNum, _this)
			_tabs.eq(0).parent().addClass('active');
			_tabs.each(function(i){
				$(this).click(function(){
					if (!_scrollElParent.is(':animated')) {
						setActive(i);
						if (_timer) {
							clearInterval(_timer);
							_timer = setInterval(function(){nextSlides();},_options.autoRotation);
						}
						_margin = _widthSum+_step*i;
						_scrollElParent.animate({'marginLeft':-_margin}, {duration:_options.duration});
					}
					return false;
				});
			});
			function setActive(_i){
				_tabs.parent().removeClass('active');
				if (_i != null) _tabs.eq(_i).parent().addClass('active');
				else {
					_tabs.eq((_margin-_widthSum)/_step).parent().addClass('active');
				}
			}
		}
		
		function nextSlides(){
			if (_timer) {
				clearInterval(_timer);
				_timer = setInterval(function(){nextSlides();},_options.autoRotation);
			}
			_margin += _step;
			_scrollElParent.animate({'marginLeft':-_margin}, {duration:_options.duration, complete:function(){
				if (_margin >= _widthSum*2) {
					_margin = _widthSum + (_margin - _widthSum*2);
				}
				if (_options.slideNum) 
					setActive();
				_scrollElParent.css({'marginLeft':-_margin});
			}});
		}
		function prevSlides(){
			if (_timer) {
				clearInterval(_timer);
				_timer = setInterval(function(){nextSlides();},_options.autoRotation);
			}
			_margin -= _step;
			_scrollElParent.animate({'marginLeft':-_margin}, {duration:_options.duration, complete:function(){
				if (_margin < _widthSum) {
					_margin = _widthSum*2 - (_widthSum - _margin);
				}
				if (_options.slideNum) 
					setActive();
				_scrollElParent.css({'marginLeft':-_margin});
			}});
		}
	});
}