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
                        <label for="biographieCorpsFr">Biographie française</label>
                        <br />
                        <textarea class="form-control" name="biographieCorpsFr" v-model="biographieCorpsFr" rows="12" cols="100">
                        </textarea> 
                    </div>
                    <div class="form-group">
                        <label for="biographieCorpsEn">Biographie anglaise</label>
                        <br />
                        <textarea class="form-control" name="biographieCorpsEn" v-model="biographieCorpsEn" rows="12" cols="100">
                        </textarea> 
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
                    <input type="hidden" name="biographieVersion" v-model="biographieVersion" >
                    <button v-on:click.prevent="creerBiographie" class="btn">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
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
        }
    }
</script>

<style lang="scss" scoped>
    $main-color                             : #EB7041 !default;
    $background-primary-color               : #353535 !default;
    $background-secondary-color             : #3F3F3F !default;
    $font-color                             : #FFF !default;

    .contenu-section {
        display: flex;
        background: $background-secondary-color;
        flex-direction: row wrap;
        justify-content: space-around;
        padding: 12px;
    }
</style>
    