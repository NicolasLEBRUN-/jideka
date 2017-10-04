<template>
    <div class="administration-menu-haut">
        <ul id="navbar" class="navigation">
            <li><a href="/" v-on:click="hideMenu">Retour à la version publique du site</a></li>
            <li><a href="#administration-biographie" v-on:click="hideMenu">Biographie</a></li>
            <li><a href="#administration-galeries" v-on:click="hideMenu">Galeries</a></li>
            <li><a href="#administration-oeuvres" v-on:click="hideMenu">Oeuvres</a></li>
            <li><a href="#administration-expositions" v-on:click="hideMenu">Expositions</a></li>
            <li>
                <a href="/logout" v-on:click.prevent="deconnecter">
                    Déconnexion
                </a>
                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    <input type="hidden" name="_token" :value="csrf">
                </form>
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
        data: function() {
            return {
                csrf: '',
            }
        },
        mounted() {
            this.csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');;
        },
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
            },
            deconnecter: function(event) {
                event.preventDefault();
                document.getElementById('logout-form').submit();
            }
        }
    }
</script>

<style type="text/css" scoped>
    .administration-menu-haut {
        display: block;
        position: fixed;
        width: 100%;
        background: deepskyblue;
    }

    .navigation {
        float: right;
        list-style: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    .navigation li {
        display: inline;
    }

    .navigation li a {
        text-decoration: none;
        display: inline-block;
        float: left;
        padding: 18px;
        color: white;
    }

    .navigation li.burger {
        display: none;
        line-height: 0;
    }

    .navigation li a:hover {
        background: darkblue;
    }

    @media all and (max-width: 600px) {
        .navigation {
            float: none;
        }

        .navigation li:not(:first-child) {
            display: none;
        }

        .navigation li a {
            float: left;
        }

        .navigation li.burger {
            display: block;
            float: right;
        }

        .navigation.responsive {
            position: relative;
        }

        .navigation.responsive li.burger {
            position: absolute;
            right: 0;
            top: 0;
        }

        .navigation.responsive li {
            float: none;
            display: block;
            text-align: left;
        }

        .navigation.responsive li a {
            float: none;
            display: block;
            text-align: left;
        }
    }
</style>
    