<template>
  <div>
    <label :for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" :class="{ 'sr-only': !showLabel }" v-if="label">
      {{ label }}
    </label>
    <textarea :id="name" :required="required" @input="$emit('update:modelValue', $event.target.value)" :placeholder="placeholder"
      :autocomplete="autocomplete" :rows="rows"
      class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ modelValue }}</textarea>
  </div>
</template>

<script>
export default {
  name: "FormTextArea",
  emits: ['update:modelValue'],
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
    rows: {
      default: 3
    }
  },
  methods: {
    updateValue(event) {
      return this.$emit("input", event.target.value);
    },
  },
};
</script>