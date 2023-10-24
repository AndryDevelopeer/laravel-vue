<template>
    <div>
        {{ cityAmount }} Новых городов для переселения беженцев из Украины
    </div>
</template>

<script lang="ts">
export default {
    name: "City",
    props: {
        total: {
            type: Number,
            required: true
        }
    },
    data() {
        return {
            cityPrice: 2000000000000
        }
    },
    computed: {
        cityAmount() {
            return Math.floor(this.total / this.cityPrice)
        }
    }
}
</script>

<style scoped>

</style>