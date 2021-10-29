<template>
<div>
    <ul class="flex flex-wrap justify-center">
        <li class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4 cursor-pointer" :class="verifyClass(skill)" v-for="(skill, i) in this.skills" v-bind:key="i" v-on:click="selected">{{skill}}</li>
    </ul>
    <input type="hidden" name="skills" id="skills">
</div>
</template>

<script>
    export default {
        props:['skills', 'oldskills'],
        created: function(){
            if(this.oldskills){
                const skillsArray = this.oldskills.split(',')
                skillsArray.forEach(skill => {
                    this.skillList.add(skill)
                });
            }
        },
        mounted: function(){
            document.querySelector('#skills').value = this.oldskills
        },
        data: function(){
            return{
                skillList: new Set()
            }
        },
        methods:{
            selected(e){
                if(e.target.classList.contains('bg-gray-700')){
                    e.target.classList.remove('bg-gray-700', 'text-white')
                    this.skillList.delete(e.target.textContent)
                }else{
                    e.target.classList.add('bg-gray-700', 'text-white')
                    this.skillList.add(e.target.textContent)
                }
                const skills = [...this.skillList]
                document.querySelector('#skills').value = skills
            },
            verifyClass(skill){
                return this.skillList.has(skill) ? 'bg-gray-700 text-white' : ''
            }
        },
    }
</script>
