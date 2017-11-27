<template>
    <div id="expositions" class="expositions">
        <div class="titre-section">
            <h1>
                {{ $trans('expositions.expositions.titre-section') }}
            </h1>
        </div>
        <div class="contenu-section">
            <exposition-timeline/>
        </div>
    </div>
</template>

<script>
    import ExpositionTimeline from '../accueil/exposition-timeline/ExpositionTimeline.vue';

    export default {
        components: {
            ExpositionTimeline
        },
        data: function() {
            return {}
        },
        created() {},
        mounted() {}
    }
</script>

<style lang="scss" scoped>

    /* Variables */
    @import "../../../sass/variables";

    #expositions {
        margin-top: $menu-haut-height;
    }

    .titre-section {
        text-align: left;
        padding: 0 $side-padding;
    }

    .contenu-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        // text-align: center;
        padding: 0 $side-padding;
    }

</style>
