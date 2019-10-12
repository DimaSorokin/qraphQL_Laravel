import Vue from 'vue';

Vue.prototype.$apiQueries = {
    dashboard: '{projects{id,title,description}}',
    singleProject: `query fetchSingleProjects($projectId: Int){ 
        projects(projectId: $projectId){
                    id,
                    title,
                    description
                    }
                }`
};
