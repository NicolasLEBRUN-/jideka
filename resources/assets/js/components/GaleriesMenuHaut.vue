<template>
    <div class="galeries-menu-haut">
        <ul class="navigation">
            <li><a href="/">Retourner à l'Accueil</a></li>
        </ul>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style type="text/css" scoped>
    .galeries-menu-haut {
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
