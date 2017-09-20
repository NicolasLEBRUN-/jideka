<template>
    <div id="accueil-biographie" class="accueil-biographie container">
        <div class="titre-section">
            <h1>
                {{ $trans('accueil.biographie.titre-section') }}
            </h1>
        </div>
        <div class="contenu-section">
            <div class="image">
                <img src="/img/profil.jpg" />
            </div>
            <div class="description">
                <span style="white-space: pre-wrap;" v-if="$trans('locale') == 'fr'">{{ biographie.corps_fr }}</span>
                <span style="white-space: pre-wrap;" v-if="$trans('locale') == 'en'">{{ biographie.corps_en }}</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                biographie: {},
            }
        },
        mounted() {},
        created() {
            let self = this;
            axios.get('/api/biographies')
                .then(function (response) {
                    self.biographie = response.data[response.data.length - 1];
                })
                .catch(function (error) {
                    console.log('Erreur axios (AccueilBiographie.vue) : ' + error);
                });
        }
    }
</script>

<style type="text/css" scoped>
    .contenu-section {
        display: flex;
        flex-direction: row wrap;
        justify-content: space-around;
    }
    .image {
        flex: 1;
        display: flex;
        justify-content: center;
        padding: 12px;
    }

    .description {
        flex: 2;
        padding: 12px;
    }

    @media all and (max-width: 600px) {
        .contenu-section {
            flex-flow: column wrap;
        }
    }
</style>
    