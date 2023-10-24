<template>
    <div>
        {{ roadLength }} Километров дорог
    </div>
</template>

<script lang="ts">
export default {
    name: "Road",
    props: {
        total: {
            type: Number,
            required: true
        }
    },
    data() {
        return {
            roadPrice: 17000000
        }
    },
    computed: {
        roadLength() {
            return Math.floor(this.total / this.roadPrice)
        }
    }
}
</script>

<style scoped>

</style>