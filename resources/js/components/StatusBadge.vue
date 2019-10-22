<template>
    <span class="badge" :class="classObj">
        {{getstatusText()}}
    </span>
</template>

<script>
    export default {
        props:['status'],
        data(){
            return {
                classObj:{
                    'badge-success': this.status == 'COMP',
                    'badge-secondary': this.status == 'open',
                    'badge-danger': this.status == 'HOLD'
                }
            }
        },
        methods: {
            getstatusText() {
                let status = this.status.toUpperCase();
                if (status == "COMP") {
                    return "Complete";
                } else if (status == "OPEN") {
                    return "Open";
                }
                return "HOLD";
            }
        }
    }
</script>

<style scoped>

</style>
