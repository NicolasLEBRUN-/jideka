<template>
    <div id="accueil-galeries" class="accueil-galeries">
        <div class="entete">
            <h1> {{ $trans('accueil.galeries.titre-section') }} </h1>
            <p> {{ $trans('accueil.galeries.accroche') }} </p>
            <a href="/web-galeries">{{ $trans('accueil.galeries.lien') }}</a>
        </div>
        <div class="contenu">
            <div>
                <ul>
                    <li v-for="galerie in galeries">{{ galerie }}</li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
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

<style lang="scss" scoped>

    /* Variables */
    @import "../../../sass/variables";

    .accueil-galeries {
        padding-top: 50px;
        align-items: center;

        .entete {
            display: flex;
            flex-direction: column;
            align-items: center;

            h1, p {
                text-align: center;
                padding: 0 100px;
            }
    
            a {
                text-transform: uppercase;
                text-decoration: none;
                color: $font-color;
                padding: 12px 22px;
                border: 4px solid white;
                margin: 20px 0 40px 0;
                transition: all .3s ease;

                &:hover {
                    background: darken(rgba($background-primary-color, .7), 5%);
                }
            }
        }
    }
</style>
    