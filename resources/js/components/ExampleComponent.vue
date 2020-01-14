<template>
    <div  class="container">
    {{name}}
    <div  class="container">
    {{name}}
    </div>
    </div>

</template>

<script>
    export default {
        mounted() {
            console.log("mounted")
        },

        data(){
        return {
    name:"Kiprono"
         }
        }
    }
</script>
