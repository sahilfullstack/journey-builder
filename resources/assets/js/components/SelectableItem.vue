<template>      
    <div style="margin-bottom: 5%;">
        <label class="checkbox-container">           
            {{this.text}}
            <a class="btn btn-back" @click="showDescription" v-if="this.description != null"><i class="fas fa-info fa-1x"></i></a>
            <input :checked="this.selected ? true : false" @change="toggle" type="checkbox">
            <span class="checkmark"></span>
            <label v-if="this.is_description_shown == true" class="description-style">*{{this.description}}</label>
        </label>
    </div>
</template>

<script>
    export default {
        props: {
            value: {
                required: true
            },
            description: {
                required: true
            }, 
            image: {
                required: true
            }, 
            text: {
                required: true
            },
            isSelected: {
                type: Boolean,
                required: true
            }
        },
        watch: {
            isSelected(isSelected) {
                this.selected = isSelected;
            }
        },
        data() {
            return {
                selected: this.isSelected,
                is_description_shown: false,
            }
        },
        methods: {
            toggle() {
                console.log(this.selected);
                if(this.selected) {
                    this.$emit('unselected', this.value);
                } else {
                    this.$emit('selected', this.value);
                }
            },
            showDescription() {  
                // preventing toggle method to call
                event.preventDefault();              
                if(this.is_description_shown == true) {
                    this.is_description_shown = false;
                } else {
                    this.is_description_shown = true;
                }               
            }
        }
    }
</script>

<style scoped>

</style>


