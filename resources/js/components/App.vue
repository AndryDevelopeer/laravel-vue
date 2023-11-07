<template>
    <section>
        <Counter :total="count"/>
        <div class="example">
            <h3>Можно было построить:</h3>
            <Alternative
                v-for="item in alternatives"
                :total="count"
                :alternative="item"
            />
        </div>
    </section>
</template>

<script lang="ts">
import Counter from './Counter/Counter.vue'
import Alternative from "./Alternative/Alternative.vue"
import {IAlternative} from "../interfaces/IAlternative";

export default {
    components: {Alternative, Counter},
    props: {
        amount: {
            type: Number,
            required: true
        },
        alternatives: {
            type: Array as () => IAlternative[],
            required: true
        },
    },
    data() {
        return {
            count: 0
        }
    },
    methods: {
        setCount(): void {
            setInterval(() => {
                this.count += 3540
            }, 10)
        }
    },
    mounted(): void {
        this.count = this.amount
        this.setCount()
    }
}
</script>

<style scoped>
section {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
    margin-top: 20%;
}
.example {
    display: flex;
    flex-direction: column;
}
</style>
