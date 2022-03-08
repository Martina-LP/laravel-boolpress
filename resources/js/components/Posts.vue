<template>
    <section>
        <div class="container">
            <h1>Posts</h1>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Posts',
    data: function() {
        return {
            posts: []
        };
    },

    methods: {
        getPosts: function() {
            axios.get('http://127.0.0.1:8000/api/posts')
            .then((response) => {
                this.posts = response.data.results;
            });
        }
    },

    created: function() {
        this.getPosts();
    }
}
</script>
