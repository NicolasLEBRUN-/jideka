<template>
    <div id="expositions" class="expositions">
        <div class="entete">
            <h1> {{ $trans('expositions.expositions.titre-section') }} </h1>
            <p> {{ $trans('expositions.expositions.accroche') }} </p>
        </div>
        <div class="contenu">
            <exposition-timeline/>
        </div>
    </div>
</template>

<script>
    import ExpositionTimeline from '../accueil/exposition-timeline/ExpositionTimeline.vue';

    export default {
        components: {
            ExpositionTimeline
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

    #expositions {
        margin-top: $menu-haut-height;
        height: calc(100vh - #{$menu-haut-height});
    }

    .accueil-expositions {
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
