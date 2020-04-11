<template>
     <transition name="modal">
        <div class="book-detail">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <b-row class="justify-content-center">
                        <b-col cols="4">
                            <b-card>
                                <button type="button" class="close" v-on:click="$emit('close', '')" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <img src="/img/test.jpg" class="card-img-top" :alt="book.title">
                                <div class="card-body">
                                    <h5 class="card-title">{{book.title}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{book.author}}</h6>
                                    <p class="card-text">{{book.description}}</p>
                                </div>
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <td>ISBN</td>
                                        <td>Otto</td>
                                    </tr>
                                    <tr>
                                        <td>Publisher</td>
                                        <td>Thornton</td>
                                    </tr>
                                    <tr>
                                        <td>Date of Publishing</td>
                                        <td>the Bird</td>
                                    </tr>
                                    <tr>
                                        <td>Bond</td>
                                        <td>Thornton</td>
                                    </tr>
                                    <tr>
                                        <td>Pages</td>
                                        <td>Thornton</td>
                                    </tr>
                                    <tr>
                                        <td>Department</td>
                                        <td>Thornton</td>
                                    </tr>
                                    <tr>
                                        <td>Genre</td>
                                        <td>Thornton</td>
                                    </tr>
                                    <tr>
                                        <td>Rack</td>
                                        <td>Thornton</td>
                                    </tr>
                                    <tr>
                                        <td>Language</td>
                                        <td>Thornton</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>Available</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="card-body">
                                    <a href="#" class="btn btn-primary">Reserve</a>
                                </div>
                            </b-card>
                        </b-col>
                    </b-row>
                </div>
            </div>
        </div>
      </transition>
</template>

<script>
    export default {
        props: ['bookISBN'],
        data: function() {
            return {
                book: []
            }
        },
        mounted() {
           this.getBook();
        },
        methods: {   
            async getBook() {
                const response = await this.$http.get('/api/books/show/' + this.bookISBN);
                var result = response.data;
                this.book = result;
            }
        }
    }
</script>
