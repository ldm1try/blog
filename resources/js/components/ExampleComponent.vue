<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <button class="btn btn-success"  v-on:click="show = !show">
                            Обновить
                        </button>
                        <table>
                            <tr v-for="blogpost in blogposts">
                                <transition name="fade">
                                    <td v-if="show">
                                        {{ blogpost.title }}
                                    </td>
                                </transition>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['blogposts'],

        /*mounted() {
            this.update();
        },*/

        data: function() {
            return {
                show: true,
                counter: 0
            }
        },

        methods: {
            update: function () {
                console.log(this.blogposts);
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
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active до версии 2.1.8 */ {
        opacity: 0;
    }
</style>