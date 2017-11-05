<template>
    <div class="details-exposition">
        <ul>
            <li class="nom-exposition">
                {{ exposition.nom }}
                <span v-show="estEnCours(exposition)" class="en-cours">
                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i> 
                    En cours
                </span>
            </li>
            <li class="dates-exposition">
                <i class="fa fa-calendar" aria-hidden="true"></i> 
                Du {{ exposition.date_debut | formatDate }} au {{ exposition.date_fin | formatDate }}
            </li>
            <li class="details-exposition">
                {{ exposition.description }}
            </li>
            <li class="lieu-exposition">
                <i class="fa fa-map-marker" aria-hidden="true"></i> {{ exposition.lieu }}
            </li>
        </ul>
        <div class="visuel-exposition">
            <img :src="exposition.chemin_visuel" style="height: 180px;"/>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['exposition'],
        data() {
            return {
                //exposition: {},
            }
        },
        mounted() {},
        created() {},
        methods: {
            estEnCours: function(exposition) {
                return moment() > moment(exposition.date_debut) && moment() < moment(exposition.date_fin);
            }
        },
        filters: {
            formatDate: function(value) {
                if (value) {
                    return moment(String(value)).format('DD/MM/YYYY');
                }
            },
            formatDateTime: function(value) {
                if (value) {
                    return moment(String(value)).format('DD/MM/YYYY hh:mm');
                }
            },
        }
    }
</script>

<style lang="scss" scoped>

    /* Variables */
    @import "../../../sass/variables";

    @mixin border-radius($radius) {
        -webkit-border-radius: $radius;
        -moz-border-radius: $radius;
        -ms-border-radius: $radius;
        border-radius: $radius;
    }

    .details-exposition {
        display: flex;
    }

    ul {
        list-style-type: none;
        padding: 0 0 0 75px;
        margin: -1.35rem 0 1em;
        //max-width: 32rem;
        font-size: 1em;
        @media (min-width:62em) {
            font-size: 1.1em;
            padding: 0 0 0 75px;
        }

        &:last-child {
            margin: {
                bottom: 0;
            }
        }
        
        &:first-of-type:after {
            content: '';
            width: 10px;
            height: 10px;
            background: #C5C5C5;
            border: 2px solid #3D3D3D;
            @include border-radius(50%);
            position: absolute;
            left: 54px;
            top: 3px;
            z-index: 2;
        }

        li {
            margin: 0;
            // margin-left: 6px;
            &:not(:first-child) {
                // margin-top: .4rem;
            }
            span.en-cours {
                font-size: 0.85em;
                font-style:italic;
                color:#FB6C3F;
            }
        }
    }

</style>
