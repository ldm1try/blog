<template>
    <div>
        <div class="input-group">
            <input v-if="!error" type="text"
                   class="form-control"
                   placeholder="Поиск по заголовкам"
                   v-model="keywords"
                   autocomplete="off">
            <input v-else type="text"
                   class="form-control bg-danger text-white"
                   placeholder="Поиск по заголовкам"
                   v-model="keywords"
                   autocomplete="off">
            <!--<div class="input-group-append">
                <button class="btn btn-primary" type="button" @click="fetch()">Найти</button>
            </div>-->
        </div>


        <!--<div class="alert alert-danger mt-3" v-if="error">
            {{ error }}
        </div>-->

        <ul class="list-group mt-3" v-if="results.length > 0 && keywords">
            <li class="list-group-item" v-for="result in results">
                <a v-bind:href="'/blog/posts/' + result.id">
                    <div v-html="highlight(result.title)"></div>
                </a>
            </li>
        </ul>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                keywords: null,
                results: [],
                error: null
            };
        },

        watch: {
            keywords(after, before) {
                this.fetch();
            }
        },

        methods: {
            fetch() {
                axios.get('/api/blog/posts', { params: { keywords: this.keywords } })
                    .then(response => response.data.error ? this.error = response.data.error : this.results = response.data);
                this.results = [];
                this.error = null;
            },

            highlight(text) {
                return text.replace(new RegExp(this.keywords, 'gi'), '<span class="highlighted">$&</span>');
            },
        },
    };
</script>

<style>
    .highlighted {
        color: #38C172;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }

    .alert {
        margin-bottom: 0;
    }
</style>
