<template>
    <div id="administration-biographie" class="administration-biographie container">
        <div class="titre-section">
            <h1>
                Biographie
            </h1>
        </div>
        <div class="contenu-section">
            <div class="instructions">
                Modifiez ici votre biographie.
                <br />
                Information : La biographie modifiée sera immédiatement visible sur le site.
            </div>
            <div class="edition">
                <form>
                    <div class="form-group">
                        <form-label for="biographieCorpsFr">Biographie française</form-label>
                        <!-- <label for="biographieCorpsFr">Biographie française</label> -->
                        <br />
                        <form-textarea class="form-control" name="biographieCorpsFr" v-model="biographieCorpsFr" value="biographieCorpsFr" placeholder="Biographie française" rows="12" cols="100"></form-textarea>
                        <!-- <textarea class="form-control" name="biographieCorpsFr" v-model="biographieCorpsFr" rows="12" cols="100"></textarea>  -->
                    </div>
                    <div class="form-group">
                        <form-label for="biographieCorpsEn">Biographie anglaise</form-label>
                        <!-- <label for="biographieCorpsEn">Biographie anglaise</label> -->
                        <br />
                        <form-textarea class="form-control" name="biographieCorpsEn" v-model="biographieCorpsEn" value="biographieCorpsEn" placeholder="Biographie anglaise" rows="12" cols="100"></form-textarea>
                        <!-- <textarea class="form-control" name="biographieCorpsEn" v-model="biographieCorpsEn" rows="12" cols="100"></textarea>  -->
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
                    <form-input type="hidden" name="biographieVersion" v-model="biographieVersion" placeholder="Version de la biographie"></form-input>
                    <form-button v-on:click.prevent="creerBiographie" class="btn">Modifier</form-button>
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

    export default {
        props: [],
        data: function() {
            return {
                biographieCorpsFr: '',
                biographieCorpsEn: '',
                biographieVersion: '',
                errors: [],
                success: ''
            }
        },
        mounted() {},
        created() {
            let self = this;
            axios.get('/api/biographies')
                .then(function (response) {
                    self.biographieCorpsFr = response.data[response.data.length - 1].corps_fr;
                    self.biographieCorpsEn = response.data[response.data.length - 1].corps_en;
                    self.biographieVersion = response.data[response.data.length - 1].version;
                })
                .catch(function (error) {
                    console.log('Erreur axios : ' + error);
                });
        },
        methods: {
            creerBiographie: function(event) {
                let self = this;
                axios.post('/api/create/biographies', {
                        biographieCorpsFr: self.biographieCorpsFr,
                        biographieCorpsEn: self.biographieCorpsEn,
                        biographieVersion: self.biographieVersion,
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
            FormButton
        }
    }
</script>

<style lang="scss" scoped>

    /* Variables */
    @import "../../../sass/variables";

    #administration-biographie {
        margin-top: $menu-haut-height;
    }

    .contenu-section {
        display: flex;
        background: $background-secondary-color;
        flex-direction: row wrap;
        justify-content: space-around;
        padding: 12px;
    }
</style>
    