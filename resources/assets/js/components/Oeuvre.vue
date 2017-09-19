<template>
    <div class="oeuvre container">
        <div class="titre-section">
            {{ oeuvre.nom }}
        </div>
        <div class="contenu-section">
            <div>
                Voici les informations de cette oeuvre :
                <ul>
                    <li>{{ oeuvre.description }}</li>
                    <li>{{ oeuvre.annee }}</li>
                    <li>{{ oeuvre.hauteur }} x {{ oeuvre.largeur }} x {{ oeuvre.profondeur }}</li>
                    <li><img :src="oeuvre.chemin_image" width="100px" /></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['oeuvreId'],
        data() {
            return {
                oeuvre: {}
            }
        },
        mounted() {},
        created() {
            let self = this;
            axios.get('/api/oeuvres/' + this.oeuvreId)
                .then(function (response) {
                    self.oeuvre = response.data;
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
    