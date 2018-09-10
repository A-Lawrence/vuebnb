<template>
    <div>
        <header-image v-if="images[0]" :image-url="images[0]" @header-clicked="openModal"></header-image>
        <div class="listing-container">
            <h1>{{ title }}</h1>
            <p>{{ address }}</p>
            <hr/>
            <div class="about">
                <h3>About this listing</h3>
                <expandable-text>{{ about }}</expandable-text>
            </div>
            <div class="lists">
                <feature-list title="Amenities" :items="amenities">
                    <template slot-scope="amenity">
                        <i class="fa fa-lg" :class="amenity.icon"></i>
                        <span>{{ amenity.title }}</span>
                    </template>
                </feature-list>
                <feature-list title="Prices" :items="prices">
                    <template slot-scope="price">
                        {{ price.title }}: <strong>{{ price.value }}</strong>
                    </template>
                </feature-list>
            </div>
        </div>
        <modal-window ref="imagemodal">
            <image-carousel :images="images"></image-carousel>
        </modal-window>
    </div>
</template>
<script>
    import routeMixin from '../route-mixin';
    import {populateAmenitiesAndPrices} from '../helpers';

    let serverData = JSON.parse(window.vuebnb_server_data);
    serverData = populateAmenitiesAndPrices(serverData.listing);

    import HeaderImage from './HeaderImage.vue';
    import ModalWindow from './ModalWindow.vue';
    import ImageCarousel from './ImageCarousel.vue';
    import FeatureList from './FeatureList.vue';
    import ExpandableText from './ExpandableText.vue';

    export default {
        mixins: [routeMixin],
        data() {
            return Object.assign(serverData, {});
        },
        components: {
            HeaderImage,
            ImageCarousel,
            ExpandableText,
            FeatureList,
            ModalWindow,
        },
        methods: {
            openModal() {
                this.$refs.imagemodal.modalOpen = true;
            },
            assignData({listing}) {
                Object.assign(this.$data, populateAmenitiesAndPrices(listing));
            },
        },
    }
</script>
<style>
    .about {
        margin: 2em 0;
    }

    .about h3 {
        font-size: 22px;
    }

    .about p {
        white-space: pre-wrap;
    }
</style>