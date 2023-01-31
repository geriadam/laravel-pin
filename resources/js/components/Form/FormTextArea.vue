<template>
  <div>
    <label :for="name" class="text-sm text-gray-500" :class="{ 'sr-only': !showLabel }" v-if="label">
      {{ label }}
    </label>
    <textarea :id="name" :required="required" @input="$emit('update:modelValue', $event.target.value)" :placeholder="placeholder"
      :autocomplete="autocomplete"
      class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      {{ modelValue }}
    </textarea>
  </div>
</template>

<script>
export default {
  name: "FormTextArea",
  inheritAttrs: false,
  props: {
    name: {
      type: String,
      required: true,
    },
    label: {
      type: String,
      default: "",
    },
    modelValue: {
      type: [String, Number],
    },
    showLabel: {
      type: Boolean,
      default: true,
    },
    required: {
      type: Boolean,
      default: false,
    },
    placeholder: {
      type: String,
      default: null,
    },
    autocomplete: {
      type: String,
      default: null,
    },
  },
  methods: {
    updateValue(event) {
      return this.$emit("input", event.target.value);
    },
  },
};
</script>