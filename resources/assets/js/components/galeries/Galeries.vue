<template>
    <div id="galeries">
        <div class="titre-section">
            <h1>
                {{ $trans('galeries.galeries.titre-section') }}
            </h1>
        </div>
        <div class="contenu-section">
            <div>
                <ul class="galeries-galerie">
                    <li is="galerie" v-for="galerie in galeries" :key="galerie.id" :galerie-id="galerie.id" :galerie-nom="galerie.nom" :galerie-description="galerie.description" :statuts-disponibilite="statutsDisponibilite"></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import Galerie from '../galeries/Galerie.vue';

    export default {
        components: {
            Galerie
        },
        data: function() {
            return {
                galeries: [],
                statutsDisponibilite: []
            }
        },
        mounted() {},
        created() {
            let self = this;
            axios.get('/api/galeries')
                .then(function (response) {
                    self.galeries = response.data;
                })
                .catch(function (error) {
                    console.log('Erreur axios : ' + error);
                });
            axios.get('/api/statutsdisponibilite')
                .then(function (response) {
                    self.statutsDisponibilite = response.data;
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

    #galeries {
        margin-top: $menu-haut-height;
    }

    .titre-section {
        text-align: left;
        padding: 0 $side-padding;
    }

    .contenu-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 0 $side-padding;
    }

    .galeries-galerie {
        list-style: none;
        padding-left: 0;
    }

</style>
    