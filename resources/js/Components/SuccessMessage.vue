<script setup>
defineProps(["success"]);
</script>

<template>
    <div v-show="success">
        <p class="text-sm text-red-600">
            {{ success }}
        </p>
    </div>
</template>
