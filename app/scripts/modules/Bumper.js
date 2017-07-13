import $ from 'jquery';

class Bumper {
	constructor() {
		this.body = $("body");
		this.events();
	}

	events() {
		$(document).ready(this.bumperLoad.bind(this));
		$(document).keydown(this.keyDownHandler.bind(this));
		$(document).keyup(this.keyUpHandler.bind(this));
	}

	keyDownHandler(e) {
		if (e.keyCode == 49) {
			this.bumpAgain();
		}
	}

	keyUpHandler(e) {
		if (e.keyCode == 49) {
			this.bumpRemove();
		}
	}

	bumperLoad() {
	    if ($('body').hasClass('page--finds')) {
	        $('body').addClass('message--1');
	        setTimeout(function(){
	            $('body').removeClass('message--1');
	            $('body').addClass('message--2');
	        }, 1800);
	        setTimeout(function(){
	            $('body').removeClass('message--2');
	            $('body').removeClass('bump');
	            $('body').removeClass('intro');
	        }, 3600);
	    }

	    if ($('body').hasClass('page--front')) {
	        $('body').addClass('flash-off');
	        setTimeout(function(){
	            $('body').removeClass('flash-off');
	            $('body').addClass('flash-on');
	        }, 900);
	        setTimeout(function(){
	            $('body').removeClass('flash-on');
	            $('body').removeClass('bump');
	            $('body').removeClass('intro');
	        }, 1800);
	    }
	}

	bumpAgain() {
	    if ($('body').hasClass('page--finds')) {
			this.body.addClass("bump");
			this.body.addClass("message--logo");
		}
	}

	bumpRemove() {
	    if ($('body').hasClass('page--finds')) {
			this.body.removeClass("bump");
			this.body.removeClass("intro");
			this.body.removeClass("message--1");
			this.body.removeClass("message--2");
			this.body.removeClass("message--logo");
		}
	}

}

export default Bumper;