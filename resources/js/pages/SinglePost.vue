<template>
  <div class="container text-center" v-if='post'>
      <h1>{{post.post_title}}</h1>
      <div class="my-2">
          <span class="badge badge-success">{{post.author}}</span>
          <span class="badge badge-primary mx-1" v-for="(tag, index) in post.tags" :key="`post-tag${index}`">{{tag.name}}</span>
      </div>
      <p>{{post.content}}</p>
  </div>
</template>

<script>
import axios from "axios";
export default {
    name:'SinglePost',
    data(){
        return{
            post: null,
        }
    },
    methods: {
        getData(){
            axios.get(`http://127.0.0.1:8000/api${this.$route.path}`)
            .then(res => {
                this.post = res.data;
            })
        }
    },
    created(){
        this.getData();
    }
}
</script>

<style>

</style>