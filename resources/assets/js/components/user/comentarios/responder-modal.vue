<template lang="html">
  <div class="modal fade" id="responderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>

            <h2>Pregunta: {{ pregunta.comentario }}</h2>

            <div class="form-group">
              <label for="respuesta" class="col-form-label">Respuesta:</label>
              <textarea name="respuesta" class="form-control" id="respuesta" v-model="respuesta"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" @click="guardar" class="btn btn-primary" data-dismiss="modal">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props:['route', 'pregunta'],
  data(){
    return{
      respuesta: null
    }
  },
  methods: {
    guardar(){
      this.$emit('guardar', {respuesta: this.respuesta});
    }
  }
}
</script>

<style lang="css">
</style>
