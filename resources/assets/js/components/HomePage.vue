<template>
    <div>
        <div v-for="(group, country) in listing_groups">
            <h1>Places in {{ country }}</h1>
            <div class="listing-summaries">
                <listing-summary
                        v-for="listing in group"
                        :key="listing.id"
                        :listing="listing"
                ></listing-summary>
            </div>
        </div>
    </div>
</template>
<script>
    import {groupByCountry} from '../helpers';
    import ListingSummary from './ListingSummary.vue';

    let serverData = JSON.parse(window.vuebnb_server_data);
    let listing_groups = groupByCountry(serverData.listings);

    export default {
        data() {
            return {
                listing_groups,
            }
        },
        components: {
            ListingSummary,
        }
    }
</script>
<style>

</style>