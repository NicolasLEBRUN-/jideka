<template>
    <div class="gallery-wrapper">
        <div class="container">
            <section id="photostack" class="photostack">
                <div>
                    <polaroid v-for="oeuvre in shuffledOeuvres" :key="oeuvre.id" :oeuvre="oeuvre" />
                </div>
            </section>
        </div>
    </div>
</template>

<script>
    import Polaroid from './Polaroid.vue';

    export default {
        components: {
            Polaroid
        },
        data: function() {
            return {
                oeuvres: []
            }
        },
        computed: {
            shuffledOeuvres: function () {
                // Mélange des oeuvres
                var oeuvres = _.shuffle(this.oeuvres);
                // Conservation de 12 oeuvres au hasard uniquement
                oeuvres = oeuvres.slice(0, 12);
                return oeuvres;
            }
        },
        created() {
        },
        mounted() {
            let self = this;
            axios.get('/api/oeuvres')
                    .then(function (response) {
                        self.oeuvres = response.data;
                        self.$nextTick(function () {
                            self.createPhotostack();
                        })
                    })
                    .catch(function (error) {
                        console.log('Erreur axios (GaleriePolaroid.vue) : ' + error);
                    });
        },
        methods: {
            createPhotostack: function() {
                new Photostack( document.getElementById( 'photostack' ), {
                        callback : function( item ) {
                            //console.log(item)
                        }
                    });
            }
        }
    }

</script>

<style lang="scss">

    /* Variables */
    @import "../../../../sass/variables";

</style>