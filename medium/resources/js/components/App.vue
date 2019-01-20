<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <ul class="navbar-nav">
                    <router-link :to="{ name: 'article' }" class="nav-link">Article</router-link>
                    <router-link :to="{ name: 'tag' }" class="nav-link" >Tag</router-link>


                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item " >
                        <a class="nav-link" href="/home">Home</a>
                    </li>
                </ul>
            </div>
        </nav>
        <main>
            <h2 class="text-center " style="margin-top:20px;">Admin Page</h2>
            <router-view></router-view>

        </main>
    </div>


</template>
<script>
    import axios from 'axios'
    export default {}
</script>