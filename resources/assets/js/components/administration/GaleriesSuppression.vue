<template>
    <div id="administration-galeries-suppression" class="administration-galeries-suppression container">
        <div class="titre-section">
            Suppression
        </div>
        <div class="contenu-section">
            <div class="instructions">
                Supprimez ici une ou des galeries.
                <br>
                Information : Une galerie supprimée sera immédiatement masquée sur le site.
            </div>
            <div class="edition">
                <form action="" method="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nom">Nom de la galerie</label>
                        <br />
                        <select name="nom" v-model="galerie">
                            <option v-for="galerie in galeries" :value="galerie.id">{{ galerie.nom }}</option>
                        </select>
                    </div>
                    <div class="form-group danger" v-if="errors.length > 0">
                        Erreurs : 
                        <ul>
                            <li v-for="error in errors">{{ error[0] }}</li>
                        </ul>
                    </div>
                    <div class="form-group success" v-if="success">
                        <ul>
                            <li>{{ success }}</li>
                        </ul>
                    </div>
                    <button v-on:click.prevent="supprimerGalerie" class="btn">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    const French = require("flatpickr/dist/l10n/fr.js").fr;
    const Today = new Date();

    export default {
        name: 'administration-galeries-suppression',
        components: {},
        data() {
            return {
                galeries: [],
                galerie: '',
                errors: [],
                success: ''
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
        },
        methods: {
            supprimerGalerie: function(event) {
                let self = this;
                axios.post('/api/delete/galeries', {
                        galerie: self.galerie,
                    })
                    .then(function (response) {
                        self.success = response.data;
                        self.errors = [];
                    })
                    .catch(function (error) {
                        let errorObject = error.response.data;
                        self.errors = $.map(errorObject, function(value, index) {
                            return [value];
                        });
                        self.success = '';
                    });
            }
        }
    }
</script>

<style lang="scss" scoped>

    /* Variables */
    @import "../../../sass/variables";

</style>
    