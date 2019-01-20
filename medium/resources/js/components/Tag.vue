<template>
    <div class=" full-height">
        <div class="container">
            <h3 class="text-center" style="margin:20px 0 20px 0;">Tag Listing</h3>
            <div class="col-md-6">
                <form  action="#" @submit.prevent="createTask()">


                    <div class="form-group">
                        <label for="name">Title:</label>
                        <input v-model="tag.name" type="text" name="name" required class="form-control" autofocus>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Tag</button>
                </form>
            </div>
            <hr>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-2 text-center">Id</div>
                    <div class="col-md-8 text-center">Name</div>
                    <div class="col-md-2 text-center"></div>
                </div>

                <div class="row " v-for="story in list.data" style="margin-bottom: 10px;">
                    <div class="col-md-2 text-center">{{ story.id }}</div>
                    <div class="col-md-8 text-center">{{ story.name }}</div>
                    <div class="col-md-2 "><button @click="deleteTask(story.id)" class="btn btn-danger btn-xs pull-right">Delete</button></div>
                </div>


            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios'
    export default {
        data() {
            return {
                list: [],
                tag: {
                    name: '',
                }
            };
        },

        created() {
            this.fetchTaskList();
        },

        methods: {
            fetchTaskList() {
                axios.get('api/tag').then((res) => {
                    this.list = res.data;
                });

            },

            createTask() {
                axios.post('api/tag', this.tag)
                    .then((res) => {
                        this.tag.name = '';
                        this.edit = false;
                        this.fetchTaskList();
                    })
                    .catch((err) => console.error(err));
            },

            deleteTask(id) {
                axios.delete('api/tag/' + id)
                    .then((res) => {
                        this.fetchTaskList()
                    })
                    .catch((err) => console.error(err));
            },
        }
    }
</script>
