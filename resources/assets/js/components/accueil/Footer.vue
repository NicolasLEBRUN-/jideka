<template>
    <footer>
        <img src="/img/logo_jideka.svg" />
        <p>© 2017 Jocelyne Deschamps-Kus
        <br />
        Designed by Timothé Crespy et Nicolas Lebrun</p>
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
        padding: 64px $side-padding;
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: $background-secondary-color;
        color: rgba($font-color, .5);
        font-size: .8em;
        letter-spacing: 3px;
        text-align: center;
        text-transform: uppercase;

        img {
            width: 178px;
            height: 120px;
        }
    }

</style>
    