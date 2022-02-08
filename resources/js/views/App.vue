<template>
  <div class="container">
    <h1>Posts:</h1>
    <div class="row">
        <div class="col-4" v-for="post in posts" :key="`post-${post.id}`">
            <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <span class="badge badge-primary">{{post.author}}</span>
                        <h5 class="card-title">{{post.post_title}}</h5>
                        <p class="card-text">{{post.content}}</p>
                    </div>
            </div>
        </div>
    </div> 
        <div class="my-3">
            <button @click="getPosts(getPrev(current))" class="btn btn-primary" :disabled='current == 1'>Prev</button>
            <span v-for="i in last" :key="`page-${i}`" class="badge p-3 mx-2" :class="current === i ? 'badge-success':'badge-primary'">{{i}}</span>
            <button @click="getPosts(getNext(current))" class="btn btn-primary" :disabled='current == last'>Next</button>
        </div>
  </div> 
</template>

<script> 
import axios from "axios";
export default {
  name: "App",
  components: {},
  data() {
    return {
        posts: null,
        current: 0,
        last:0,
    };
  },
  methods: {
    getPosts(page=1) {
      axios.get(`http://127.0.0.1:8000/api/post?page=${page}`).then((result) => {
          this.posts = result.data.data;
          this.current = result.data.current_page;
          this.last = result.data.last_page;
      })},
    getNext(number){
        if(number < this.last){
            this.current++;
            return(this.current);
        }
        return this.last;
    },
    getPrev(number){
        if(number > 1){
            this.current--;
            return(this.current);
        }
        return this.current;
    },
    seeNow(number){
        if(number == this.current){
            return true;
        }
        return false;
    }
  },
  created(){
      this.getPosts()
  },
};
</script>

<style lang='scss'>
</style>