<template>
    <div id="administration-expositions-suppression" class="administration-expositions-suppression container">
        <div class="titre-section">
            Suppression
        </div>
        <div class="contenu-section">
            <div class="instructions">
                Supprimez ici une ou des expositions.
                <br>
                Information : Une exposition supprimée sera immédiatement masquée sur le site.
            </div>
            <div class="edition">
                <form action="" method="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nom">Nom de l'exposition</label>
                        <br />
                        <select name="nom" v-model="exposition">
                            <option v-for="exposition in expositions" :value="exposition.id">{{ exposition.nom }}</option>
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
                    <button v-on:click.prevent="supprimerExposition" class="btn">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    const French = require("flatpickr/dist/l10n/fr.js").fr;
    const Today = new Date();

    export default {
        name: 'administration-expositions-suppression',
        components: {},
        data() {
            return {
                expositions: [],
                exposition: '',
                errors: [],
                success: ''
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
                    console.log('Erreur axios : ' + error);
                });
        },
        methods: {
            supprimerExposition: function(event) {
                let self = this;
                axios.post('/api/delete/expositions', {
                        exposition: self.exposition,
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

<style type="text/css" scoped>
    .contenu-section {
        display: flex;
        flex-direction: row wrap;
        justify-content: space-around;
        padding: 12px;
    }
</style>
    