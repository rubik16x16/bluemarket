@extends('user.template')

@section('content')

<div id="preguntas"></div>

@endsection

@section('scripts')

<script>

Vue.component('pregunta-producto', {
  props: ['producto'],
  data: function(){
    return {
      imgUrl: "{{ asset('storage') }}"
    }
  },
  template: `
  @verbatim
  <div class="pregunta-producto">
    <img :src="imgRoute" :alt="producto.nombre" width="200" />
  </div>
  @endverbatim`,
  computed: {
    imgRoute: function(){
      return this.imgUrl + '/' + this.producto.imagenes[0].src;
    }
  }
});

const preguntas= new Vue({
  el: '#preguntas',
  data: {
    preguntas: @json($comentarios),
    url: "{{ route('user.comentarios.store_respuesta', ['id']) }}",
    comentario: []
  },
  template:`
  @verbatim
  <div>
    <div class="preguntas-lista" v-for="(pregunta, index) in preguntas">
      <pregunta-producto :producto="pregunta.producto"></pregunta-producto>
      <span>{{ pregunta.comentario }}</span>
      <span v-if="pregunta.respuesta != null">{{ pregunta.respuesta }}</span>
      <div class="respuesta" v-if="pregunta.responder == true">
        <textarea name="respuesta" placeholder="respuesta" v-model="comentario[index]"></textarea>
        <button type="button" @click="enviar(pregunta, index)">enviar</button>
      </div>
      <button type="button" v-if="pregunta.respuesta == null" @click="responder(index)">responder</button>
    </div>
  </div>
  @endverbatim`,
  methods: {
    responder: function(index){
      if(typeof this.preguntas[index].responder == 'undefined'){
        return Vue.set(preguntas.preguntas[index], 'responder', true);
      }
      return this.preguntas[index].responder = this.preguntas[index].responder ? false : true;
    },
    enviar: function(pregunta, index){

      axios({
        method: 'put',
        url: this.url.replace('id', pregunta.id),
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        data: {
          respuesta: this.comentario[index],
        }
      }).then(response => {
         console.log(response.data);
       }).catch(e => {
         console.log(e);
       });

      this.preguntas.splice(index, 1);
      this.comentario.splice(index, 1);

    }
  }
});


</script>

@endsection
