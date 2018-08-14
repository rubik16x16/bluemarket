<template lang="html">
  <div class="frm-compra">
    <form>
      <span>nombre: {{ producto.nombre }}</span>
      <span>existencia: {{ producto.existencia }}</span>
      <input type="number" name="cantidad" v-model="cantidad">
      <button type="button" name="comprar" @click="comprar(producto)">Comprar</button>
    </form>
  </div>
</template>

<script>
export default {
  props: ['producto'],
  data(){
    return {
      cantidad: null
    }
  },
  methods:{
    comprar(producto){

      if(this.cantidad > producto.existencia){
        return alert('sin existencia');
      }
      return alert('comprados');
    }
  }
}
</script>

<style lang="css">
</style>
