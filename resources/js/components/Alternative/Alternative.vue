<template>
    <div>
        {{ apartmentAmount }} {{alternative.name}}
    </div>
</template>

<script lang="ts">
export default {
    name: "Alternative",
    props: {
        total: {
            type: Number,
            required: true
        },
        alternative: {
            type: Object,
            required: true
        }
    },
    computed: {
        apartmentAmount() {
            return Math.floor(this.total / this.alternative.price)
        }
    }
}
</script>

<style scoped>

</style>