<template>
    <li>
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                {{ title }}
                <button @click="$emit('delete', index)" type="button" class="btn-close"><i title="Eliminar Nota" class="fa fa-times text-white" aria-hidden="true"></i></button>
            </div>
            <div class="card-body">
                <p class="card-text" v-text="text"></p>
                <span class="text-primary d-flex justify-content-end" v-text="date"></span>
            </div>
            <div :class="['d-flex justify-content-center']" id="slot_content_note">
                <slot name="slot-first" _name="Samael" last_name="Mora" likes="200">Contenido</slot>
            </div>

            <br>

            <slot name="slot-second">Valor defecto</slot>
        </div>
    </li>
</template>

<script>
    export default {
        name: "NoteCard",
        props: {
            title: {
                type: String,
                required: true
            },
            text: {
                type: String,
                required: true
            },
            date: {
                type: String,
                required: true
            },
            index: {
                type: Number,
                required: true
            }
        }
    }
</script>

<style scoped>
    .card-header{
        font-weight: bold;    
        text-transform: uppercase;
    }
    span{
        margin-top: 10px;
    }

    .card{
        margin-bottom: 5px;
    }

    #slot_content_note{
        margin-bottom: 10px;
    }
</style>