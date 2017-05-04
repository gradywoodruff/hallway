import $ from 'jquery';

class Context {
	constructor() {
		this.contextButton1 = $(".find__context-button--1");
		this.contextButton2 = $(".find__context-button--2");
		this.contextButton3 = $(".find__context-button--3");
		this.contextButton4 = $(".find__context-button--4");
		this.contextButton5 = $(".find__context-button--5");
		this.find1 = $(".find--1");
		this.find2 = $(".find--2");
		this.find3 = $(".find--3");
		this.find4 = $(".find--4");
		this.find5 = $(".find--5");
		this.events();
	}

	events() {
		this.contextButton1.click(this.toggleContext1.bind(this));
		this.contextButton2.click(this.toggleContext2.bind(this));
		this.contextButton3.click(this.toggleContext3.bind(this));
		this.contextButton4.click(this.toggleContext4.bind(this));
		this.contextButton5.click(this.toggleContext5.bind(this));

		$(document).keyup(this.keyPressHandler.bind(this));

	}

	keyPressHandler(e) {
		if (e.keyCode == 27) {
			this.closeContext();
		}
	}

	toggleContext1() {
		this.find1.addClass("find--expanded");
	}

	toggleContext2() {
		this.find2.addClass("find--expanded");
	}

	toggleContext3() {
		this.find3.addClass("find--expanded");
	}

	toggleContext4() {
		this.find4.addClass("find--expanded");
	}

	toggleContext5() {
		this.find5.addClass("find--expanded");
	}

	closeContext() {
		this.find1.removeClass("find--expanded");
		this.find2.removeClass("find--expanded");
		this.find3.removeClass("find--expanded");
		this.find4.removeClass("find--expanded");
		this.find5.removeClass("find--expanded");
	}
}

export default Context;