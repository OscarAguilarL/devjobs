<template>
  <button
    class="text-red-600 hover:text-red-900 mr-5"
    @click="eliminarVacante"
  >Eliminar</button>
</template>

<script>
  export default {
    props: {
      vacanteId: String,
    },
    methods: {
      eliminarVacante() {
        console.log('eliminando', this.vacanteId);

        this.$swal
          .fire({
            title: '¿Deseas eliminar esta vacante?',
            text: 'Esta acción no puede ser deshecha',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar',
          })
          .then((result) => {
            if (result.isConfirmed) {
              // envíar petición via axios

              this.$swal.fire({
                icon: 'success',
                title: 'Vacante eliminada',
              });
            }
          });
      },
    },
  };
</script>
