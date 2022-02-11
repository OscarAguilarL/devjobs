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
              axios
                .post(`/vacantes/${this.vacanteId}`, {
                  id: this.vacanteId,
                  _method: 'delete',
                })
                .then((resp) => {
                  this.$swal.fire({
                    icon: 'success',
                    title: 'Vacante eliminada',
                    text: resp.data.mensaje,
                  })

                  // eliminar la vacante del DOM
                  this.$el.parentNode.parentNode.parentNode.removeChild(
                    this.$el.parentNode.parentNode
                  )
                })
                .catch((err) => console.log(err))
            }
          })
      },
    },
  }
</script>
