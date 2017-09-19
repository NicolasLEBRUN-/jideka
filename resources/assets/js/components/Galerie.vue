<template>
    <div class="galerie container">
        <div class="titre-section">
            <h1>
                {{ galerie.nom }}
            </h1>
        </div>
        <div class="contenu-section">
            <div>
                Voici les oeuvres de cette galerie :
            </div>
            <div>
                <oeuvre v-for="oeuvre in oeuvres" :key="oeuvre.id" :oeuvre-id="oeuvre.id"></oeuvre>
            </div>
        </div>
    </div>
</template>

<script>
    import Oeuvre from '../components/Oeuvre.vue';

    export default {
        components: {
            Oeuvre
        },
        props: ['galerieId'],
        data: function() {
            return {
                galerie: {},
                oeuvres: []
            }
        },
        mounted() {},
        created() {
            let self = this;
            axios.get('/api/galeries/' + this.galerieId)
                .then(function (response) {
                    self.galerie = response.data;
                })
                .catch(function (error) {
                    console.log('Erreur axios : ' + error);
                });
            axios.get('/api/galeries/' + this.galerieId + '/oeuvres')
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
    