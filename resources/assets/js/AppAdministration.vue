<template>
    <div id="app-administration">
        <administration-menu-haut></administration-menu-haut>
        <!-- <administration-presentation></administration-presentation> -->
        <administration-biographie></administration-biographie>
        <administration-galeries></administration-galeries>
        <administration-oeuvres></administration-oeuvres>
        <administration-expositions></administration-expositions>
    </div>
</template>

<script>
    import AdministrationMenuHaut from './components/AdministrationMenuHaut.vue';
    import AdministrationBiographie from './components/AdministrationBiographie.vue';
    import AdministrationGaleries from './components/AdministrationGaleries.vue';
    import AdministrationOeuvres from'./components/AdministrationOeuvres.vue';
    import AdministrationExpositions from './components/AdministrationExpositions.vue';
    
    export default {
        name: 'app-administration',
        components: {
            AdministrationMenuHaut,
            AdministrationBiographie,
            AdministrationGaleries,
            AdministrationOeuvres,
            AdministrationExpositions
        }
    };
</script>