<template>
    <div id="administration-expositions" class="administration-expositions container">
        <div class="titre-section">
            <h1>
                Expositions
            </h1>
        </div>
        <div class="contenu-section">
            <administration-expositions-creation></administration-expositions-creation>
            <administration-expositions-suppression></administration-expositions-suppression>
        </div>
    </div>
</template>

<script>
    import AdministrationExpositionsCreation from '../administration/ExpositionsCreation.vue';
    import AdministrationExpositionsSuppression from '../administration/ExpositionsSuppression.vue';

    export default {
        name: 'administration-expositions',
        components: {
            AdministrationExpositionsCreation,
            AdministrationExpositionsSuppression
        },
        data() {
            return {}
        },
        mounted() {
        },
        created() {
        },
        methods: {
        }
    }
</script>

<style lang="scss" scoped>

    /* Variables */
    @import "../../../sass/variables";

    #administration-expositions {
        margin-top: $menu-haut-height;
        padding: 0 $side-padding;
    }
</style>
    