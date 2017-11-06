<template>
    <div class="exposition">
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
            <li v-show="exposition.date_vernissage" class="vernissage-exposition">
                <i class="fa fa-glass" aria-hidden="true"></i> 
                Vernissage le {{ exposition.date_vernissage | formatDateTime }}
            </li>
            <li class="details-exposition">
                {{ exposition.description }}
            </li>
            <li class="lieu-exposition">
                <i class="fa fa-map-marker" aria-hidden="true"></i> {{ exposition.lieu }}
            </li>
            <div class="visuel-exposition">
                <img :src="exposition.chemin_visuel"/>
            </div>
        </ul>
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
                    return moment(String(value)).format('DD/MM/YYYY à HH:mm');
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

    .exposition {

        .dates-exposition, .vernissage-exposition, .lieu-exposition {
            opacity: .5;
        }

        .nom-exposition {
            font-size: 1.5rem
        }

        .dates-exposition {
            margin-top: 0
        }

        .details-exposition {
            padding: 5px 0 5px 10px;
            border-left: 1px solid white;
            margin: 10px 0 10px 6px;
        }

        .visuel-exposition {
            height: 120px;
            width: 120px;
            border: 2px solid white;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 4px;

            img {
                border: 4px solid $background-secondary-color;
                height: 114px;
                width: 114px;
            }
        }
    }

    ul {
        list-style-type: none;
        padding: 0 0 0 75px;
        margin: -1.35rem 0 1em;
        max-width: 32rem;
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
            width: 16px;
            height: 16px;
            background: #C5C5C5;
            border: 3px solid $background-primary-color;
            @include border-radius(50%);
            position: absolute;
            left: 53px;
            top: 3px;
            z-index: 2;
        }

        li {
            margin: 0;
            margin-left: 6px;
            &:not(:first-child) {
                margin-top: .4rem;
            }
            span.en-cours {
                font-size: 0.85em;
                font-style:italic;
                color:#FB6C3F;
            }
        }
    }

</style>
