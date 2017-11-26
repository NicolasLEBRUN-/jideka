<template>
    <div id="accueil-contact" class="accueil-contact container">
        <div class="titre-section">
            <h1>
                {{ $trans('accueil.contact.titre-section') }}
            </h1>
        </div>
        <div class="contenu-section">
            <hr>
            <p class="num">
                {{ $trans('accueil.contact.numerotelphone') }}
            </p>
            <p class="mail">
                {{ $trans('accueil.contact.adressecourriel') }}
            </p>
            <hr>
            <form>
                <form-input type="text" name="nom" v-model="nom" placeholder="Nom et prénom"></form-input>
                <form-input type="text" name="email" v-model="email" placeholder="Adresse email"></form-input>
                <form-textarea name="corps" v-model="corps" value="" placeholder="Message"></form-textarea>
                <div class="prereservation-checkbox">
                    <input type="checkbox" class="form-control" id="prereservation" name="prereservation" v-model="prereservation">
                    <label for="prereservation">{{ $trans('accueil.contact.form.prereservation') }}</label>
                </div>
                <multiselect 
                        class="oeuvre-picker"
                        v-model="oeuvre" 
                        v-if="prereservation"
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
                <div class="g-recaptcha" :data-sitekey="googleRecaptchaDataSitekey" data-theme="dark"></div>
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
                <form-button class="send-button" v-on:click.prevent="sendMessage">{{ $trans('accueil.contact.form.bouton') }}</form-button>
            </form>
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
    @import "../../../sass/breakpoints";

    .accueil-contact {
        background: $background-secondary-color;
        padding-top: 50px;
        display: flex;
        flex-direction: column;
        align-items: center;

        .contenu-section {
            padding: 0 100px;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 50%;

            p {
                text-align: center; 
            }

            hr {
                width: 100%;
                min-width: 320px;
                border-color: rgba(255, 255, 255, .5);
                margin: 30px 0px;
            }

            .num {
                margin: 0;
                font-weight: bold;
                font-size: 1.8em;
            }

            .mail {
                margin: 0;
                margin-top: 10px;
                color: $main-color;
                font-size: 1.5em;
                letter-spacing: 3px;
            }

            form {
                display: flex;
                flex-direction: column;
                width: 100%;
                min-width: 320px;
                width: 60%;

                .prereservation-checkbox {
                    margin-bottom: 15px;
                }

                .oeuvre-picker {
                    margin-bottom: 15px;
                }

                .g-recaptcha {
                    display: flex;
                    justify-content: center;
                }

                .send-button {
                    align-self: center;
                    width: 60%;
                    margin-top: 40px;

                    &:hover {
                        background: darken($main-color, 5%)
                    }

                    &:active {
                        background: darken($main-color, 10%)
                    }
                }
            }
        }
    }

</style>
    