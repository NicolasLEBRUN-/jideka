<template>
    <div class="biographie container">
        <div class="titre-section">
            <h1>
                Biographie
            </h1>
        </div>
        <div class="contenu-section">
            <div class="image">
                <img src="/img/profil.jpg" />
            </div>
            <div class="description">
                Dessiner le quotidien, dessiner ce que nous vivons, ce que nous ressentons, dessiner la banalité de tous les jours mais en la colorant et en y ajoutant une touche de tendresse et d’humour, c’est toute la signification des «&nbsp;Aventures de Germaine&nbsp;».
                <br />
                Cette interprétation, souvent sociale, est en fait une manière de représenter avec amour ce monde commun et ses travers.
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
    