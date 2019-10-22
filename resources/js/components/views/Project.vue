<template>
    <div class="container">
        <h3>{{project.title}}</h3>
        <p>{{project.description}}</p>
        <br/>
        <br/>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Title</th>
                <th>Assigned to</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="task in project.tasks" :key="task.id">
                <td>{{task.title}}</td>
                <td>{{task.user.name}}</td>
                <td>{{task.description}}</td>
                <td>{{task.statusCode}}</td>
                <td><status-badge :status="task.statusCode"/></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import StatusBadge from  '../StatusBadge';
    export default {
        components: {StatusBadge},
        data(){
            return {
                project: []
            }
        },
        created() {
            this.$query('singleProject', {
                     projectId: this.$route.params.id
            }).then(res => {
                this.project = res.data.data.projects[0];
            })
        }
    }
</script>

<style scoped>

</style>
