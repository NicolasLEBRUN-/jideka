<template>
    <footer>
        <img src="/img/logo_jideka.svg" />
        <p>© 2017 JOCELYNE DESCHAMPS-KUS  -  DESIGNED BY TIMOTHÉ CRESPY & NICOLAS LEBRUN</p>
    </footer>
</template>

<script>
    export default {
        components: {
        },
        data: function() {
            return {}
        },
        created() {},
        mounted() {}
    }
</script>

<style lang="scss" scoped>

    /* Variables */
    @import "../../../sass/variables";

    footer {
        padding: 100px 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: $background-secondary-color;
        color: rgba($font-color, .5);
        font-size: .8em;
        letter-spacing: 3px;

        img {
            width: 178px;
            height: 120px;
        }
    }

</style>
    