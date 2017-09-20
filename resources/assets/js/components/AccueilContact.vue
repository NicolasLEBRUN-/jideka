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
            <div>
                <form>
                    <div class="form-group">
                        <label for="nom">{{ $trans('accueil.contact.form.nom') }}</label>
                        <input class="form-control" name="nom" v-model="nom" placeholder="Nom">
                    </div>
                    <div class="form-group">
                        <label for="email">{{ $trans('accueil.contact.form.email') }}</label>
                        <input class="form-control" name="email" v-model="email" placeholder="Adresse email">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" class="form-control" id="prereservation" name="prereservation" v-model="prereservation">
                        <label for="prereservation">{{ $trans('accueil.contact.form.prereservation') }}</label>
                    </div>
                    <div class="form-group" v-if="prereservation">
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
                    </div>
                    <div class="form-group">
                        <label for="corps">{{ $trans('accueil.contact.form.message') }}</label>
                        <br />
                        <textarea class="form-control" name="corps" v-model="corps" rows="5" cols="50" placeholder="Message">
                        </textarea> 
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
                    <button v-on:click.prevent="sendMessage" class="btn">{{ $trans('accueil.contact.form.bouton') }}</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['googleRecaptchaDataSitekey'],
        data: function() {
            return {
                nom: '',
                email: '',
                prereservation: false,
                galeries: [],
                galerie: '',
                oeuvres: [],
                oeuvre: '',
                corps: '',
                errors: [],
                success: ''
            }
        },
        computed: {
            prereservationAndGalerie: function() {
                return this.prereservation && this.galerie;
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
            recupererOeuvres: function(event) {
                this.oeuvre = '';
                let self = this;
                axios.get('/api/galeries/' + this.galerie + '/oeuvres')
                    .then(function (response) {
                        self.oeuvres = response.data;
                    })
                    .catch(function (error) {
                        console.log('Erreur axios : ' + error);
                    });
            },
            sendMessage: function(event) {
                this.errors = [];
                this.success = '';
                let self = this;
                axios.post('/contact', {
                        nom: self.nom,
                        email: self.email,
                        prereservation: self.prereservation,
                        galerie: self.galerie,
                        oeuvre: self.oeuvre,
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
        }
    }
</script>

<style type="text/css" scoped>
    .contenu-section {
        //display: flex;
        //flex-direction: column;
        //justify-content: space-around;
        //flex-wrap: wrap;
    }
</style>
    