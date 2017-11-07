<template>
    <button @click="handleClick">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        name: 'form-button',
        props: [],
        components: {
        },
        created() {
        },
        mounted() {
        },
        methods: {
            handleClick (e) {
                this.$emit('click', e)
            }
        }
    };
</script>

<style lang="scss" scoped>

    /* Variables */
    @import "../../../sass/variables";

    button {
        height: 50px;
        padding: 12px 80px;
        margin: 0;
        text-align: middle;
        border-radius: 25px;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 16px;
        border: none;
        background: $main-color;
        color: $font-color;
        cursor: pointer;
    }
</style>