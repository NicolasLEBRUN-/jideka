<template>
    <div id="accueil-presentation" class="accueil-presentation container">
        <div class="content">
            <div class="text">
                <img src="/img/logo_jideka.svg" />
                <h1>{{ $trans('accueil.presentation.titre-section') }}</h1>
                <h2>{{ $trans('accueil.presentation.nom') }}</h2>
                <p>{{ $trans('accueil.presentation.accroche') }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {}
    }
</script>

<style lang="scss" scoped>
    $main-color                             : #EB7041 !default;
    $background-primary-color               : #353535 !default;
    $background-secondary-color             : #3F3F3F !default;
    $font-color                             : #FFF !default;

    $menu-haut-height                       : 60px !default;

    #accueil-presentation {
        margin-top: 60px;
        background: url(/img/pinceaux.png) right no-repeat;
        background-size: contain;
        height: calc(100vh - #{$menu-haut-height});

        .content {
            display: flex;
            justify-content: space-between;
            font-weight: lighter;

            .text {
                display: flex;
                flex-direction: column;
                margin-left: 5%;

                h1 {
                    color: $main-color;
                }

                h1, h2 {
                    font-weight: lighter;
                }
            }
        }        
    }

    @media all and (max-width: 600px) {
        .image {
            display: none;
        }
    }
</style>
    