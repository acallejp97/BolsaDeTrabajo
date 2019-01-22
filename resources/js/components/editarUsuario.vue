<script>
export default {
  data() {
    return {
      id: "",
      nombre: "",
      apellidos: "",
      email: "",
      imagen: "",
      password1: "",
      password2: "",
      update: 0,
      arrayTasks: []
    };
  },
  methods: {
    updateTasks() {
      let me = this;
      axios
        .put("/actualizar", {
          id: this.update,
          nombre: this.name,
          apellidos: this.description,
          email: this.email,
          imagen: this.imagen,
          password: this.password1
        })
        .then(function(response) {
          me.getTasks(); //llamamos al metodo getTask(); para que refresque nuestro array y muestro los nuevos datos
          me.clearFields(); //Limpiamos los campos e inicializamos la variable update a 0
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    clearFields() {
      /*Limpia los campos e inicializa la variable update a 0*/
      this.nombre = "";
      this.apellidos = "";
      this.email = "";
      this.imagen = "";
      this.password1 = "";
      this.password2 = "";
      this.update = 0;
    }
  },
  mounted() {
    this.getTasks();
  }
};
</script>