<template>
    <div class="expositions container">
        <div class="titre-section">
            <h1>
                {{ $trans('expositions.expositions.titre-section') }}
            </h1>
        </div>
        <div class="contenu-section">
            <div class="accroche">
                {{ $trans('expositions.expositions.accroche') }}
            </div>

            <div class="expositions-container">
                <div class="item">
                    <div id="timeline">
                        <div>

                            <template v-for="annee in anneesExpositions">
                                <section class="year">
                                    <h3>{{ annee }}</h3>
                                    <template v-for="exposition in orderedExpositions">
                                        <section v-if="estExpositionDeAnnee(annee, exposition)">
                                            <exposition :exposition="exposition"></exposition>
                                        </section>
                                    </template>
                                </section>
                            </template>

                       </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</template>

<script>
    import Exposition from '../expositions/Exposition.vue';

    export default {
        components: {
            Exposition
        },
        data: function() {
            return {
                expositions: []
            }
        },
        computed: {
            orderedExpositions: function () {
                return _.orderBy(this.expositions, 'date_debut').reverse();
            },
            anneesExpositions: function () {
                function getYear(date) {
                    return moment(date).year();
                }
                let anneesExpositions = [];
                anneesExpositions = _.map(this.orderedExpositions, 'date_debut')
                anneesExpositions = _.map(anneesExpositions, getYear);
                anneesExpositions = _.uniq(anneesExpositions);                
                anneesExpositions = _.orderBy(anneesExpositions).reverse();
                return anneesExpositions;
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
                    console.log('Erreur axios (AccueilExpositions.vue) : ' + error);
                });
        },
        methods: {
            estExpositionDeAnnee: function(annee, exposition) {
                return annee == moment(exposition.date_debut).year();
            }
        },
        filters: {}
    }
</script>

<style type ="text/scss" lang="scss" scoped>

    div.expositions-container {
        display: flex;
        flex: auto;
        flex-direction: column;
        max-height: 100%;
    }

    div.accroche {
        height: auto;
        position: relative;
        &:after {
            content: '';
            position: absolute;
            bottom: -5rem;
            left: 0rem;
            height: 5.1rem;
            display: block;
            width: 100%;
            z-index: 3; //TCY
            background: -moz-linear-gradient(top,rgba(61,61,61,1) 20%,rgba(61,61,61,0) 100%);
            background: -webkit-linear-gradient(top,rgba(61,61,61,1) 20%,rgba(61,61,61,0) 100%);
            background: linear-gradient(to bottom,rgba(61,61,61,1) 20%,rgba(61,61,61,0) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(
                    startColorstr='#ffffff',endColorstr='#00ffffff',GradientType=0
                );
        }
    }

    div.item {
        display: flex;
        flex: auto;
        overflow-y: auto;
        padding: 0rem 1rem 0rem 1rem;
        //height: 300px; //TCY;
    }

    #timeline {
        position: relative;
        display: table;//For Firefox
        height: 100%;
        margin: {
            left: auto;
            right: auto;
            top: 5rem;
        }
        div {
            &:after {
                content: '';
                width: 2px;
                position: absolute;
                top: .5rem;
                bottom: 0rem;
                left: 60px;
                z-index: 1;
                background: #C5C5C5;
            }
        }
        h3 {
            position: -webkit-sticky;
            position: sticky;
            top: 5rem;
            color: #888;
            margin: 0;
            font: {
                size: 1em;
                weight: 400;
            }
            @media (min-width:62em) {
                font-size: 1.1em;
            }
        }
        section.year {
            position: relative;
            &:first-child section {
                margin-top: -1.3em;
                padding-bottom: 0px;
            }
            section {
                position: relative;
                padding-bottom: 1.25em;
                margin-bottom: 2.2em;
                &:last-child {
                    padding-bottom: 0.5em;
                    margin-bottom: 1.1em;
                }
            }
        }
    }

</style>
