<template>
    <div id="app-accueil">
        <accueil-menu-haut></accueil-menu-haut>
        <accueil-presentation></accueil-presentation>
        <accueil-biographie></accueil-biographie>
        <accueil-galeries></accueil-galeries>
        <accueil-expositions></accueil-expositions>
        <accueil-contact></accueil-contact>
        <accueil-footer></accueil-footer>
    </div>
</template>

<script>
    import AccueilMenuHaut from './accueil/MenuHaut.vue';
    import AccueilPresentation from './accueil/Presentation.vue';
    import AccueilBiographie from './accueil/Biographie.vue';
    import AccueilGaleries from './accueil/Galeries.vue';
    import AccueilExpositions from './accueil/Expositions.vue';
    import AccueilContact from './accueil/Contact.vue';
    import AccueilFooter from './accueil/Footer.vue';
    
    export default {
        name: 'app-accueil',
        components: {
            AccueilMenuHaut,
            AccueilPresentation,
            AccueilBiographie,
            AccueilGaleries,
            AccueilExpositions,
            AccueilContact,
            AccueilFooter
        },
        created() {
        }
    };
</script>
