<template>
  <span
    @click="cambiarEstado"
    :key="estadoVacanteData"
    :class="claseEstadoVacante()"
    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full cursor-pointer select-none"
  >{{ estadoVacante }}</span>
</template>

<script>
export default {
  // props: ['estado', 'vacanteId'],
  props: {
    estado: String,
    vacanteId: String
  },
  mounted () {
    this.estadoVacanteData = Number(this.estado)
  },
  data: function () {
    return {
      estadoVacanteData: null
    }
  },
  methods: {
    cambiarEstado () {
      if (this.estadoVacanteData === 1) {
        this.estadoVacanteData = 0
      } else {
        this.estadoVacanteData = 1
      }

      // Enviar petición con axios
      axios
        .post(`/vacantes/${this.vacanteId}`, {
          estado: this.estadoVacanteData
        })
        .then(resp => console.log(resp))
        .catch(err => console.log(err))
    },
    claseEstadoVacante () {
      return this.estadoVacanteData === 1
        ? 'bg-green-200 text-green-800'
        : 'bg-red-200 text-red-800'
    }
  },
  computed: {
    estadoVacante () {
      return this.estadoVacanteData === 1 ? 'Activa' : 'Inactiva'
    }
  }
}
</script>
