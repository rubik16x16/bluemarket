export default {
  methods: {
    destroy(route){
      axios({
        method: 'DELETE',
        url: route,
      }).then(response => {
        console.log(response.data);
      }).catch(e => {
        console.log(e);
      });
    }
  }
};
