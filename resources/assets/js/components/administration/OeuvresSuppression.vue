<template>
    <div id="administration-oeuvres-suppression" class="administration-oeuvres-suppression container">
        <div class="titre-section">
            Suppression
        </div>
        <div class="contenu-section">
            <div class="instructions">
                Supprimez ici une ou des oeuvres.
                <br>
                Information : Une oeuvre supprimée sera immédiatement masquée sur le site.
            </div>
            <div class="edition">
                <form action="" method="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nom">Nom de l'oeuvre</label>
                        <br />
                        <select name="nom" v-model="oeuvre">
                            <option v-for="oeuvre in oeuvres" :value="oeuvre.id">{{ oeuvre.nom }}</option>
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
                    <button v-on:click.prevent="supprimerOeuvre" class="btn">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    const French = require("flatpickr/dist/l10n/fr.js").fr;
    const Today = new Date();

    export default {
        name: 'administration-oeuvres-suppression',
        components: {},
        data() {
            return {
                oeuvres: [],
                oeuvre: '',
                errors: [],
                success: ''
            }
        },
        mounted() {},
        created() {
            let self = this;
            axios.get('/api/oeuvres')
                .then(function (response) {
                    self.oeuvres = response.data;
                })
                .catch(function (error) {
                    console.log('Erreur axios : ' + error);
                });
        },
        methods: {
            supprimerOeuvre: function(event) {
                let self = this;
                axios.post('/api/delete/oeuvres', {
                        oeuvre: self.oeuvre,
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
    