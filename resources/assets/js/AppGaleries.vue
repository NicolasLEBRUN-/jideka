<template>
    <div id="app-galeries">
        <galeries-menu-haut></galeries-menu-haut>
        <galeries></galeries>
    </div>
</template>

<script>
    import GaleriesMenuHaut from './components/GaleriesMenuHaut.vue';
    import Galeries from './components/Galeries.vue';
    
    export default {
        name: 'app-galeries',
        components: {
            GaleriesMenuHaut,
            Galeries
        }
    };
</script>