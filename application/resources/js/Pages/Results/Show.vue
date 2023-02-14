<template>
     <div>
        <div>
            Patient {{  patient.name }}
        </div>
        <div v-for="result in results" class="bg-white rounded-md p-4 my-8 mx-4">
            {{ result }}
        </div>
     </div>
</template>

<script>


export default {
    props: {
        patient: {
            type: Object,
            required: true,
        },
        results: {
            type: Array,
            required: false
        }
    }
}

</script>