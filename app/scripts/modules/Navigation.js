import $ from 'jquery';
     
class Navigation {
    constructor() {
        this.events();
    }

    events() {
        $(document).keydown(this.navHandler.bind(this));
    }

    navHandler(e) {
        var url = false;
        if (e.which == 37) {
            url = $('.navigation--prev a').attr('href');
        }
        else if (e.which == 39) {
            url = $('.navigation--next a').attr('href');
        }
        if (url) {
            window.location = url;
        }
    }

}

export default Navigation;