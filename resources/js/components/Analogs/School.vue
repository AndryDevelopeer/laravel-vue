<template>
    <div>
        {{ schoolCount }} Школ
    </div>
</template>

<script lang="ts">
export default {
    name: 'School',
    props: {
        total: {
            type: Number,
            required: true
        }
    },
    data() {
        return {
            schoolPrice: 30000000
        }
    },
    computed: {
        schoolCount() {
           return Math.floor(this.total / this.schoolPrice)
        }
    }
}
</script>

<style scoped></style>
