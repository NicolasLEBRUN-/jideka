<template>
    <div class="exposition container">
        <div class="titre-section">
            {{ exposition.nom }}
        </div>
        <div class="contenu-section">
            <div>
                {{ $trans('expositions.exposition.presentation') }}
            </div>
            <div>
                <li>{{ $trans('expositions.exposition.description') }} : {{ exposition.description }}</li>
                <li>{{ $trans('expositions.exposition.date-debut') }} : {{ exposition.date_debut | formatDate }}</li>
                <li>{{ $trans('expositions.exposition.date-fin') }} : {{ exposition.date_fin | formatDate }}</li>
                <li>{{ $trans('expositions.exposition.date-vernissage') }} : {{ exposition.date_vernissage | formatDateTime }}</li>
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
        },
        filters: {
            formatDate: function(value) {
                if (value) {
                    return moment(String(value)).format('DD/MM/YYYY');
                }
            },
            formatDateTime: function(value) {
                if (value) {
                    return moment(String(value)).format('DD/MM/YYYY hh:mm');
                }
            },
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
    