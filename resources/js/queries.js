import Vue from 'vue';
import axios from 'axios';

let queries = {
    dashboard: '{projects{id,title,description}}',
    singleProject: `query fetchSingleProjects($projectId: Int){ 
        projects(projectId: $projectId){
                    id,
                    title,
                    description,
                    tasks {
                        id,
                        title,
                        description,
                        statusCode,
                        user {
                            name
                        }
                     }
                    }
                }`,
};


Vue.prototype.$query = function(queryName, queryVariables){
    let options = {
        url: '/graphql',
        method: 'POST',
        data: {
            query: queries[queryName]
        },
    };
    // console.log(queries['dashboard']);
    if(queryVariables){
        options.data.variables = queryVariables;
    }
    return axios(options);
};
// Vue.prototype.$apiQueries = {
//
// };
