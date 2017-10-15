<template>
    <div id="app-galeries">
        <galeries-menu-haut></galeries-menu-haut>
        <galeries></galeries>
    </div>
</template>

<script>
    import GaleriesMenuHaut from './galeries/MenuHaut.vue';
    import Galeries from './galeries/Galeries.vue';
    
    export default {
        name: 'app-galeries',
        components: {
            GaleriesMenuHaut,
            Galeries
        }
    };
</script>
