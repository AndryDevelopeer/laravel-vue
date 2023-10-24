<template>
    <div class="wrapper">
        <Digits :total="total" />
    </div>
</template>

<script lang="ts">
import Digits from '@/components/Counter/Digits.vue'
export default {
    name: 'Counter',
    components: { Digits },
    props: {
        total: {
            type: Number,
            required: true
        }
    }
}
</script>

<style scoped>
    .wrapper {
        margin-bottom: 1rem;
    }
</style>
