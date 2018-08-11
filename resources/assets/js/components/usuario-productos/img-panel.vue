<template lang="html">
  <div class="img-panel">
    <input v-for="n in inputs" type="file" :name="'img-' + n" value="">
    <button type="button" name="button" @click="inputs+= 1">Agregar imagen</button>
  </div>
</template>

<script>
export default {
  data(){
    return {
      inputs: 1
    }
  }
}
</script>

<style lang="css">
</style>
