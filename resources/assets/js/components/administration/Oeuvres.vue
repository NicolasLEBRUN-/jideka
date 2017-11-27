<template>
    <div id="administration-oeuvres" class="administration-oeuvres container">
        <div class="titre-section">
            <h1>
                Oeuvres
            </h1>
        </div>
        <div class="contenu-section">
            <administration-oeuvres-creation></administration-oeuvres-creation>
            <administration-oeuvres-suppression></administration-oeuvres-suppression>
        </div>
    </div>
</template>

<script>
    import AdministrationOeuvresCreation from '../administration/OeuvresCreation.vue';
    import AdministrationOeuvresSuppression from '../administration/OeuvresSuppression.vue';

    export default {
        name: 'administration-oeuvres',
        components: {
            AdministrationOeuvresCreation,
            AdministrationOeuvresSuppression
        },
        data() {
            return {
                oeuvres: []
            }
        },
        mounted() {},
        created() {
            let self = this;
            axios.get('/api/oeuvres')
                .then(function (response) {
                    self.oeuvres = response.data;
                })
                .catch(function (error) {
                    console.log('Erreur axios : ' + error);
                });
        }
    }
</script>

<style lang="scss" scoped>

    /* Variables */
    @import "../../../sass/variables";

    #administration-oeuvres {
        margin-top: $menu-haut-height;
        padding: 0 $side-padding;
    }

</style>
    