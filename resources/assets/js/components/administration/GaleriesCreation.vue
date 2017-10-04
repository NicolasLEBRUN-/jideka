<template>
    <div id="administration-galeries-creation" class="administration-galeries-creation container">
        <div class="titre-section">
            Création
        </div>
        <div class="contenu-section">
            <div class="instructions">
                Ajoutez ici une ou des galeries.
                <br>
                Information : Une galerie créée sera immédiatement visible sur le site.
            </div>
            <div class="edition">
                <form action="" method="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nom">Nom de la galerie</label>
                        <br />
                        <input type="text" class="form-control" name="nom" v-model="nom" cols="50" placeholder="Nom" />
                    </div>
                    <div class="form-group">
                        <label for="description">Description de la galerie</label>
                        <br />
                        <textarea class="form-control" name="description" v-model="description" rows="3" cols="40" placeholder="Description">
                        </textarea> 
                    </div>
                    <div class="form-group">
                        <label for="visuel">Visuel de la galerie</label>
                        <br />
                        <input type="file" class="form-control" name="visuel" v-on:change="processFile" />
                        <br />
                        <img :src="visuel" alt="Visuel" style="max-height: 60px">
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
                    <button v-on:click.prevent="creerGalerie" class="btn">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    const French = require("flatpickr/dist/l10n/fr.js").fr;
    const Today = new Date();

    export default {
        name: 'administration-galeries-creation',
        components: {},
        data() {
            return {
                galeries: [],
                nom: '',
                description: '',
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
        },
        methods: {
            creerGalerie: function(event) {
                let self = this;
                axios.post('/api/create/galeries', {
                        nom: self.nom,
                        description: self.description,
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
    