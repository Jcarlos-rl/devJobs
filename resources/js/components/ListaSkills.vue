<template>
    <div>
        <ul class="flex flex-wrap justify-center">
            <li
                class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4"
                :class="verificarClaseActiva(skill)"
                v-for="(skill, i) in this.skills"
                v-bind:key="i"
                @click="activar($event)"
            >{{skill}}</li>
        </ul>
        <input type="hidden" name="skills" id="skills">
    </div>
</template>

<script>
    export default{
        props: ['skills', 'oldskills'],
        mounted(){
            document.getElementById('skills').value = this.oldskills;
        },
        created: function(){
            if(this.oldskills){
                const skilssArray = this.oldskills.split(',');
                skilssArray.forEach(skill => this.habilidades.add(skill));
            }
        },
        data: function(){
            return{
                habilidades: new Set()
            }
        },
        methods:{
            activar(e){
                if(e.target.classList.contains('bg-gray-800')){
                    e.target.classList.remove('bg-gray-800');
                    e.target.classList.remove('text-gray-100');
                    this.habilidades.delete(e.target.textContent);
                }else{
                    e.target.classList.add('bg-gray-800');
                    e.target.classList.add('text-gray-100');
                    this.habilidades.add(e.target.textContent);
                }

                const stringHabilidades = [...this.habilidades];
                document.getElementById('skills').value = stringHabilidades;
            },
            verificarClaseActiva(skill){
                return this.habilidades.has(skill) ? 'bg-gray-800 text-gray-100' : '';
            }
        }
    }
</script>
