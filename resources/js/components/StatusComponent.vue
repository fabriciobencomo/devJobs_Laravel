<template>
    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full " :class="changeClass()" @click="changeStatus" :key="vacancyStatus">{{ vacancyStatusText }}</span>
</template>

<script>
export default({
    props: ['status', 'vacancyId'],
    mounted(){
        this.vacancyStatus = Number(this.status)
    },
    data: function(){
        return {
            vacancyStatus: null
        }
    },
    methods: {
        changeClass(){
            return this.vacancyStatus === 1 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-500'
        },
        changeStatus(){
            if(this.vacancyStatus === 1){
                this.vacancyStatus = 0;
            }else{
                this.vacancyStatus = 1;
            }
            const params = {
                Status: this.vacancyStatus
            }
            axios.post('/vacancies/' + this.vacancyId, params).catch(error => console.log(error))
        }
    },
    computed: {
        vacancyStatusText(){
            return this.vacancyStatus === 1 ? 'Active' : 'Inactive'
        }
    }
})
</script>
