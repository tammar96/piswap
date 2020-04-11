<template>
     <transition name="modal">
        <div class="book-detail">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <b-row class="justify-content-center">
                        <b-col cols="4">
                            <b-card v-for="item in result" v-bind:key="item.isbn">
                                <button type="button" class="close" v-on:click="$emit('close', '')" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <img src="/img/test.jpg" class="card-img-top" :alt="item.title">
                                <div class="card-body">
                                    <h5 class="card-title">{{item.title}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{item.author}}</h6>
                                    <p class="card-text">{{item.description}}</p>
                                </div>
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <td>ISBN</td>
                                        <td>{{item.isbn}}</td>
                                    </tr>
                                    <tr>
                                        <td>Publisher</td>
                                        <td>{{item.publisher}}</td>
                                    </tr>
                                    <tr>
                                        <td>Date of Publishing</td>
                                        <td>{{item.date}}</td>
                                    </tr>
                                    <tr>
                                        <td>Bond</td>
                                        <td>{{item.bond}}</td>
                                    </tr>
                                    <tr>
                                        <td>Pages</td>
                                        <td>{{item.numberOfPages}}</td>
                                    </tr>
                                    <tr>
                                        <td>Department</td>
                                        <td>{{item.department}}</td>
                                    </tr>
                                    <tr>
                                        <td>Genre</td>
                                        <td>{{item.genre}}</td>
                                    </tr>
                                    <tr>
                                        <td>Rack</td>
                                        <td>{{item.rack}}</td>
                                    </tr>
                                    <tr>
                                        <td>Language</td>
                                        <td>{{item.language}}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>{{item.quantity == 0 ? "Not available" : "Available: " + item.quantity}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="card-body">
                                        <a v-on:click="reserveBook" href="#" class="btn btn-primary">Reserve this book</a>
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
                result: []
            }
        },
        mounted() {
           this.getBook();
        },
        methods: {   
            async getBook() {
                const response = await this.$http.get('/api/books/show/' + this.bookISBN);
                this.result = response.data;
            },
            async reserveBook(){
                await this.$http.post('/api/reservation/store',
                {
                    book_id: this.result.book.isbn
                });
                this.getBook();
            },
            getReservation(){
                
                this.getBook();
            }
        }
    }
</script>
