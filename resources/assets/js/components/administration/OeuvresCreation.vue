<template>
    <div id="administration-oeuvres-creation" class="administration-oeuvres-creation container">
        <div class="titre-section">
            Création
        </div>
        <div class="contenu-section">
            <div class="instructions">
                Ajoutez ici une ou des oeuvres.
                <br>
                Information : Une oeuvre créée sera immédiatement visible sur le site.
            </div>
            <div class="edition">
                <form action="" method="" enctype="multipart/form-data">
                    <div class="form-group">
                        <form-label for="nom">Nom de l'oeuvre</form-label>
                        <br />
                        <form-input type="text" class="form-control" name="nom" v-model="nom" placeholder="Nom"></form-input>
                    </div>
                    <div class="form-group">
                        <form-label for="description">Description de l'oeuvre</form-label>
                        <br />
                        <form-textarea class="form-control" name="description" v-model="description" placeholder="Description"></form-textarea> 
                    </div>
                    <div class="form-group">
                        <form-label for="technique">Technique de l'oeuvre</form-label>
                        <br />
                        <form-input type="text" class="form-control" name="technique" v-model="technique" placeholder="Technique"></form-input>
                    </div>
                    <div class="form-group">
                        <form-label for="annee">Année de l'oeuvre</form-label>
                        <br />
                        <form-input type="text" class="form-control" name="annee" v-model="annee" placeholder="Année"></form-input>
                    </div>
                    <div class="form-group">
                        <form-label for="hauteur">Hauteur de l'oeuvre</form-label>
                        <br />
                        <form-input type="text" class="form-control" name="hauteur" v-model="hauteur" placeholder="Hauteur"></form-input> cm
                    </div>
                    <div class="form-group">
                        <form-label for="largeur">Largeur de l'oeuvre</form-label>
                        <br />
                        <form-input type="text" class="form-control" name="largeur" v-model="largeur" placeholder="Largeur"></form-input> cm
                    </div>
                    <div class="form-group">
                        <form-label for="profondeur">Profondeur de l'oeuvre</form-label>
                        <br />
                        <form-input type="text" class="form-control" name="profondeur" v-model="profondeur" placeholder="Profondeur"></form-input> cm
                    </div>
                    <div class="form-group">
                        <form-label for="prix">Prix de l'oeuvre</form-label>
                        <br />
                        <form-input type="text" class="form-control" name="prix" v-model="prix" placeholder="Prix"></form-input> €
                    </div>
                    <div class="form-group">
                        <form-label for="statutdisponibilite">Disponibilité de l'oeuvre</form-label>
                        <br />
                        <multiselect v-model="statutdisponibilite" :options="statutsdisponibilite" :custom-label="customLabelForStatutDisponibilite" placeholder="Sélectionner une disponibilité" label="libelle" track-by="libelle"></multiselect>
                        <!-- <select name="statutdisponibilite" v-model="statutdisponibilite">
                            <option v-for="statut in statusdisponibilite" :value="statut.id">{{ statut.libelle }}</option>
                        </select> -->
                    </div>
                    <div class="form-group">
                        <form-label for="nom">Nom de la galerie à laquelle l'oeuvre appartient</form-label>
                        <br />
                        <multiselect v-model="galerie" :options="galeries" :custom-label="customLabelForGalerie" placeholder="Sélectionner une galerie" label="nom" track-by="nom"></multiselect>
                        <!-- <select name="galerie" v-model="galerie">
                            <option v-for="galerie in galeries" :value="galerie.id">{{ galerie.nom }}</option>
                        </select> -->
                    </div>
                    <div class="form-group">
                        <form-label for="visuel">Image de l'oeuvre</form-label>
                        <br />
                        <form-input type="file" class="form-control" name="visuel" v-on:change="processFile"></form-input>
                        <br />
                        <img :src="visuel" alt="Image" style="max-height: 60px">
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
                    <form-button v-on:click.prevent="creerOeuvre" class="btn">Ajouter</form-button>
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
        name: 'administration-oeuvres-creation',
        data() {
            return {
                galeries: [],
                statutsdisponibilite: [],
                nom: '',
                description: '',
                technique: '',
                annee: '',
                hauteur: '',
                largeur: '',
                profondeur: '',
                prix: '',
                statutdisponibilite: '',
                galerie: '',
                visuel: '',
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
            axios.get('/api/statutsdisponibilite')
                .then(function (response) {
                    self.statutsdisponibilite = response.data;
                })
                .catch(function (error) {
                    console.log('Erreur axios : ' + error);
                });
        },
        methods: {
            customLabelForStatutDisponibilite: function ({ libelle }) {
                return `${libelle}`
            },
            customLabelForGalerie: function ({ nom, description }) {
                return `${nom} - ${description}`
            },
            creerOeuvre: function(event) {
                let self = this;
                axios.post('/api/create/oeuvres', {
                        nom: self.nom,
                        description: self.description,
                        technique: self.technique,
                        annee: self.annee,
                        hauteur: self.hauteur,
                        largeur: self.largeur,
                        profondeur: self.profondeur,
                        prix: self.prix,
                        statutdisponibilite: self.statutdisponibilite,
                        galerie: self.galerie,
                        visuel: self.visuel,
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
            },
            processFile(event) {
                let files = event.target.files || event.dataTransfer.files;
                if (!files.length) {
                    return;
                }
                let file = files[0];
                let reader = new FileReader();
                let self = this;
                reader.onload = function(e) {
                    self.visuel = e.target.result;
                };
                reader.readAsDataURL(file);
            },
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

</style>
    