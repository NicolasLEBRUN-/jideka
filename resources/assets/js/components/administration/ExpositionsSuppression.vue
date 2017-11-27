<template>
    <div id="administration-expositions-suppression" class="administration-expositions-suppression container">
        <div class="titre-section">
            <h2>Suppression</h2>
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
                        <form-label for="nom">Nom de l'exposition</form-label>
                        <multiselect v-model="exposition" :options="expositions" :custom-label="customLabelForExposition" placeholder="Sélectionner une exposition" label="nom" track-by="nom" :show-labels="false"></multiselect>
                        <!-- <select name="nom" v-model="exposition">
                            <option v-for="exposition in expositions" :value="exposition.id">{{ exposition.nom }}</option>
                        </select> -->
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
                    <form-button v-on:click.prevent="supprimerExposition">Supprimer</form-button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import FormLabel from '../common/FormLabel.vue';
    import FormInput from '../common/FormInput.vue';
    import FormTextarea from '../common/FormTextarea.vue';
    import FormButton from '../common/FormButton.vue';
    import Multiselect from 'vue-multiselect'

    const French = require("flatpickr/dist/l10n/fr.js").fr;
    const Today = new Date();

    export default {
        name: 'administration-expositions-suppression',
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
            customLabelForExposition: function ({ nom, description }) {
                return `${nom} - ${description}`
            },
            supprimerExposition: function(event) {
                let self = this;
                axios.post('/api/delete/expositions', {
                        exposition: self.exposition.id,
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
        },
        components: {
            FormLabel,
            FormInput,
            FormTextarea,
            FormButton,
            Multiselect
        }
    }
</script>

<style lang="scss" scoped>

    /* Variables */
    @import "../../../sass/variables";

    .contenu-section {
        display: flex;
        flex-direction: row wrap;
        justify-content: space-around;
    }

    .instructions {
        flex: 1 1 0;
        margin-bottom: 16px;
        margin-right: 16px;
    }

    .edition {
        flex: 1 1 0;
    }

    .multiselect {
        margin-bottom: 15px;
    }

    @media all and (max-width: 600px) {
        .contenu-section {
            flex-flow: column wrap;
        }
    }
    
</style>
    