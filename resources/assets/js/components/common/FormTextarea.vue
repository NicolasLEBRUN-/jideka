<template>
    <textarea :name="name" :placeholder="placeholder" @input="handleInput" :value="value"></textarea>
</template>

<script>
    export default {
        name: 'form-textarea',
        props: ['name', 'placeholder', 'value'],
        components: {
        },
        created() {
        },
        mounted() {
        },
        methods: {
            handleInput (e) {
                this.$emit('input', e.target.value)
            }
        }
    };
</script>

<style lang="scss" scoped>
    textarea {
        padding: 5px 10px;
        margin: 0;
        border: none;
        border-radius: 4px;
        background: #FFFFFF;
        resize: none;
        margin-bottom: 15px;
        height: 200px;
        outline: none;
    }
</style>