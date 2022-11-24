<template>
    <div>
        <h1><span class="badge bg-primary">{{ title }}</span></h1>
        <div class="row">
            <div class="col col-lg-6">
                <div :class="['form']">
                    <div class="form-group">
                        <label><strong>Titulo</strong></label>
                        <input type="text" v-model="nota.titulo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label><strong>Texto</strong></label>
                        <textarea class="form-control" v-model="nota.text" rows="5"></textarea>
                    </div>
                    <button @click="add_note()" class="btn btn-outline-success">Agregar</button>
                </div>
            </div>
            <div class="col col-lg-3">
                <ul>
                    <note-card
                    @delete="delete_note(index)" 
                    v-for="(note, index) in notas" 
                    :key="note.titulo" :index="index" 
                    :title="note.titulo" 
                    :text="note.text" 
                    :date="note.fecha"
                    >
                        <template #slot-first="{ _name, last_name, likes }">
                            <p>{{ _name }} | {{ last_name }} | {{ likes }} likes</p>
                            <button class="btn btn-outline-danger">{{ note.titulo }}</button>
                        </template>
                    </note-card>
                </ul>
            </div>
        </div>
        
    </div>
</template>

<script>
    import NoteCard from './notes/NoteCard.vue';
    export default {
        name: "Notes",
        components: {
            NoteCard
        },
        data(){
            return{
                title: "Gestion De Notas",
                nota: {
                    titulo: "",
                    text: "",
                    fecha: ""
                },
                notas: [
                    {
                        titulo: "Ir al cine",
                        text: "Examinar las peliculas de estreno",
                        fecha: new Date(Date.now()).toLocaleString(),
                    }
                ]
            }
        },
        methods: {
            add_note(){
                let { titulo, text } = this.nota;
                let current_date = new Date(Date.now()).toLocaleString();
                this.notas.push({
                    titulo: titulo,
                    text: text,
                    fecha: current_date
                });
                this.nota.titulo = ""
                this.nota.text = ""
                this.nota.fecha = ""
            },
            delete_note(index){
                this.notas.splice(index, 1);
            }
        }
    }
</script>

<style scoped>

    textarea{
        width: 100%;
    }

    h1{
        text-align: center;
        padding: 20px 0 20px 0;
        font-size: 20px;
        font-weight: bold;
        
    }

    .form{
        border: solid 1px #0d6efd;
        margin: 20px;
        padding: 10px;
        text-align: left;
    }

    .form button{
        margin-top: 10px;
    }
</style>