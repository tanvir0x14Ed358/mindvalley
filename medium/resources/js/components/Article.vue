<template>
    <div class=" full-height">
        <div class="container">
            <h3 class="text-center" style="margin:20px 0 20px 0;">Article Listing</h3>
            <div class="col-md-6">
            <form  action="#" @submit.prevent="createTask()">
                <div class="form-group">
                <label for="tag_id">Tag:</label>
                <select v-model="article.tag_id" name="tag_id">
                    <option v-for="item in tags.data" v-bind:value="item.id">
                        {{ item.name }}
                    </option>
                </select>
                </div>


                <div class="form-group">
                    <label for="title">Title:</label>
                    <input v-model="article.title" type="text" name="title" required class="form-control" autofocus>
                </div>
                <div class="form-group">
                    <label for="details">Details:</label>
                    <textarea v-model="article.details" name="details" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Article</button>
            </form>
            </div>
<hr>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-2 text-center">Id</div>
                    <div class="col-md-8 text-center">Title</div>
                    <div class="col-md-2 text-center"></div>
                </div>

                <div class="row " v-for="story in list.data" style="margin-bottom: 10px;">
                    <div class="col-md-2 text-center">{{ story.id }}</div>
                    <div class="col-md-8 text-center">{{ story.title }}</div>
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
                tags:[],

                article: {
                    title: '',
                    details: '',
                    tag_id: '',
                    user_id: 1,
                }
            };
        },

        created() {
            this.fetchTaskList();
        },

        methods: {
            fetchTaskList() {
                axios.get('api/article').then((res) => {

                    this.list = res.data;
                });
                axios.get('api/tag').then((res) => {

                    this.tags = res.data;
                });

            },

            createTask() {
                axios.post('api/article', this.article)
                    .then((res) => {
                        this.article.title = '';
                        this.article.details = '';
                        this.edit = false;
                        this.fetchTaskList();
                    })
                    .catch((err) => console.error(err));
            },

            deleteTask(id) {
                axios.delete('api/article/' + id)
                    .then((res) => {
                        this.fetchTaskList()
                    })
                    .catch((err) => console.error(err));
            },
        }
    }
</script>
<style scoped>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
