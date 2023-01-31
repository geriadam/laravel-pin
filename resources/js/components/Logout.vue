<template>
  <button type="button" @click="logout" class="inline-flex items-center space-x-2 px-4 py-2 text-white bg-red-500 rounded-md">
    <span class="hidden sm:inline">Logout</span>
    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
      <path fill="#fff"
        d="M32 52.72a20.43 20.43 0 0 1-14.13-35.17 1 1 0 0 1 1.42 0 1 1 0 0 1 0 1.41 18.42 18.42 0 1 0 25.48 0 1 1 0 0 1 0-1.41 1 1 0 0 1 1.42 0A20.43 20.43 0 0 1 32 52.72Z" />
      <path fill="#fff" d="M32 34a1 1 0 0 1-1-1V12.28a1 1 0 0 1 2 0V33a1 1 0 0 1-1 1Z" />
    </svg>
  </button>
</template>

<script>
export default {
  name: "Logout",
  methods: {
    logout() {
      this.$store.dispatch("auth/logout");
    },
  },
};
</script>