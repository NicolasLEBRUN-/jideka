<template>
    <div class="expositions-menu-haut">
        <ul id="navbar" class="navigation">
            <li><a href="/" v-on:click="hideMenu">{{ $trans('expositions.menuhaut.retour-accueil') }}</a></li>
            <li class="flag" v-if="$trans('locale') != 'fr'">
                <a href="/lang/fr" v-on:click="hideMenu"><span class="flag-icon flag-icon-fr"></span></a>
            </li>
            <li class="flag" v-if="$trans('locale') != 'en'">
                <a href="/lang/en" v-on:click="hideMenu"><span class="flag-icon flag-icon-gb"></span></a>
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

    /* Variables */
    @import "../../../sass/variables";

    .expositions-menu-haut {
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
            background: $background-primary-color;
            
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

    @media all and (max-width: 700px) {
        .navigation {
            margin: 0 !important;
        }
    }
</style>
