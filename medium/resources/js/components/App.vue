<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <ul class="navbar-nav">
                    <router-link :to="{ name: 'article' }" class="nav-link">Article</router-link>
                    <router-link :to="{ name: 'admin' }" class="nav-link" >Admin</router-link>
                </ul>
            </div>
        </nav>
        <main>
            <router-view></router-view>
        </main>
    </div>


</template>
<script>
    import axios from 'axios'
    export default {}
</script>