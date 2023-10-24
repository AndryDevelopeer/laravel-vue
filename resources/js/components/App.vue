<template>
    <section>
        <Counter :total="count" />
        <div class="example">
            <h3>Можно было построить:</h3>
            <School :total="count" />
            <Burj :total="count"/>
            <Road :total="count"/>
            <Apartment :total="count"/>
            <City :total="count"/>
        </div>
    </section>
</template>

<script lang="ts">
import Counter from '@/components/Counter/Counter.vue'
import School from '@/components/Analogs/School.vue'
import Burj from "@/components/Analogs/Burj.vue";
import Road from "@/components/Analogs/Road.vue";
import Apartment from "@/components/Analogs/Apartment.vue";
import City from "@/components/Analogs/City.vue";

export default {
    components: {City, Apartment, Road, Burj, Counter, School },
    data() {
        return {
            count: 16730056058310
        }
    },
    methods: {
        setCount() {
            setInterval(() => {
                this.count+=3540
            }, 10)
        }
    },
    mounted() {
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
