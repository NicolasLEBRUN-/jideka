<template>
    <div id="administration-galeries" class="administration-galeries container">
        <div class="titre-section">
            <h1>
                Galeries
            </h1>
        </div>
        <div class="contenu-section">
            <ul>
                <administration-galeries-creation></administration-galeries-creation>
                <administration-galeries-suppression></administration-galeries-suppression>
            </ul>
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

<style type="text/css" scoped>
    .contenu-section {
        //display: flex;
        //flex-direction: column;
        //justify-content: space-around;
        //flex-wrap: wrap;
    }
</style>
    