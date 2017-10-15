<template>
    <div id="app-expositions">
        <expositions-menu-haut></expositions-menu-haut>
        <expositions></expositions>
    </div>
</template>

<script>
    import ExpositionsMenuHaut from './expositions/MenuHaut.vue';
    import Expositions from './expositions/Expositions.vue';
    
    export default {
        name: 'app-expositions',
        components: {
            ExpositionsMenuHaut,
            Expositions
        }
    };
</script>
