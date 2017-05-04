import $ from 'jquery';

class Searchform {
	constructor() {
		this.body = $("body");
		this.flashlight = $(".title__logo");
		this.openModalButton = $(".open-searchform");
		this.searchform = $(".searchform");
		this.closeModalButton = $(".searchform__close");
		this.events();
	}

	events() {
		this.openModalButton.click(this.openModal.bind(this));
		this.closeModalButton.click(this.closeModal.bind(this));
		$(document).keyup(this.keyPressHandler.bind(this));
	}

	keyPressHandler(e) {
		if (e.keyCode == 27) {
			this.closeModal();
		}
	}

	openModal() {
		this.searchform.addClass("searchform--is-visible");
		this.body.addClass("searching");
		this.flashlight.addClass("searching");
		return false;
	}

	closeModal() {
		this.searchform.removeClass("searchform--is-visible");
		this.body.removeClass("searching");
		this.flashlight.removeClass("searching");
	}
}

export default Searchform;