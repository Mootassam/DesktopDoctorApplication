
<template>
<div>
<nav-component></nav-component>
<transition name="slither" mode="out-in" >  
      <router-view></router-view>
      </transition>

      </div>
</template>

<script>
export default {

}
</script>

<style>

</style>