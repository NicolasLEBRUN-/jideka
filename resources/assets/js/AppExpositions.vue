<template>
    <div id="app-expositions">
        <expositions-menu-haut></expositions-menu-haut>
        <expositions></expositions>
    </div>
</template>

<script>
    import ExpositionsMenuHaut from './components/ExpositionsMenuHaut.vue';
    import Expositions from './components/Expositions.vue';
    
    export default {
        name: 'app-expositions',
        components: {
            ExpositionsMenuHaut,
            Expositions
        }
    };
</script>