import $ from 'jquery';

class Hover {
	constructor() {
		this.finding = $(".find a, .month__box, .search__box, .archive__month, .index a");
		this.flashlight = $(".title__logo");
		this.events();
	}

	events() {
		this.finding.mouseover(this.hover.bind(this));
		this.finding.mouseout(this.unhover.bind(this));
	}

	hover() {
		this.flashlight.addClass("finding");
	}
	unhover() {
		this.flashlight.removeClass("finding");
	}
}

export default Hover;