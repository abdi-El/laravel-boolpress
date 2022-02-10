<template>
    <main>
      <!-- router VIEW not router vue !!! -->
        <router-link :to="{name:'about'}" class="badge badge-success">Go to About Page</router-link>
        <router-link :to="{name:'home'}" class="badge badge-success">Go to homepage</router-link>
      <router-view></router-view> 
    </main>
</template>

<script> 
export default {
  name: "App",
};
</script>

<style lang='scss'>
</style>