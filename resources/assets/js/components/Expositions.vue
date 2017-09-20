<template>
    <div class="expositions container">
        <div class="titre-section">
            <h1>
                {{ $trans('expositions.expositions.titre-section') }}
            </h1>
        </div>
        <div class="contenu-section">
            <div>
                {{ $trans('expositions.expositions.accroche') }}
            </div>

            <div>
                <ul>
                    <exposition v-for="exposition in expositions" :key="exposition.id" :exposition-id="exposition.id"></exposition>
                </ul>
            </div>

        </div>
    </div>
</template>

<script>
    import Exposition from '../components/Exposition.vue';

    export default {
        components: {
            Exposition
        },
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
                    console.log('Erreur axios (Expositions.vue) : ' + error);
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
    