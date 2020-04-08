<template>
    <b-container class="bv-example-row" >
        <b-row>
            <b-col cols='3' v-bind:key="book.isbn" v-for="book in books">
                <div class="card">
                    <div class="card-header">{{book.title}}</div>

                    <div class="card-body">
                        {{book.description}}
                    </div>
                </div>
            </b-col>
        </b-row>
        <b-row>
            <nav>
                <ul class="pagination">
                    <li class="page-item"  v-for="index in pages" :key="index"><a class="page-link" v-on:click="getBooks(index)"> {{ index }}</a></li>
                </ul>
            </nav>
        </b-row>
    </b-container>
</template>

<script>
    export default {
        data: function() {
            return {
                books: [],
                page: 0,
                pages: 1,
                perPage: 20
            }
        },

       mounted() {
            console.log("test");
            this.getBooks(this.page);
        },
        methods: {
            async getBooks(index) {
                const response = await this.$http.get('/books');
                var result = response.data.books;
                this.pages = (result.length / this.perPage) - 1;
                this.page = index;
                this.books = result.slice(this.page * this.perPage, (this.page + 1) * this.perPage);
            }
        }
    }
</script>
