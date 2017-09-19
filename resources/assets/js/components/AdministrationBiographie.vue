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
                        <label for="biographie">Biographie</label>
                        <br />
                        <textarea class="form-control" name="biographieCorps" v-model="biographieCorps" rows="12" cols="100">
                        </textarea> 
                        <input type="hidden" name="biographieVersion" v-model="biographieVersion" >
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
                biographieCorps: '',
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
                    self.biographieCorps = response.data[response.data.length - 1].corps;
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
                        biographieCorps: self.biographieCorps,
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

<style type="text/css" scoped>
    .contenu-section {
        display: flex;
        flex-direction: row wrap;
        justify-content: space-around;
        padding: 12px;
    }
</style>
    