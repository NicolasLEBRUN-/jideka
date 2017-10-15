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
                        <label for="nom">Nom de l'oeuvre</label>
                        <br />
                        <input type="text" class="form-control" name="nom" v-model="nom" cols="50" placeholder="Nom" />
                    </div>
                    <div class="form-group">
                        <label for="description">Description de l'oeuvre</label>
                        <br />
                        <textarea class="form-control" name="description" v-model="description" rows="3" cols="40" placeholder="Description">
                        </textarea> 
                    </div>
                    <div class="form-group">
                        <label for="technique">Technique de l'oeuvre</label>
                        <br />
                        <input type="text" class="form-control" name="technique" v-model="technique" cols="50" placeholder="Technique" />
                    </div>
                    <div class="form-group">
                        <label for="annee">Année de l'oeuvre</label>
                        <br />
                        <input type="text" class="form-control" name="annee" v-model="annee" cols="50" placeholder="Année" />
                    </div>
                    <div class="form-group">
                        <label for="hauteur">Hauteur de l'oeuvre</label>
                        <br />
                        <input type="text" class="form-control" name="hauteur" v-model="hauteur" cols="50" placeholder="Hauteur" /> cm
                    </div>
                    <div class="form-group">
                        <label for="largeur">Largeur de l'oeuvre</label>
                        <br />
                        <input type="text" class="form-control" name="largeur" v-model="largeur" cols="50" placeholder="Largeur" /> cm
                    </div>
                    <div class="form-group">
                        <label for="profondeur">Profondeur de l'oeuvre</label>
                        <br />
                        <input type="text" class="form-control" name="profondeur" v-model="profondeur" cols="50" placeholder="Profondeur" /> cm
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix de l'oeuvre</label>
                        <br />
                        <input type="text" class="form-control" name="prix" v-model="prix" cols="50" placeholder="Prix" /> €
                    </div>
                    <div class="form-group">
                        <label for="statutdisponibilite">Disponibilité de l'oeuvre</label>
                        <br />
                        <select name="statutdisponibilite" v-model="statutdisponibilite">
                            <option v-for="statut in statusdisponibilite" :value="statut.id">{{ statut.libelle }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom de la galerie à laquelle l'oeuvre appartient</label>
                        <br />
                        <select name="nom" v-model="galerie">
                            <option v-for="galerie in galeries" :value="galerie.id">{{ galerie.nom }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="visuel">Image de l'oeuvre</label>
                        <br />
                        <input type="file" class="form-control" name="visuel" v-on:change="processFile" />
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
                    <button v-on:click.prevent="creerOeuvre" class="btn">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    const French = require("flatpickr/dist/l10n/fr.js").fr;
    const Today = new Date();

    export default {
        name: 'administration-oeuvres-creation',
        components: {},
        data() {
            return {
                oeuvres: [],
                galeries: [],
                statusdisponibilite: [],
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
            axios.get('/api/oeuvres')
                .then(function (response) {
                    self.oeuvres = response.data;
                })
                .catch(function (error) {
                    console.log('Erreur axios : ' + error);
                });
            axios.get('/api/galeries')
                .then(function (response) {
                    self.galeries = response.data;
                })
                .catch(function (error) {
                    console.log('Erreur axios : ' + error);
                });
            axios.get('/api/statutsdisponibilite')
                .then(function (response) {
                    self.statusdisponibilite = response.data;
                })
                .catch(function (error) {
                    console.log('Erreur axios : ' + error);
                });
        },
        methods: {
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
    