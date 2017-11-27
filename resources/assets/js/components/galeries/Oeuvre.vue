<template>
    <div class="oeuvre">
        <div>
            <!-- {{ $trans('galeries.oeuvres.presentation') }} -->
            <div :id="oeuvre.id" class="oeuvre-image" :style="{ 'background-image': 'url(' + oeuvre.chemin_image + ')', 'background-position': 'center' }">
            </div>
            <strong>{{ oeuvre.nom }}</strong>
            <ul class="oeuvre-info">
                <li>{{ $trans('galeries.oeuvre.description') }} : {{ oeuvre.description }}</li>
                <li>{{ $trans('galeries.oeuvre.annee') }} : {{ oeuvre.annee }}</li>
                <li>{{ $trans('galeries.oeuvre.dimensions') }} ({{ $trans('galeries.oeuvre.hauteur') }} x {{ $trans('galeries.oeuvre.largeur') }} x {{ $trans('galeries.oeuvre.profondeur') }}) : 
                {{ oeuvre.hauteur }} cm x {{ oeuvre.largeur }} cm x {{ oeuvre.profondeur }} cm</li>
                <li>{{ $trans('galeries.oeuvre.technique') }} : {{ oeuvre.technique }}</li>
                <li>{{ $trans('galeries.oeuvre.disponibilite') }} : {{ statutDisponibilite }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['oeuvre', 'statutsDisponibilite'],
        data() {
            return {
                imageWidth: 0,
                imageHeight: 0
            }
        },
        computed: {
            imageRatio: function () {
                return this.imageWidth / this.imageHeight;
            },
            statutDisponibilite: function () {
                return this.statutsDisponibilite[this.oeuvre.disponibilite_id - 1].libelle;
            }
        },
        created() {
            //
        },
        mounted() {
            var self = this;

            // Détermination des dimensions de l'image
            var img = new Image();
            img.onload = function() {
                self.imageWidth = this.width;
                self.imageHeight = this.height;
            }
            img.src = this.oeuvre.chemin_image;

            var oeuvreImage = document.getElementById(this.oeuvre.id);

            oeuvreImage.addEventListener('click', function (e) {
                // Modification de la largeur du container
                this.parentElement.parentElement.classList.toggle("big");
                // Modification de la hauteur de l'image avec le bon ratio
                if (this.classList.contains("big")) {
                    this.style.height = '200px';
                } else {
                    this.style.height = 400 / self.imageRatio + 'px';
                }
                // Modification de la largeur du container
                this.classList.toggle("big");
                // Affichage des informations de l'oeuvre
                this.nextElementSibling.nextElementSibling.classList.toggle("visible");
            });
        },
    }
</script>

<style lang="scss" scoped>

    /* Variables */
    @import "../../../sass/variables";

    .oeuvre {
        width: 200px;
        margin: 0 5px;
        -webkit-transition: width 1s;
        transition: width 1s;
    }

    .oeuvre-image {
        height: 200px;
        min-height: 200px;
        width: 200px;
        background-size: cover;
        cursor: pointer;
        -webkit-transition: height 1s, width 1s;
        transition: height 1s, width 1s;
    }

    .big {
        min-height: 200px;
        width: 400px;
        -webkit-transition: height 1s, width 1s;
        transition: height 1s, width 1s;
    }

    strong {
        display: block;
        padding: 12px;
        text-align: center;
    }

    .oeuvre-info {
        position: absolute;
        visibility: hidden;
        opacity: 0;
        list-style: none;
        padding-left: 0px;
        padding-right: 12px;
        padding-bottom: 12px;
        margin-bottom: 20px;
        border-right: 1px solid #FFFFFF;
        border-bottom: 1px solid #FFFFFF;
    }

    .oeuvre-info.visible {
        position: static;
        visibility: visible;
        opacity: 1;
        transition: visibility 1s, opacity 1s linear;
        -webkit-transition: visibility 1s, opacity 1s linear;
    }

</style>
    