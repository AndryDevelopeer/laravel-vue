<template>
    <div>
        {{ apartmentAmount }} Квартир для сирот и малоимущих
    </div>
</template>

<script lang="ts">
export default {
    name: "Apartment",
    props: {
        total: {
            type: Number,
            required: true
        }
    },
    data() {
        return {
            apartmentPrice: 1500000
        }
    },
    computed: {
        apartmentAmount() {
            return Math.floor(this.total / this.apartmentPrice)
        }
    }
}
</script>

<style scoped>

</style>