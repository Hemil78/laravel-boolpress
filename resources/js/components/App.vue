<template>
    <div>
        <Header/>
        <Main/>
        <Footer/>
    </div>
</template>

<script>
import Header from './Header.vue';
import Main from './Main.vue';
import Footer from './Footer.vue';

    export default {
        name: 'App',
        components: {
            Header,
            Main,
            Footer
        }
    }
</script>