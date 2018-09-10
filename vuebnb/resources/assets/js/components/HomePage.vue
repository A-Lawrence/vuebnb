<template>
    <div class="home-container">
        <listing-summary-group
                v-for="(group, country) in listing_groups"
                :key="country"
                :listings="group"
                :country="country"
                class="listing-summary-group"
        ></listing-summary-group>
    </div>
</template>
<script>
    import routeMixin from '../route-mixin';
    import ListingSummaryGroup from './ListingSummaryGroup.vue';
    import { groupByCountry } from '../helpers';

    export default {
        mixins: [ routeMixin ],
        data() {
            return {
                listing_groups: []
            };
        },
        methods: {
            assignData({ listings }) {
                this.listing_groups = groupByCountry(listings);
            },
        },
        components: {
            ListingSummaryGroup
        }
    }
</script>
