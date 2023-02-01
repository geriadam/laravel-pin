<template>
  <form class="space-y-4" @submit.prevent="login">
    <div class="rounded-md shadow-sm -space-y-px">
      <FlashMessage :error="error" />
      <div class="flex flex-col gap-5">
        <div class="col-span-12">
          <FormInput type="email" label="Email" name="email" v-model="email" autocomplete="email" placeholder="your@email.com"
            class="mb-2" />
        </div>
        <div class="col-span-12">
          <FormInput type="password" label="Password" name="password" v-model="password" class="mb-4" />
        </div>
        <div class="col-span-12">
          <FormButton text="Sign In" />
        </div>
      </div>
    </div>
  </form>
</template>
<script>
import { mapGetters } from "vuex";
import { getError } from "@/utils/helpers";
import AuthService from "@/services/AuthService";
import FormInput from "@/components/Form/FormInput.vue";
import FormButton from "@/components/Form/FormButton.vue";
import FlashMessage from "@/components/FlashMessage.vue";
export default {
  name: 'FormLogin',
  components: {
    FormInput,
    FormButton,
    FlashMessage
  },
  data() {
    return {
      email: null,
      password: null,
      error: null,
    };
  },
  computed: {
    ...mapGetters("loader", ["isStateLoading"]),
  },
  methods: {
    async login() {
      this.error = null;
      const payload = {
        email: this.email,
        password: this.password,
      };
      try {
        this.$store.dispatch('loader/show');
        const auth = await AuthService.login(payload);
        if (auth) {
          localStorage.setItem('access_token', auth.data.data.access_token)
          const authUser = await this.$store.dispatch("auth/getAuthUser");
          if (authUser) {
            this.$store.dispatch("auth/setGuest", { value: "isNotGuest" });
            this.$router.push("/");
          } else {
            const error = Error(
              "Unable to fetch user after login, check your API settings."
            );
            error.name = "Fetch User";
            throw error;
          }
        }
      } catch (error) {
        this.error = getError(error);
      }
      this.$store.dispatch('loader/hide');
    },
  },
}
</script>