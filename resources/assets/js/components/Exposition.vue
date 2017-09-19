<template>
    <div class="exposition container">
        <div class="titre-section">
            {{ exposition.nom }}
        </div>
        <div class="contenu-section">
            <div>
                Voici les informations de cette exposition :
            </div>
            <div>
                <li>{{ exposition.description }}</li>
                <li>{{ exposition.date_debut }}</li>
                <li>{{ exposition.date_fin }}</li>
                <li><img :src="exposition.chemin_visuel" width="300px" /></li>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['expositionId'],
        data() {
            return {
                exposition: {},
            }
        },
        mounted() {},
        created() {
            let self = this;
            axios.get('/api/expositions/' + this.expositionId)
                .then(function (response) {
                    self.exposition = response.data;
                })
                .catch(function (error) {
                    console.log('Erreur axios (Exposition.vue) : ' + error);
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
    