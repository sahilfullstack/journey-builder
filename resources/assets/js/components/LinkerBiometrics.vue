<template>
    <div class="row">
        <div class="col-12">
            <label class="black-color">Height</label>
            <div class="row">
                <div class="col-sm-6">
                    <label>feet</label>
                    <input class="box-input" type="number" v-model="response.height.feet" @input="emit">
                </div>
                <div class="col-sm-6">
                    <label>inches</label>
                    <input class="box-input" type="number" v-model="response.height.inches" @input="emit">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="black-color">Weight <span class="grey-color">(in kgs)</span></label>
                    <input class="box-input" type="number" v-model="response.weight" @input="emit">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="black-color">Waist <span class="grey-color">(in inches)</span></label>
                    <input class="box-input" type="number" v-model="response.waist" @input="emit">
                </div>
            </div>
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
            value: {
                required: true
            }
        },
        data() {
            return {
                response: {
                    height: {
                        feet : (this.value && this.value.height.feet) || '',
                        inches : (this.value && this.value.height.inches) || ''
                    },
                    weight: (this.value && this.value.weight) || '',
                    waist: (this.value && this.value.waist) || '',
                }
            }
        },
        methods: {
            emit(event) {
                this.$emit('input', this.response);
                
                if((this.response.waist.length > 0) && 
                    (this.response.weight.length > 0) && 
                    (this.response.height.feet.length > 0) &&
                    (this.response.height.inches.length > 0)) {
                    this.$emit('can-next');
                }
                
                if((this.response.waist.length == 0) && 
                    (this.response.weight.length == 0) && 
                    (this.response.height.feet.length == 0) && 
                    (this.response.height.inches.length == 0)) {
                        this.$emit('cannot-next');
                    } 
            }
        }
    }
</script>

<style scoped>

</style>