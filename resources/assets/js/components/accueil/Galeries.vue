<template>
    <div id="accueil-galeries" class="accueil-galeries container">
        <div class="titre-section">
            <h1>
                {{ $trans('accueil.galeries.titre-section') }}
            </h1>
        </div>
        <div class="contenu-section">
            <div>
                {{ $trans('accueil.galeries.accroche') }}
            </div>
            <div>
                <a href="/web-galeries">{{ $trans('accueil.galeries.lien') }}</a>
            </div>
            <div>
                <ul>
                    <li v-for="galerie in galeries">{{ galerie }}</li>
                </ul>
            </div>
            <div>
                ----------<br />
                | Module |<br />
                ----------<br />
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                galeries: []
            }
        },
        mounted() {},
        created() {
            let self = this;
            axios.get('/api/galeries')
                .then(function (response) {
                    self.galeries = response.data;
                })
                .catch(function (error) {
                    console.log('Erreur axios : ' + error);
                });
        }
    }
</script>

<style lang="scss" scoped>

    /* Variables */
    @import "../../../sass/variables";

</style>
    