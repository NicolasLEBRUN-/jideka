<template>
    <div class="menu container">
        <ul class="navigation">
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Biographie</a></li>
            <li><a href="#">Galeries</a></li>
            <li><a href="#">Expostions</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style type="text/css" scoped>
    .navigation {
      list-style: none;
      margin: 0; 
      
      background: deepskyblue;
      
      display: -webkit-box;
      display: -moz-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      
      -webkit-flex-flow: row wrap;
      justify-content: flex-end;
    }

    .navigation a {
      text-decoration: none;
      display: block;
      padding: 1em;
      color: white;
    }

    .navigation a:hover {
      background: darken(deepskyblue, 2%);
    }

    @media all and (max-width: 800px) {
      .navigation {
        justify-content: space-around;
      }
    }

    @media all and (max-width: 600px) {
      .navigation {
        flex-flow: column wrap;
        justify-content: flex-start;
        padding: 0;
      }
      
      .navigation a { 
        text-align: center; 
        padding: 10px;
        border-top: 1px solid rgba(255,255,255,0.3); 
        border-bottom: 1px solid rgba(0,0,0,0.1); 
      }

      
      .navigation li:last-of-type a {
        border-bottom: none;
      }
    }
</style>
    