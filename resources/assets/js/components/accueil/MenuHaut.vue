<template>
    <div class="accueil-menu-haut">
        <ul id="navbar" class="navigation">
            <li><a href="#accueil-presentation" v-on:click="hideMenu">{{ $trans('accueil.menuhaut.accueil') }}</a></li>
            <li><a href="#accueil-biographie" v-on:click="hideMenu">{{ $trans('accueil.menuhaut.biographie') }}</a></li>
            <li><a href="#accueil-galeries" v-on:click="hideMenu">{{ $trans('accueil.menuhaut.galeries') }}</a></li>
            <li><a href="#accueil-expositions" v-on:click="hideMenu">{{ $trans('accueil.menuhaut.expositions') }}</a></li>
            <li><a href="#accueil-contact" v-on:click="hideMenu">{{ $trans('accueil.menuhaut.contact') }}</a></li>
            <li class="flag" v-if="$trans('locale') != 'fr'">
                <a href="/lang/fr" v-on:click="hideMenu">
                    EN
                    <!-- <img src="/img/fr.png" alt="Français" /> -->
                </a>
            </li>
            <li class="flag" v-if="$trans('locale') != 'en'">
                <a href="/lang/en" v-on:click="hideMenu">
                    FR
                    <!-- <img src="/img/en.png" alt="English" /> -->
                </a>
            </li>
            <li class="burger">
                <a href="javascript:void(0);" v-on:click="showMenu">
                    <button id="hamburger" class="hamburger hamburger--squeeze" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        mounted() {},
        created() {},
        methods: {
            showMenu: function(event) {
                let navbar = document.getElementById("navbar");
                navbar.classList.toggle("responsive");
                let hamburger = document.getElementById("hamburger");
                hamburger.classList.toggle("is-active");
            },
            hideMenu: function(event) {
                let navbar = document.getElementById("navbar");
                if (navbar.classList.contains("responsive")) {
                    navbar.classList.toggle("responsive");
                }
                let hamburger = document.getElementById("hamburger");
                if (hamburger.classList.contains("is-active")) {
                    hamburger.classList.toggle("is-active");
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    $main-color                             : #EB7041 !default;
    $background-primary-color               : #353535 !default;
    $background-secondary-color             : #3F3F3F !default;
    $font-color                             : #FFF !default;
    $menu-haut-height                       : 60px !default;

    .accueil-menu-haut {
        display: block;
        position: fixed;
        width: 100%;
        background: rgba($background-primary-color, .7);
        font-weight: lighter;
        height: $menu-haut-height;

        .navigation {
            float: right;
            list-style: none;
            margin: 0 50px 0 0;
            padding: 0;
            overflow: hidden;
            height: 100%;
            
            li {
                display: inline;

                a {
                    text-decoration: none;
                    display: inline-block;
                    padding: 18px;
                    color: rgba($font-color, .7);
                    transition: all .3s ease;
                    height: 100%;

                    &:hover {
                        background: darken(rgba($background-primary-color, .7), 5%);
                        color: $font-color;
                    }
                }

                &.burger {
                    display: none;
                }

                &.flag {
                    img {
                        height: 19px;
                    }
                }
            }
        }
    }
    
    @media all and (max-width: 600px) {
        .navigation {
            float: none !important;
            background: rgba($background-primary-color, .5);
            
            li {
                a {
                    float: left;
                }

                &:not(:first-child) {
                    display: none;


                    &.burger {
                        display: block;
                        float: right;
                    }
                }
            }

            &.responsive {
                position: relative;

                li {
                    float: none;
                    display: block;
                    text-align: left;

                    a {
                        float: none;
                        display: block;
                        text-align: left;
                    }

                    &.burger {
                        position: absolute;
                        right: 0;
                        top: 0;
                    }
                }
            }
        }
    }

    @media all and (max-width: 700px) {
        .navigation {
            margin: 0 !important;
        }
    }
</style>
    