<template>
    <div id="accueil-contact" class="accueil-contact container">
        <div class="titre-section">
            <h1>
                {{ $trans('accueil.contact.titre-section') }}
            </h1>
        </div>
        <div class="contenu-section">
            <div>
                {{ $trans('accueil.contact.accroche') }}
            </div>
            <hr>
            {{ $trans('accueil.contact.numerotelphone') }}
            <br />
            {{ $trans('accueil.contact.adressecourriel') }}
            <hr>
            <div>
                <form>
                    <div class="form-group">
                        <!-- <label for="nom">{{ $trans('accueil.contact.form.nom') }}</label> -->
                        <form-input type="text" name="nom" v-model="nom" placeholder="Nom et prénom"></form-input>
                        <!-- <input class="form-control" name="nom" v-model="nom" placeholder="Nom"> -->
                    </div>
                    <div class="form-group">
                        <!-- <label for="email">{{ $trans('accueil.contact.form.email') }}</label> -->
                        <form-input type="text" name="email" v-model="email" placeholder="Adresse email"></form-input>
                        <!-- <input class="form-control" name="email" v-model="email" placeholder="Adresse email"> -->
                    </div>
                    <div class="form-group">
                        <!-- <label for="corps">{{ $trans('accueil.contact.form.message') }}</label>
                        <br />
                        <textarea class="form-control" name="corps" v-model="corps" rows="5" cols="50" placeholder="Message">
                        </textarea>  -->
                        <form-textarea name="corps" v-model="corps" value="" placeholder="Message"></form-textarea>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" class="form-control" id="prereservation" name="prereservation" v-model="prereservation">
                        <label for="prereservation">{{ $trans('accueil.contact.form.prereservation') }}</label>
                    </div>
                    <!-- <div class="form-group" v-if="prereservation">
                        <label for="galerie">{{ $trans('accueil.contact.form.galerie') }}</label>
                        <br />
                        <select name="galerie" v-model="galerie" v-on:change="recupererOeuvres">
                            <option v-for="galerie in galeries" :value="galerie.id">{{ galerie.nom }}</option>
                        </select>
                    </div>
                    <div class="form-group" v-if="prereservationAndGalerie">
                        <label for="oeuvre">{{ $trans('accueil.contact.form.oeuvre') }}</label>
                        <br />
                        <select name="oeuvre" v-model="oeuvre">
                            <option v-for="oeuvre in oeuvres" :value="oeuvre.id">{{ oeuvre.nom }}</option>
                        </select>
                    </div> -->
                    <div class="form-group" v-if="prereservation">
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
                    </div>
                    <div class="form-group">
                        <div class="g-recaptcha" :data-sitekey="googleRecaptchaDataSitekey"></div>
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
                    <div class="form-group">
                        <form-button v-on:click.prevent="sendMessage">{{ $trans('accueil.contact.form.bouton') }}</form-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import FormInput from '../common/FormInput.vue';
    import FormTextarea from '../common/FormTextarea.vue';
    import FormButton from '../common/FormButton.vue';
    import Multiselect from 'vue-multiselect'

    export default {
        props: [],
        data: function() {
            return {
                nom: '',
                email: '',
                prereservation: false,
                galeries: [],
                oeuvres: [],
                oeuvre: '',
                corps: '',
                googleRecaptchaDataSitekey: '',
                errors: [],
                success: ''
            }
        },
        computed: {
            prereservationAndGalerie: function() {
                return this.prereservation && this.galerie;
            }
        },
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
        mounted() {
            this.googleRecaptchaDataSitekey = document.querySelector('meta[name="google_recaptcha_data_sitekey"]').getAttribute('content');
        },
        methods: {
            customLabelforOeuvre: function ({ nom, annee, galerie_nom }) {
                return `${nom} (${annee}), galerie "${galerie_nom}"`
            },
            sendMessage: function(event) {
                this.errors = [];
                this.success = '';
                let self = this;
                axios.post('/contact', {
                        nom: self.nom,
                        email: self.email,
                        prereservation: self.prereservation,
                        galerie: self.oeuvre.galerie_id,
                        oeuvre: self.oeuvre.id,
                        corps: self.corps,
                        grecaptcharesponse: document.getElementById("g-recaptcha-response").value,
                    })
                    .then(function (response) {
                        self.success = response.data;
                    })
                    .catch(function (error) {
                        let errorObject = error.response.data;
                        self.errors = $.map(errorObject, function(value, index) {
                            return [value];
                        });
                    }).then(() => {
                        if(window.grecaptcha) grecaptcha.reset();
                    });
            }
        },
        components: {
            FormInput,
            FormTextarea,
            FormButton,
            Multiselect
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style lang="scss" scoped>

    /* Variables */
    @import "../../../sass/variables";

    div.form-group {
        margin-bottom: 12px;
    }

</style>
    