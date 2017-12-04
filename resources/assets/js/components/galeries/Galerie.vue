<template>
    <div class="galerie">
        <div class="titre-section">
            <h2>
                {{ galerieNom }}
            </h2>
        </div>
        <div class="contenu-section">
            <div>
                {{ galerieDescription }}
            </div>
            <ul class="galerie-oeuvres">
                <li is="oeuvre" v-for="oeuvre in oeuvres" :key="oeuvre.id" :oeuvre="oeuvre" :statuts-disponibilite="statutsDisponibilite"></li>
            </ul>
        </div>
    </div>
</template>

<script>
    import Oeuvre from '../galeries/Oeuvre.vue';

    export default {
        components: {
            Oeuvre
        },
        props: ['galerieId', 'galerieNom', 'galerieDescription', 'statutsDisponibilite'],
        data: function() {
            return {
                oeuvres: []
            }
        },
        mounted() {
            //
        },
        created() {
            let self = this;
            setTimeout(function(){
                axios.get('/api/galeries/' + self.galerieId + '/oeuvres')
                    .then(function (response) {
                        self.oeuvres = response.data;
                    })
                    .catch(function (error) {
                        console.log('Erreur axios : ' + error);
                    });
            }, 1000);
            
        },
        methods: {
        }
    }
</script>

<style lang="scss" scoped>

    /* Variables */
    @import "../../../sass/variables";

    ul {
        list-style: none;
        padding-left: 0;
        border-bottom: 1px solid $main-color;
    }

    .galerie-oeuvres {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-content: center;
        margin: 32px -5px 64px -5px;
        padding-bottom: 16px;
    }

</style>
