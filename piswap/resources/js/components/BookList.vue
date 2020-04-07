<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" v-for="book in books">
                    <div class="card-header">{{book.title}}</div>

                    <div class="card-body">
                        {{book.description}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                books: []
            }
        },

       mounted() {
            console.log("test");
            this.getBooks();
        },
        methods: {
            async getBooks() {
                const response = await this.$http.get('/books');
                this.books = response.data.books;
            }
        }
    }
</script>
