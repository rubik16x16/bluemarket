<template lang="html">
  <div class="comentarios">
    <span v-for="comentario in listaComentarios">{{ comentario.comentario }}</span>
    <textarea name="comentario" v-model="nuevoComentario.comentario"></textarea>
    <button type="button" @click="comentar">Comentar</button>
  </div>
</template>

<script>

import urlAbmMethods from '../../mixins/url-abm-methods';

export default {
  mixins: [urlAbmMethods],
  props: ['comentarios', 'routes'],
  data(){
    return {
      listaComentarios: null,
      nuevoComentario: {
        comentario: null
      }
    }
  },
  mounted(){
    this.listaComentarios= this.comentarios;
  },
  methods: {
    comentar(){
      var test;
      this.create(this.routes.create, this.nuevoComentario, comentario => {
        this.listaComentarios.push(comentario);
      });
      alert('comentado');
    }
  }
}
</script>

<style lang="css">
</style>
