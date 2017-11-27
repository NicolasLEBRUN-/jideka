<template>
    <label :for="labelFor">
        <slot></slot>
    </label>
</template>

<script>
    export default {
        name: 'form-label',
        props: ['labelFor'],
        components: {
        },
        created() {
        },
        mounted() {
        },
        methods: {
        }
    };
</script>

<style lang="scss" scoped>
    label {
        display: block;
        padding: 4px 0px;
        margin: 0;
        color: #CCCCCC;
    }
</style>