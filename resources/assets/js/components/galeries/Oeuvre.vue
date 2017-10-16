<template>
    <div class="oeuvre container">
        <div class="titre-section">
            {{ oeuvre.nom }}
        </div>
        <div class="contenu-section">
            <div>
                {{ $trans('galeries.oeuvres.presentation') }}
                <ul>
                    <li>{{ $trans('galeries.oeuvre.description') }} : {{ oeuvre.description }}</li>
                    <li>{{ $trans('galeries.oeuvre.annee') }} : {{ oeuvre.annee }}</li>
                    <li>{{ $trans('galeries.oeuvre.hauteur') }} x {{ $trans('galeries.oeuvre.largeur') }} x {{ $trans('galeries.oeuvre.profondeur') }} (cm) : 
                    {{ oeuvre.hauteur }} x {{ oeuvre.largeur }} x {{ oeuvre.profondeur }}</li>
                    <li><img :src="oeuvre.chemin_image" width="100px" /></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['oeuvre'],
        data() {
            return {
                //
            }
        },
        mounted() {
            //
        },
        created() {
            //
        }
    }
</script>

<style lang="scss" scoped>

    /* Variables */
    @import "../../../sass/variables";

</style>
    