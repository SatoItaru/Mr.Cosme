<template>
    <div class="container">
        <div class="row justify-content-center mt-1">
            <div class="col-md-12">
                <div class="ml-5">
                    <button @click="unfavorite()" class="btn btn-danger like-button ml-4" v-if="result">
                    いいね解除
                    </button>
                    <button @click="favorite()" class="btn btn-success like-button ml-5" v-else>
                    いいね
                    </button>
                    <p class="count">：{{ count }}</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['post'],
        data() {
            return {
                count: "",
                result: false
            }
        },
        mounted () {
            this.hasfavorites();
            this.countfavorites();
        },
        methods: {
            favorite() {
                axios.get('/posts/' + this.post.id +'/favorites')
                .then(res => {
                    this.result = res.data.result;
                    this.count = res.data.count;
                }).catch(function(error) {
                    console.log(error);
                });
            },
            unfavorite() {
                axios.get('/posts/' + this.post.id +'/unfavorites')
                .then(res => {
                    this.result = res.data.result;
                    this.count = res.data.count;
                }).catch(function(error){
                    console.log(error);
                });
            },
            countfavorites() {
                axios.get('/posts/' + this.post.id +'/countfavorites')
                .then(res => {
                    this.count = res.data;
                }).catch(function(error){
                    console.log(error);
                });
            },
            hasfavorites() {
                axios.get('/posts/' + this.post.id +'/hasfavorites')
                .then(res => {
                    this.result = res.data;
                }).catch(function(error){
                    console.log(error);
                });
            }
        }
    }
</script>
