<template>
    <div>
        {{burjAmount}} Небоскребов Бурдж Халифа
    </div>
</template>

<script lang="ts">
export default {
    name: "Burj",
    props: {
        total: {
            type: Number,
            required: true
        }
    },
    data() {
        return {
            durjPrice: 150000000000
        }
    },
    computed: {
        burjAmount() {
            return Math.floor(this.total / this.durjPrice)
        }
    }
}
</script>

<style scoped>

</style>