import $ from 'jquery';

class Question {
	constructor() {
		this.body = $("body");
		this.openModalButton = $(".open-question");
		this.question = $(".question");
		this.closeModalButton = $(".question__close");
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
		this.question.addClass("question--is-visible");
		this.body.addClass("modal");
		return false;
	}

	closeModal() {
		this.question.removeClass("question--is-visible");
		this.body.removeClass("modal");
	}
}

export default Question;