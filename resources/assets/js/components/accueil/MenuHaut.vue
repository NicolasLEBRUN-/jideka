<template>
    <div id="accueil-menu-haut" class="accueil-menu-haut">
        <ul id="navbar" class="navigation">
            <li><a href="#accueil-presentation" v-on:click="hideMenu">{{ $trans('accueil.menuhaut.accueil') }}</a></li>
            <li><a href="#accueil-biographie" v-on:click="hideMenu">{{ $trans('accueil.menuhaut.biographie') }}</a></li>
            <li><a href="#accueil-galeries" v-on:click="hideMenu">{{ $trans('accueil.menuhaut.galeries') }}</a></li>
            <li><a href="#accueil-expositions" v-on:click="hideMenu">{{ $trans('accueil.menuhaut.expositions') }}</a></li>
            <li><a href="#accueil-contact" v-on:click="hideMenu">{{ $trans('accueil.menuhaut.contact') }}</a></li>
            <li class="flag" v-if="$trans('locale') != 'fr'">
                <a href="/lang/fr" v-on:click="hideMenu">
                    <img src="/img/flags/fr.svg" style="height: 16px; width: 21px;" />
                </a>
            </li>
            <li class="flag" v-if="$trans('locale') != 'en'">
                <a href="/lang/en" v-on:click="hideMenu">
                    <img src="/img/flags/en.svg" style="height: 16px; width: 21px;" />
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
                navbar.classList.toggle("is-visible");
                let hamburger = document.getElementById("hamburger");
                hamburger.classList.toggle("is-active");
            },
            hideMenu: function(event) {
                let navbar = document.getElementById("navbar");
                if (navbar.classList.contains("is-visible")) {
                    navbar.classList.toggle("is-is-visible");
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

    /* Variables */
    @import "../../../sass/variables";
    /* Breakpoints */
    @import "../../../sass/breakpoints";

    #accueil-menu-haut {
        display: block;
        position: fixed;
        width: 100%;
        background: rgba($background-primary-color, .7);
        font-weight: lighter;
        height: $menu-haut-height;
        z-index: 999;

        // @include breakpoint(tablet) {
        //     .navigation {
        //         float: right;
        //         list-style: none;
        //         margin: 0 50px 0 0;
        //         padding: 0;
        //         height: 100%;
                
        //         li {
        //             display: inline;

        //             a {
        //                 text-decoration: none;
        //                 display: inline-block;
        //                 padding: 18px;
        //                 color: rgba($font-color, .7);
        //                 transition: all .3s ease;
        //                 height: 100%;

        //                 &:hover {
        //                     background: darken(rgba($background-primary-color, .7), 5%);
        //                     color: $font-color;
        //                 }
        //             }

        //             &.burger {
        //                 display: none;
        //             }

        //             &.flag {
        //                 img {
        //                     height: 19px;
        //                 }
        //             }
        //         }
        //     }
        // }

        .navigation {
            float: none;
            margin: 0;
            list-style: none;
            padding: 0;
            background: rgba($background-primary-color, .5);

            @include breakpoint(tablet) {
                margin: 0 50px 0 0;
                float: right;
            } 
            
            li {

                @include breakpoint(tablet) {
                    display: inline;

                    &.burger {
                        display: none;
                    }
                }

                a {
                    color: rgba($font-color, .7);
                    height: 100%;
                    transition: all .3s ease;
                    padding: 18px;
                    text-decoration: none;
                    float: left;
                    cursor: pointer;
                    
                    &:hover {
                        background: darken(rgba($background-primary-color, .7), 5%);
                        color: $font-color;
                    }

                    @include breakpoint(tablet) {
                        display: inline-block;
                    }
                }

                @include breakpoint(mobile) {
                    &:not(:first-child) {
                        display: none;
                    }

                    &.burger {
                        display: block;
                        float: right;
                    }
                }
            }

            &.is-visible {
                position: relative;

                li {
                    float: none;
                    display: block;
                    text-align: left;
                    background: $background-primary-color;

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
</style>
