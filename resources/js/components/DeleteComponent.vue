<template>
    <a href="#" class="text-red-600 hover:text-red-900  mr-5" @click="deleteVacancy">Delete</a>
</template>

<script>
export default {
    props: ['vacancyId'],
    methods: {
        deleteVacancy(){
            this.$swal.fire({
                title: 'Are you sure to delete this vacancy?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    //request to delete vacancy
                    const params = {
                        id: this.vacancyId,
                        _method: 'delete'
                    }
                    axios.post(`/vacancies/${this.vacancyId}`, params)
                    .then(response => {
                        //message confirmed
                        this.$swal.fire(
                        'Deleted!',
                        'Your Vacancy has been deleted.',
                        'success'
                        )
                        this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode)
                    })
                    .catch(error => console.log(error))

                }
            })
        }
    }
}
</script>
