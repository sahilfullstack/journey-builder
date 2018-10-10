<template>
    <div class="row">
        <div class="col-sm-12">
            <!-- <label for="text">Your answer</label> -->
            <input class="box-input" type="text" v-model="response">
            <p style="font-style:italic; color:green;" v-if="this.seen">Your response is submitted successfully</p>
            <button class="btn btn-primary btn-lg btn-block" @click="saveTerminalResponse">Submit</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            linker: {
                type: Object,
                required: true
            },
            node: {
                type: Object,
                required: true
            },  
            journeyId: {
                type: Number,
                required: true
            },          
            value: {
                required: true
            }
        },
        data() {
            return {
                response: this.value || '',
                seen: false
            }
        },
        methods: {
            saveTerminalResponse() {
                axios.post('/api/journeys/'+ this.journeyId +'/nodes/' + this.node.id +'/terminal',  {
                    response: this.response
                })
                    .then((response) => {
                        this.seen = true;
                        this.response = '';
                    })
                    .catch(function (error) {
                        console.log("error occured");
                        console.log(error);
                    });
            }
        }
    }
</script>

<style scoped>

</style>
