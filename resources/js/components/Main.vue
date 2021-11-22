<template>
    <header>
        <h2>Tutti i post</h2>
        <div class="container">
            <div class="box-post">
                <div class="post" v-for="post in posts" :key="post.id">
                    <h3>Titolo: {{post.title }}</h3>
                    <p>{{post.content}}</p>
                </div>

            </div>
            
        </div>
    </header>
</template>

<style scoped>
    *{
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
    .box-post{
        width: 100%;
        display: flex;
        flex-wrap: wrap ;

    }
    .post{
        width: calc(100% / 2);
        padding: 30px 30px;
        border: 1px solid lightgray;
    }
    h2{
        margin-bottom: 30px;
    }
</style>

<script>
    export default {
        name: 'Main',
        data() {
            return {
                posts:[]
            }
        },
        mounted() {
            axios.get('/api/posts')
                .then((response) => {
                    // handle success
                    this.posts = response.data.data
                })
                .catch( (error) => {
                    // handle error
                    console.log(error);
                })

        }
    }
</script>