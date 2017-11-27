<template>
    <input :type="type" :name="name" :placeholder="placeholder" @input="handleInput" @change="handleChange"></input>
</template>

<script>
    export default {
        name: 'form-input',
        props: ['type', 'name', 'placeholder'],
        components: {
        },
        created() {
        },
        mounted() {
        },
        methods: {
            handleInput (e) {
                this.$emit('input', e.target.value)
            },
            handleChange (e) {
                this.$emit('change', e)
            }
        }
    };
</script>

<style lang="scss" scoped>
    input {
        padding: 5px 10px;
        margin: 0;
        border: none;
        border-radius: 4px;
        background: #FFFFFF;
        margin-bottom: 16px;
        height: 30px;
        width: 100%;
        outline: none;
    }
</style>