<template>
    <div>
        <p v-bind:class="{ contracted : contracted }">
            <slot></slot>
        </p>
        <button class="more" v-on:click="contracted = !contracted">
            <span v-if="contracted">+</span>
            <span v-else="contracted">-</span>
            &nbsp;
            More
        </button>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                contracted: true,
            }
        }
    }
</script>
<style>
    .about p.contracted {
        height: 250px;
        overflow: hidden;
    }

    button {
        text-align: center;
        vertical-align: middle;
        user-select: none;
        white-space: nowrap;
        cursor: pointer;
        display: inline-block;
        margin-bottom: 0;
    }

    .about button.more {
        background: transparent;
        border: 0;
        color: #008489;
        padding: 0;
        font-size: 17px;
        font-weight: bold;
    }

    .about button.more:hover,
    .about button.more:focus,
    .about button.more:active {
        text-decoration: underline;
        outline: none;
    }
</style>