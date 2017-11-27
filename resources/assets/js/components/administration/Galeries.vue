<template>
    <div id="administration-galeries" class="administration-galeries container">
        <div class="titre-section">
            <h1>
                Galeries
            </h1>
        </div>
        <div class="contenu-section">
            <administration-galeries-creation></administration-galeries-creation>
            <administration-galeries-suppression></administration-galeries-suppression>
        </div>
    </div>
</template>

<script>
    import AdministrationGaleriesCreation from '../administration/GaleriesCreation.vue';
    import AdministrationGaleriesSuppression from '../administration/GaleriesSuppression.vue';

    export default {
        name: 'administration-galeries',
        components: {
            AdministrationGaleriesCreation,
            AdministrationGaleriesSuppression
        },
        data() {
            return {
                galeries: []
            }
        },
        mounted() {},
        created() {
        },
        methods: {
        }
    }
</script>

<style lang="scss" scoped>

    /* Variables */
    @import "../../../sass/variables";

    #administration-galeries {
        margin-top: $menu-haut-height;
        padding: 0 $side-padding;
    }

</style>
    