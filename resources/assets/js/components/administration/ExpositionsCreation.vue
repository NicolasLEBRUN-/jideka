<template>
    <div id="administration-expositions-creation" class="administration-expositions-creation container">
        <div class="titre-section">
            <h2>Création</h2>
        </div>
        <div class="contenu-section">
            <div class="instructions">
                Ajoutez ici une ou des expositions.
                <br>
                Information : Une exposition créée sera immédiatement visible sur le site.
            </div>
            <div class="edition">
                <form action="" method="" enctype="multipart/form-data">
                    <div class="form-group">
                        <form-label for="nom">Nom de l'exposition</form-label>
                        <form-input type="text" class="form-control" name="nom" v-model="nom" placeholder="Nom"></form-input>
                    </div>
                    <div class="form-group">
                        <form-label for="description">Description de l'exposition</form-label>
                        <form-textarea class="form-control" name="description" v-model="description" value="" placeholder="Description"></form-textarea> 
                    </div>

                    <div class="form-group">
                        <form-label for="lieu">Lieu/adresse de l'exposition</form-label>
                        <form-textarea class="form-control" name="lieu" v-model="lieu" value="" placeholder="Lieu/adresse"></form-textarea> 
                    </div>
                    <div class="form-group">
                        <form-label for="date-debut">Date de début de l'exposition</form-label>
                        <flat-pickr
                                v-model="dateDebut"
                                :config="configDateDebut"
                                :required="true"
                                class="form-control"
                                name="dateDebut">
                        </flat-pickr>
                    </div>
                    <div class="form-group">
                        <form-label for="date-fin">Date de fin de l'exposition</form-label>
                        <flat-pickr
                                v-model="dateFin"
                                :config="configDateFin"
                                :required="true"
                                class="form-control"
                                name="date-fin">
                        </flat-pickr>
                    </div>
                    <div class="form-group">
                        <form-label for="date-vernissage">Date et heure de vernissage de l'exposition</form-label>
                        <flat-pickr
                                v-model="dateVernissage"
                                :config="configDateVernissage"
                                :required="true"
                                class="form-control"
                                name="date-vernissage">
                        </flat-pickr>
                    </div>
                    <div class="form-group">
                        <form-label for="visuel">Visuel de l'exposition</form-label>
                        <form-input type="file" class="form-control" name="visuel" v-on:change="processFile"></form-input>
                        <img :src="visuel" alt="Visuel" style="max-height:80px; margin-bottom:16px;">
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
                    <button v-on:click.prevent="creerExposition" class="btn">Ajouter</button>
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

    const French = require("flatpickr/dist/l10n/fr.js").fr;
    const Today = new Date();

    export default {
        name: 'administration-expositions-creation',
        data() {
            return {
                expositions: [],
                nom: '',
                description: '',
                lieu: '',
                dateDebut: '',
                configDateDebut: {
                    defaultDate: Today,
                    altFormat: 'd/m/Y',
                    dateFormat: "Y-m-d H:i:ss",
                    altInput: true,
                    locale: French,
                },
                dateFin: '',
                configDateFin: {
                    defaultDate: Today,
                    minDate: this.dateDebut,
                    altFormat: 'd/m/Y',
                    dateFormat: "Y-m-d H:i:ss",
                    altInput: true,
                    locale: French,
                },
                dateVernissage: '',
                configDateVernissage: {
                    defaultDate: Today,
                    enableTime: true,
                    time_24hr: true,
                    altInput: true,
                    altFormat: 'd/m/Y H:i:ss',
                    dateFormat: "Y-m-d H:i:ss",
                    locale: French,   
                },
                visuel: '/img/apercu.png',
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
            creerExposition: function(event) {
                let self = this;
                axios.post('/api/create/expositions', {
                        nom: self.nom,
                        description: self.description,
                        lieu: self.lieu,
                        dateDebut: self.dateDebut,
                        dateFin: self.dateFin,
                        dateVernissage: self.dateVernissage,
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
            FormButton
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

    input.form-control.input.flatpickr-input {
        padding: 5px 10px;
    }

    @media all and (max-width: 600px) {
        .contenu-section {
            flex-flow: column wrap;
        }
    }
</style>
    