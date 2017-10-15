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
    import AdministrationMenuHaut from './administration/MenuHaut.vue';
    import AdministrationBiographie from './administration/Biographie.vue';
    import AdministrationGaleries from './administration/Galeries.vue';
    import AdministrationOeuvres from'./administration/Oeuvres.vue';
    import AdministrationExpositions from './administration/Expositions.vue';
    
    export default {
        name: 'app-administration',
        components: {
            AdministrationMenuHaut,
            AdministrationBiographie,
            AdministrationGaleries,
            AdministrationOeuvres,
            AdministrationExpositions
        },
        props: ['token']
    };
</script>
