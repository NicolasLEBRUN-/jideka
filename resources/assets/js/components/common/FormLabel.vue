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
        padding: 5px 10px;
        margin: 0;
        border: 1px solid #FFFFFF;
        border-radius: 4px;
    }
</style>