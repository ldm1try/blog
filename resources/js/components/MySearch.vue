<template>
    <div>

        <div class="input-group mb-3">
            <input type="text"
                   class="form-control"
                   placeholder="Поиск по заголовкам"
                   v-model.lazy="keywords"
                   autocomplete="off">
            <div class="input-group-append">
                <button  class="btn btn-primary" type="submit">Найти</button>
            </div>
        </div>

        <transition name="fade">
            <div class="alert alert-danger" v-if="error">
                {{ error }}
            </div>
        </transition>

        <transition name="fade">
            <div v-if="results">
                <ul class="list-group mb-3">
                    <li class="list-group-item" v-for="result in results" :key="result.id">
                        <a v-bind:href="'/blog/posts/' + result.id">
                            <span v-html="highlight(result.title)"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                keywords: '',
                results: '',
                error: '',
                posts: ''
            };
        },

        watch: {
            keywords(after, before) {
                this.fetch();
            }
        },

        /*mounted() {
            this.showall()
        },*/

        methods: {
            fetch() {
                axios.get('/api/blog/posts', { params: { keywords: this.keywords } })
                    .then(response => response.data.error ? this.error = response.data.error : this.results = response.data);
                this.results = '';
                this.error = '';
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
</style>