<template>
    <div class="clock-digit">
        <div class="wrapper">
            <div class="digit">
                {{ formattedDigits }}
            </div>
        </div>
    </div>
</template>

<script lang="ts">
export default {
    name: 'Digits',
    props: {
        total: {
            type: Number,
            required: true
        }
    },
    computed: {
        formattedDigits(): string {
            const options = { style: 'currency', currency: 'RUB', minimumFractionDigits: 0 }
            return new Intl.NumberFormat('ru-RU', options).format(this.total)
        }
    }
}
</script>

<style scoped>
.clock-digit {
    font-size: 36px;
}

.digit {
    transition: transform 0.2s ease-in-out;
}
</style>
