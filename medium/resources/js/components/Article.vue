<template>
    <div class=" full-height">
        <div class="content">

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-2 text-center">Id</div>
                    <div class="col-md-8 text-center">Title</div>
                    <div class="col-md-2 text-center"></div>
                </div>

                <div class="row " v-for="story in list.data">
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
                article: {
                    id: '',
                    title: ''
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
            },

            createTask() {
                axios.post('api/tasks', this.article)
                    .then((res) => {
                        this.article.title = '';
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
