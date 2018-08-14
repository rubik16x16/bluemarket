export default{
  computed: {
    srcImgFocus: function(){
      return this.route + '/' + this.imgs[this.imgFocus].src;
    }
  },
  methods: {
    next: function(){
      if(this.imgFocus >= this.imgs.length -1){
        return this.imgFocus=0;
      }
      return this.imgFocus++;
    },
    prev: function(){
      if(this.imgFocus <= 0){
        return this.imgFocus= this.imgs.length -1;
      }
      return this.imgFocus--;
    }
  }
}
