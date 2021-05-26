<template>
    <button class="text-red-600 hover:text-red-900  mr-5"
        @click="eliminarVacante"
    >Eliminar</button>
</template>

<script>
export default {
    props: ['id'],
    methods:{
        eliminarVacante(){
            this.$swal.fire({
                title: '¿Deseas eliminar esta vacante?',
                text: 'Una vez eliminada no se puede recuperar',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/vacantes/${this.id}`)
                        .then(resp =>{
                            console.log(resp)
                            this.$swal.fire(
                                '¡Vacante Eliminada!',
                                resp.data.mensaje,
                                'success'
                            )

                            this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                        })
                        .catch(err => console.log(err))
                }
            });
        }
    }
}
</script>
