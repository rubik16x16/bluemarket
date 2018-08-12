<template lang="html">
  <div class="comentarios-table">
    <table class="table">
      <thead>
        <th>Comentario</th>
        <th>Producto</th>
        <th>Respuesta</th>
      </thead>
      <tbody>
        <tr v-for="(pregunta, index) in preguntas">
          <td>{{ pregunta.comentario }}</td>
          <td>{{ pregunta.producto.nombre }}</td>
          <td v-if="pregunta.respuesta== null">
            <button @click="respPregunta= index" type="button" class="btn btn-primary" data-toggle="modal" data-target="#responderModal">
              Launch demo modal
            </button>
          </td>
          <td v-else>{{ pregunta.respuesta }}</td>
        </tr>
      </tbody>
    </table>
    <responder-modal @guardar="responder" :pregunta="preguntas[respPregunta]"></responder-modal>
  </div>
</template>

<script>

import urlAbmMethods from '../../mixins/url-abm-methods';

export default {
  mixins: [urlAbmMethods],
  props: ['preguntas', 'routes'],
  data(){
    return {
      respPregunta: 0
    }
  },
  methods: {
    responder(respuesta){
      var index= this.respPregunta;
      var route= this.routes.update.replace('id', this.preguntas[index].id);
      this.update(route, respuesta);
    }
  }
}
</script>

<style lang="css">
</style>
