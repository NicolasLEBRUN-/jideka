<template>
    <div id="accueil-expositions" class="accueil-expositions container">
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
                <a href="/web-expositions">Découvrir l'ensemble des expositions</a>
                <!-- <a :href="'/' + $trans('locale') + '/web-expositions'">Découvrir l'ensemble des expositions</a> -->
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
    