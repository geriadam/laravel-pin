<template>
  <div class="container mx-auto flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 lg:py-28">
    <div class="max-w-md w-full space-y-8 min-w-[40%]">
      <h1 class="text-3xl font-bold text-center">LOGIN</h1>
      <div class="flex items-center justify-center">
        <div class="inline-flex w-full gap-10" role="group">
          <button type="button" style="width: 50%;"
            class="rounded-l inline-block px-7 py-3 bg-blue-800 text-white font-medium text-sm leading-snug uppercase hover:bg-blue-600 focus:bg-blue-600 focus:outline-none focus:ring-0 active:bg-blue-600 transition duration-150 ease-in-out"
            @click="currentTab(1)">
            SIGN IN
          </button>
          <button type="button" style="width: 50%;"
            class="rounded-r inline-block px-7 py-3 bg-blue-800 text-white font-medium text-sm leading-snug uppercase hover:bg-blue-600 focus:bg-blue-600 focus:outline-none focus:ring-0 active:bg-blue-600 transition duration-150 ease-in-out"
            @click="currentTab(2)">
            SIGN UP
          </button>
        </div>
      </div>
      <div v-if="tab === 1" class="bg-white w-full rounded overflow-hidden shadow-xl p-5">
        <FormLogin :loading="loading" :setLoading="setLoading" :getLoading="getLoading" />
      </div>
      <div v-if="tab === 2" class="bg-white w-full rounded overflow-hidden shadow-xl p-5">
        <FormRegister :loading="loading" :setLoading="setLoading" :getLoading="getLoading" />
      </div>
    </div>
  </div>
</template>
<script>
import FormLogin from '@/components/FormLogin.vue';
import FormRegister from '@/components/FormRegister.vue';
export default {
  components: {
    FormLogin, FormRegister
  },
  data() {
    return {
      tab: 1,
      loading: false
    };
  },
  methods: {
    currentTab: function (tabNumber) {
      this.tab = tabNumber;
    },
    setLoading(value) {
      this.loading = value
    },
    getLoading() {
      return this.loading
    }
  },
};
</script>