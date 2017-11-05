<template>
    <figure>
        <span class="photostack-img">
            <img :src="oeuvre.chemin_image" alt="img"/>
        </span>
        <figcaption>
            <h2 class="photostack-title">{{ oeuvre.nom }}</h2>
            <div class="photostack-back">
                <p>Technique : {{ oeuvre.technique }}</p>
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
            console.log('Oeuvre (Polaroid.vue) : ' + JSON.stringify(this.oeuvre));
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
        font-family: "Open Sans"
    }    

</style>
    