<template>
    <figure>
        <img :src="oeuvre.chemin_image" alt="img05"/>
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
        mounted() {},
        created() {
            console.log('Oeuvre : ' + JSON.stringify(this.oeuvre));
        }
    }
</script>

<style lang="scss" scoped>

    /* Variables */
    @import "../../../../sass/variables";
    /* Photostack */
    @import "../../../../sass/demo";
    @import "../../../../sass/component";

</style>
    