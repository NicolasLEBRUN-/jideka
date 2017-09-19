<template>
    <div id="app-accueil">
        <accueil-menu-haut></accueil-menu-haut>
        <accueil-presentation></accueil-presentation>
        <accueil-biographie></accueil-biographie>
        <accueil-galeries></accueil-galeries>
        <accueil-expositions></accueil-expositions>
        <accueil-contact googleRecaptchaDataSitekey="6LedYy8UAAAAAIGeKivVQGyLmlsTqQfVmTNELgc8"></accueil-contact>
    </div>
</template>

<script>
    import AccueilMenuHaut from './components/AccueilMenuHaut.vue';
    import AccueilPresentation from './components/AccueilPresentation.vue';
    import AccueilBiographie from './components/AccueilBiographie.vue';
    import AccueilGaleries from './components/AccueilGaleries.vue';
    import AccueilExpositions from './components/AccueilExpositions.vue';
    import AccueilContact from './components/AccueilContact.vue';
    
    export default {
        name: 'app-accueil',
        components: {
            AccueilMenuHaut,
            AccueilPresentation,
            AccueilBiographie,
            AccueilGaleries,
            AccueilExpositions,
            AccueilContact
        },
        created() {
        }
    };
</script>