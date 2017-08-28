<template>
    <div class="biographie container">
        <div class="titre-section">
            <h1>
                Bienvenue
            </h1>
        </div>
        <div class="contenu-section">
            <div class="description">
                <h2>Jocelyne Deschamps-Kus</h2>
            </div>
            <div class="image">
                <img src="/img/pinceaux.jpg" />
            </div>
        </div>
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
    .contenu-section {
        display: flex;
        flex-direction: row wrap;
        justify-content: space-around;
    }
    .image {
        flex: 1;
        display: flex;
        justify-content: center;
        padding: 12px;
    }

    .description {
        flex: 2;
        padding: 12px;
    }

    @media all and (max-width: 600px) {
        .contenu-section {
            flex-flow: column wrap;
        }
    }
</style>
    