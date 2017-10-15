<template>
    <div id="administration-expositions" class="administration-expositions container">
        <div class="titre-section">
            <h1>
                Expositions
            </h1>
        </div>
        <div class="contenu-section">
            <ul>
                <administration-expositions-creation></administration-expositions-creation>
                <administration-expositions-suppression></administration-expositions-suppression>
            </ul>
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
        mounted() {},
        created() {
        },
        methods: {
        }
    }
</script>

<style type="text/css" scoped>
    .contenu-section {
        display: flex;
        flex-direction: row wrap;
        justify-content: space-around;
        padding: 12px;
    }
</style>
    