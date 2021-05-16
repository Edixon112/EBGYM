
const app = new Vue({
  el: '#app',
  data: {
    titulo: 'Hola mundo con Vue',
    frutas: [
      {nombre:'Pera2', cantidad:10},
      {nombre:'Manzana', cantidad:0},
      {nombre:'Platano', cantidad:11}
    ],
    nuevaTarea: ''
  },
  methods:{
    agregarTarea: function(){
      console.log("hola",this.nuevaTarea);

    }
  }
})