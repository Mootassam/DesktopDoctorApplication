<template>
  <div>
    <nav-component></nav-component>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
};
</script>

<style>
.slither-enter-active,
.slither-leave-active {
  transition: opacity 2s ease;
}

.slither-enter,
.slither-leave-to {
  transform: translateX(-8%);
  transition: opacity 2s ease;
  opacity: 0;
}

.slither-enter-to,
.slither-leave {
  transform: translateX(0);
}
</style>
