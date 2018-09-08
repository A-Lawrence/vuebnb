import "core-js/fn/object/assign";
import Vue from 'vue';
import {populateAmenitiesAndPrices} from './helpers';

let model = JSON.parse(window.vuebnb_listing_model);
model = populateAmenitiesAndPrices(model);

import HeaderImage from './components/HeaderImage.vue';
import ModalWindow from './components/ModalWindow.vue';
import ImageCarousel from './components/ImageCarousel.vue';
import FeatureList from './components/FeatureList.vue';

var app = new Vue({
    el: '#app',
    data: Object.assign(model, {
        headerImageStyle: {
            'background-image': `url(${model.images[0]})`,
        },
        contracted: true,
    }),
    methods: {
        openModal() {
            this.$refs.imagemodal.modalOpen = true;
        },
    },
    components: {
        HeaderImage,
        ModalWindow,
        ImageCarousel,
        FeatureList,
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