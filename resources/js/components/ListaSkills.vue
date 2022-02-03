<template>
  <div>
    <ul class="flex flex-wrap justify-center">
      <li
        class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4 cursor-pointer"
        v-for="(skill) in this.skills"
        :key="skill"
        @click="handleClick"
      >{{ skill }}</li>
    </ul>
    <input type="hidden" name="skills" id="skills" ref="inputSkills" />
  </div>
</template>

<script>
export default {
  props: {
    skills: Array
  },
  data: () => ({
    habilidades: new Set()
  }),
  mounted () {
    console.log(this.skills);
  },
  methods: {
    handleClick (e) {
      if (e.target.classList.contains('bg-teal-500')) {
        e.target.classList.remove('bg-teal-500')
        this.habilidades.delete(e.target.textContent)
      } else {
        e.target.classList.add('bg-teal-500')
        this.habilidades.add(e.target.textContent)
      }

      // agregar las habilidades al input hidden
      const stringHabilidades = [...this.habilidades]
      this.$refs.inputSkills.value = stringHabilidades
    }
  }
}
</script>
