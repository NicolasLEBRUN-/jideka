<template>
    <div id="accueil-biographie" class="accueil-biographie">
        <div class="contenu-section">
            <div class="image-container">
            </div>
            <div class="description">
                <div class="titre-section">
                    <h1>{{ $trans('accueil.biographie.titre-section') }}</h1>
                </div>
                <div class="text">
                    <span style="white-space: pre-wrap;" v-if="$trans('locale') == 'fr'">{{ biographie.corps_fr }}</span>
                    <span style="white-space: pre-wrap;" v-if="$trans('locale') == 'en'">{{ biographie.corps_en }}</span>
                </div>
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

<style lang="scss" scoped>
    $main-color                             : #EB7041 !default;
    $background-primary-color               : #353535 !default;
    $background-secondary-color             : #3F3F3F !default;
    $font-color                             : #FFF !default;

    .accueil-biographie {
        padding: 50px 100px;
        background: $background-secondary-color;
        
        .contenu-section {
            display: flex;
            flex-direction: row wrap;
            justify-content: space-around;
            
            .image-container {
                display: flex;
                justify-content: center;
                background: url('/img/profil.jpg') center;
                background-size: cover;
                height: 250px;
                width: 250px;
                border: 8px solid $background-primary-color;
            }
            
            .description {
                flex: 1;
                padding-left: 50px;

                .titre-section {
                    margin-bottom: 20px;
                }

                .text {
                    text-align: justify;
                }
            }
        }
    }

    @media all and (max-width: 600px) {
        .contenu-section {
            flex-flow: column wrap;
        }
    }
</style>
    