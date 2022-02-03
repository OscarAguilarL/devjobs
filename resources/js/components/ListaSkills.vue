<template>
  <ul class="flex flex-wrap justify-center">
    <li
      class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4 cursor-pointer"
      v-for="(skill) in this.skills"
      :key="skill"
    >{{ skill }}</li>
  </ul>
</template>

<script>
export default {
  props: {
    skills: Array
  },
  mounted () {
    console.log(this.skills);
  }
}
</script>
