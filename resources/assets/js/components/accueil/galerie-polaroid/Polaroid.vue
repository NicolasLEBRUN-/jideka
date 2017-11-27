<template>
    <figure>
        <span class="photostack-img">
            <img :src="oeuvre.chemin_image" alt="img"/>
        </span>
        <figcaption>
            <h2 class="photostack-title">{{ oeuvre.nom }}</h2>
            <div class="photostack-back">
                <ul style="list-style:none; padding-left:0">
                    <li><strong>{{ oeuvre.nom }}</strong></li>
                    <li>{{ oeuvre.annee }}</li>
                    <li>{{ oeuvre.hauteur }} cm x {{ oeuvre.largeur }} cm x {{ oeuvre.profondeur }} cm</li>
                    <li>{{ oeuvre.technique }}</li>
                </ul>
            </div>
        </figcaption>
    </figure>
</template>

<script>
    export default {
        props: ['oeuvre'],
        data: function() {
            return {}
        },
        created() {
        },
        mounted() {
        }
    }
</script>

<style lang="scss" scoped>

    /* Variables */
    @import "../../../../sass/variables";

    .photostack-img img {
        width: 240px;
        height: 240px;
    }

    .photostack-back {
        font-family: "Open Sans";
        font-size: 16px;
    }    

</style>
    