<template>
    <div>
        {{ apartmentAmount }} {{ alternative.name }}
    </div>
</template>

<script lang="ts">
import {IAlternative} from "../../interfaces/IAlternative"

export default {
    name: "Alternative",
    props: {
        total: {
            type: Number,
            required: true
        },
        alternative: {
            type: Object as () => IAlternative,
            required: true
        }
    },
    computed: {
        apartmentAmount(): number {
            return Math.floor(this.total / this.alternative.price)
        }
    }
}
</script>

<style scoped>

</style>