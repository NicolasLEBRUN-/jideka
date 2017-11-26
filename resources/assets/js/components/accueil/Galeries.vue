<template>
    <div id="accueil-galeries" class="accueil-galeries">
        <div class="entete">
            <h1> {{ $trans('accueil.galeries.titre-section') }} </h1>
            <a href="/web-galeries">{{ $trans('accueil.galeries.lien') }}</a>
        </div>
        <div class="contenu">
            <galerie-polaroid/>
        </div>
    </div>
</template>

<script>
    import GaleriePolaroid from './galerie-polaroid/GaleriePolaroid.vue';

    export default {
        components: {
            GaleriePolaroid
        },
        data: function() {
            return {}
        },
        created() {},
        mounted() {}
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
    