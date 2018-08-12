<template lang="html">
  <div class="img-add">
    <div class="custom-file"  v-for="n in inputs">
      <input type="file" class="custom-file-input" :name="'img-' + n" id="customFile">
      <label class="custom-file-label" for="customFile">Seleccionar archivo</label>
    </div>
    <button class="btn btn-success" type="button" @click="inputs+= 1">Agregar imagen</button>
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
