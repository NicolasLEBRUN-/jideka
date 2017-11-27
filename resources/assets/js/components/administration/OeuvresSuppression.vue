<template>
    <div id="administration-oeuvres-suppression" class="administration-oeuvres-suppression container">
        <div class="titre-section">
            <h2>Suppression</h2>
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
                        <form-label for="nom">Nom de l'oeuvre</form-label>
                        <multiselect 
                                v-model="oeuvre" 
                                name="oeuvre" 
                                placeholder="Sélectionner une oeuvre" 
                                label="nom" 
                                track-by="nom" 
                                :options="oeuvres" 
                                :option-height="104" 
                                :custom-label="customLabelforOeuvre" 
                                :show-labels="false">
                            <template slot="option" scope="props">
                                <img class="option__image" :src="props.option.chemin_image" alt="Oeuvre" style="height: 80px; display:inline-block; vertical-align:-120%;">
                                <div style="display:inline-block">
                                    <span class="option__title"><strong>{{ props.option.nom }}</strong></span>
                                    <br />
                                    <span class="option__small">{{ props.option.annee }}</span>
                                    <br />
                                    <span class="option__small">Galerie "{{ props.option.galerie_nom }}"</span>
                                </div>
                            </template>
                        </multiselect>
                        <!-- <select name="nom" v-model="oeuvre">
                            <option v-for="oeuvre in oeuvres" :value="oeuvre.id">{{ oeuvre.nom }}</option>
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
                    <form-button v-on:click.prevent="supprimerOeuvre" class="btn">Supprimer</form-button>
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
        name: 'administration-oeuvres-suppression',
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
            // Récupération des toutes les galeries
            axios.get('/api/galeries')
                    .then(function (response) {
                        self.galeries = response.data;
                    })
                    .catch(function (error) {
                        console.log('Erreur axios : ' + error);
                    });
            // Récupération des toutes les oeuvres
            axios.get('/api/oeuvres')
                    .then(function (response) {
                        self.oeuvres = response.data;
                        self.oeuvres.forEach( function (oeuvre) {
                            var galerie = self.galeries.find( function (galerie) {
                                return oeuvre.galerie_id == galerie.id
                            });
                            oeuvre.galerie_nom = galerie.nom;
                        });
                    })
                    .catch(function (error) {
                        console.log('Erreur axios : ' + error);
                    });
        },
        methods: {
            customLabelforOeuvre: function ({ nom, annee, galerie_nom }) {
                return `${nom} (${annee}), galerie "${galerie_nom}"`
            },
            supprimerOeuvre: function(event) {
                let self = this;
                axios.post('/api/delete/oeuvres', {
                        oeuvre: self.oeuvre.id,
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
    