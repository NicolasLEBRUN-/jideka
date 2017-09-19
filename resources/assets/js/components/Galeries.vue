<template>
    <div class="galeries container">
        <div class="titre-section">
            <h1>
                Galeries
            </h1>
        </div>
        <div class="contenu-section">
            <div>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sem nulla, interdum in velit ut, consequat tincidunt nulla. Proin sed placerat felis. Nullam vitae orci a nibh maximus rutrum sed a ante. Proin hendrerit augue ac ultricies elementum. Phasellus sed lacus sed odio consequat mattis sit amet eget sapien. Curabitur non viverra erat, eu pellentesque nunc. In eleifend nisl non leo pulvinar, nec ullamcorper lectus facilisis. Ut non egestas justo. Donec id congue eros.
            </div>
            <div>
                <ul>
                    <galerie v-for="galerie in galeries" :key="galerie.id" :galerie-id="galerie.id"></galerie>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import Galerie from '../components/Galerie.vue';

    export default {
        components: {
            Galerie
        },
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

<style type="text/css" scoped>
    .contenu-section {
        //display: flex;
        //flex-direction: column;
        //justify-content: space-around;
        //flex-wrap: wrap;
    }
</style>
    