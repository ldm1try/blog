<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Заголовок</th>
                                    <th>Категория</th>
                                    <th>Создано</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="post in postlist">
                                    <td>{{ post.id }}</td>
                                    <td>{{ post.title }}</td>
                                    <td>{{ post.category_id }}</td>
                                    <td>{{ post.created_at }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <!--<div class="card-columns">
                            <div class="card" v-for="post in postlist">
                                <div class="card-header">
                                    {{ post.id }} - {{ post.title }}
                                </div>
                                <div class="card-body">
                                    {{ post.excerpt }}
                                </div>
                            </div>
                        </div>-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        /*props: [
            'postlist'
        ],*/

        data: function() {
            return {
                postlist: [],
            }
        },

        mounted() {
            this.update();
        },

        methods: {
            update: function () {
                axios.get('/blog/posts/tojson').then((response) => {
                    console.log(response);
                    this.postlist = response.data.data;
                });
            }
        }
    }
    /*Vue.component('button-counter', {
        props: ['title'],
        data: function () {
            return {
                count: 0
            }
        },
        template: '<button v-on:click="count++">Счётчик кликов — {{ count }} - {{ title }}</button>'
    })*/
</script>

<style>
    /*.card-columns {
        column-count: 3;
    }*/
</style>
