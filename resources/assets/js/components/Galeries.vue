<template>
    <div class="galeries container">
        <div class="titre-section">
            <h1>
                {{ $trans('galeries.galeries.titre-section') }}
            </h1>
        </div>
        <div class="contenu-section">
            <div>
                {{ $trans('galeries.galeries.accroche') }}
            </div>
            <div>
                <ul>
                    <galerie v-for="galerie in galeries" :key="galerie.id" :galerie-id="galerie.id"></galerie>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import Galerie from '../components/Galerie.vue';

    export default {
        components: {
            Galerie
        },
        data: function() {
            return {
                galeries: []
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
    