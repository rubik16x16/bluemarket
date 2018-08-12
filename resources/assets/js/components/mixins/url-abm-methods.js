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
    },
    update(route, data){
      axios({
        method: 'PUT',
        url: route,
        data: data
      }).then(response => {
        console.log(response.data);
      }).catch(e => {
        console.log(e);
      });
    }
  }
};
