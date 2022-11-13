<script>
export default {
  data() {
    return {
      greeting: 'Hello World!'
    }
  }
}
</script>

<template>
  <p class="greeting">{{ greeting }}</p>
  <h1>Hola mundo</h1>
</template>

<style>
.greeting {
  color: red;
  font-weight: bold;
}
</style>