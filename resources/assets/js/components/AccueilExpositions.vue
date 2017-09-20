<template>
    <div id="accueil-expositions" class="accueil-expositions container">
        <div class="titre-section">
            <h1>
                {{ $trans('accueil.expositions.titre-section') }}
            </h1>
        </div>
        <div class="contenu-section">
            <div>
                {{ $trans('accueil.expositions.accroche') }}
            </div>
            
            <div>
                ----------<br />
                | Module |<br />
                ----------<br />
            </div>

            <div>
                <ul>
                    <li v-for="exposition in expositions">{{ exposition }}</li>
                </ul>
            </div>
            
            <div>
                <a href="/web-expositions">{{ $trans('accueil.expositions.lien') }}</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                expositions: []
            }
        },
        mounted() {},
        created() {
            let self = this;
            axios.get('/api/expositions')
                .then(function (response) {
                    self.expositions = response.data;
                })
                .catch(function (error) {
                    console.log('Erreur axios (AccueilExpositions.vue) : ' + error);
                });
        }
    }
</script>

<style type="text/css" scoped>
    .contenu-section {
        //display: flex;
        //flex-direction: column;
        //justify-content: space-around;
        //flex-wrap: wrap;
    }
</style>
    