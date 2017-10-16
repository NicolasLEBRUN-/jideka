<template>
    <div class="galerie container">
        <div class="titre-section">
            <h1>
                {{ galerieNom }}
            </h1>
        </div>
        <div class="contenu-section">
            <div>
                {{ $trans('galeries.galerie.presentation') }}
            </div>
            <div>
                <oeuvre v-for="oeuvre in oeuvres" :key="oeuvre.id" :oeuvre="oeuvre"></oeuvre>
            </div>
        </div>
    </div>
</template>

<script>
    import Oeuvre from '../galeries/Oeuvre.vue';

    export default {
        components: {
            Oeuvre
        },
        props: ['galerieId', 'galerieNom'],
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

</style>
    