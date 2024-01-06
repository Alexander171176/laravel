<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    }
})
</script>

<template>
    <button
        :type="type"
        class="px-4 py-2 bg-yellow-400 text-white border rounded-md font-semibold text-xs hover:bg-yellow-500 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150"
    >
        <slot />
    </button>
</template>
