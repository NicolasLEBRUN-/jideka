<template>
    <div id="administration-oeuvres" class="administration-oeuvres container">
        <div class="titre-section">
            <h1>
                Oeuvres
            </h1>
        </div>
        <div class="contenu-section">
            <ul>
                <administration-oeuvres-creation></administration-oeuvres-creation>
                <administration-oeuvres-suppression></administration-oeuvres-suppression>
            </ul>
        </div>
    </div>
</template>

<script>
    import AdministrationOeuvresCreation from '../components/AdministrationOeuvresCreation.vue';
    import AdministrationOeuvresSuppression from '../components/AdministrationOeuvresSuppression.vue';

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

<style type="text/css" scoped>
    .contenu-section {
        //display: flex;
        //flex-direction: column;
        //justify-content: space-around;
        //flex-wrap: wrap;
    }
</style>
    