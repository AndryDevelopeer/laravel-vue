<template>
    <div v-if="alternativeAmount > 0">
        {{ alternativeAmount }} {{ addCorrectEnding(alternativeAmount, alternative.name) }}
    </div>
</template>

<script lang="ts">
import {IAlternative} from "../../interfaces/IAlternative"
import postfix from "../../mixins/postfix"

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
    mixins: [postfix],
    computed: {
        alternativeAmount(): number {
            return Math.floor(this.total / this.alternative.price)
        }
    }
}
</script>

<style scoped>

</style>