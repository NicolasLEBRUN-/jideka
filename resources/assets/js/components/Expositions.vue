<template>
    <div class="expositions container">
        <div class="titre-section">
            <h1>
                Expositions
            </h1>
        </div>
        <div class="contenu-section">
            <div>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sem nulla, interdum in velit ut, consequat tincidunt nulla. Proin sed placerat felis. Nullam vitae orci a nibh maximus rutrum sed a ante. Proin hendrerit augue ac ultricies elementum. Phasellus sed lacus sed odio consequat mattis sit amet eget sapien. Curabitur non viverra erat, eu pellentesque nunc. In eleifend nisl non leo pulvinar, nec ullamcorper lectus facilisis. Ut non egestas justo. Donec id congue eros.
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
    