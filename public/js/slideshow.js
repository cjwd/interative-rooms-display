;(function(window){
	'use strict';

	function Slideshow( container ) {

	  this.container = container;

	  this.slides = [].slice.call(this.container.querySelectorAll('.ird-slide'));

	  this.imgs = [].slice.call(this.container.querySelectorAll('img'));
	  this.imgWidth = this.imgs[0].width; // Width of 1 image
	  this.imgsLength = this.imgs.length; //Total width of all images

	  this.nav = document.querySelector('.nav');
	  this.navCtrls = [].slice.call(this.nav.querySelectorAll('.nav__item'));

	  this.current = 0;

	  this.init();
	}

	Slideshow.prototype.init = function() {

	  this.updateCurrent();

	  classie.add(this.currentSlide, 'slide--current');
	  classie.add(this.navCtrls[this.current], 'nav__item--current');

	  this.events();
	};

	Slideshow.prototype.events = function() {

	  var self = this;

	  this.navCtrls.forEach( function( navEl, pos) {
	    navEl.addEventListener( 'click', function(ev) {
	      ev.preventDefault();
	      self.navigate(pos);
	    });
	  });
	};

	Slideshow.prototype.navigate = function(pos) {

	  if(pos === this.current) { return false; }

	  classie.remove(this.navCtrls[this.current], 'nav__item--current');
	  classie.add(this.navCtrls[pos], 'nav__item--current');

	  var currentSlide = this.slides[this.current],
	      nextSlide = this.slides[pos],
				//margin = -(pos * this.imgWidth),
				transform = -(pos * 100);

		this.current = pos;
	  this.updateCurrent();

	  classie.remove(currentSlide, 'slide--current');
	  currentSlide.style.marginLeft = '0px';
	  classie.add(nextSlide, 'slide--current');
	  //nextSlide.style.marginLeft = margin + 'px';
		nextSlide.style.transform = 'translateX(' + transform + '%)';
	};

	Slideshow.prototype.updateCurrent = function() {
	  this.currentSlide = this.slides[this.current];
	};

	window.Slideshow = Slideshow;
})(window);
