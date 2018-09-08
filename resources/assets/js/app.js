import "core-js/fn/object/assign";
import Vue from 'vue';
import {populateAmenitiesAndPrices} from './helpers';

let model = JSON.parse(window.vuebnb_listing_model);
model = populateAmenitiesAndPrices(model);

var app = new Vue({
    el: '#app',
    data: Object.assign(model, {
        headerImageStyle: {
            'background-image': `url(${model.images[0]})`,
        },
        contracted: true,
        modalOpen: false,
    }),
    watch: {
        modalOpen: function () {
            var className = 'modal-open';
            if (this.modalOpen) {
                document.body.classList.add(className);
            } else {
                document.body.classList.remove(className);
            }
        }
    },
    created: function (evt) {
        if (evt.keyCode === 27 && app.modalOpen) {
            app.modalOpen = false;
        }
    },
    destroyed: function () {
        document.removeEventListener('keyup', this.escapeKeyListener);
    },
});

document.addEventListener('keyup', function (evt) {
    if (evt.keyCode === 27 && app.modalOpen) {
        app.modalOpen = false;
    }
});