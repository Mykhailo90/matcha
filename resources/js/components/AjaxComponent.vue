<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-default text mb-1" v-on:click="update" v-if="!is_refresh">Update - {{ id }}</button>
                <span class="badge badge-primary mb-1" v-if="is_refresh">Updating ...</span>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Position name</th>
                            <th>URL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="url in urldata">
                            <td>{{ url.title }}</td>
                            <td>{{ url.url }}</td> 
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function(){
            return {
                urldata: [],
                is_refresh: false,
                id: 0
            }
        },
        mounted() {
            this.update();
        },
        methods: {
            update: function() {
                this.is_refresh = true;
                axios.get('/start/get-json').then((responce) => {
                    this.urldata = responce.data;
                    this.is_refresh = false;
                    this.id++;
                });
            }
        }
    }
</script>
