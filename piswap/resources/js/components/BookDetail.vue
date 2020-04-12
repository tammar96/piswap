<template>
     <transition name="modal">
        <div class="book-detail">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <b-row class="justify-content-center">
                        <b-col cols="4">
                            <b-card v-if="book != undefined">
                                <button type="button" class="close" v-on:click="$emit('close', '')" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <img src="/img/test.jpg" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">{{book.title}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{book.author}}</h6>
                                    <p class="card-text">{{book.description}}</p>
                                </div>
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <td>ISBN</td>
                                        <td>{{book.isbn}}</td>
                                    </tr>
                                    <tr>
                                        <td>Publisher</td>
                                        <td>{{book.publisher}}</td>
                                    </tr>
                                    <tr>
                                        <td>Date of Publishing</td>
                                        <td>{{book.date}}</td>
                                    </tr>
                                    <tr>
                                        <td>Bond</td>
                                        <td>{{book.bond}}</td>
                                    </tr>
                                    <tr>
                                        <td>Pages</td>
                                        <td>{{book.numberOfPages}}</td>
                                    </tr>
                                    <tr>
                                        <td>Department</td>
                                        <td>{{book.department}}</td>
                                    </tr>
                                    <tr>
                                        <td>Genre</td>
                                        <td>{{book.genre}}</td>
                                    </tr>
                                    <tr>
                                        <td>Rack</td>
                                        <td>{{book.rack}}</td>
                                    </tr>
                                    <tr>
                                        <td>Language</td>
                                        <td>{{book.language}}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>{{book.quantity == 0 ? "Not available" : "Available: " + book.quantity}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="card-body" v-if="reservation == undefined">
                                        <a v-on:click="reserveBook" href="#" class="btn btn-primary">Reserve this book</a>
                                </div>
                                <div class="card-body" v-if="reservation != undefined">
                                    <p>Your reservation number is {{reservation.id}}. </p>
                                    <a v-on:click="cancelReservation" href="#" class="btn btn-secondary">Cancel reservation</a>
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
                book: this.getBook(),
                reservation: undefined
            }
        },
        mounted() {
           this.getBook();
           this.getReservation();
        },
        methods: {   
            async getBook() {
                const response = await this.$http.get('/api/books/show/' + this.bookISBN);
                this.book = response.data.book;
            },
            async reserveBook(e){
                e.preventDefault();
                var response = await this.$http.post('/api/reservation/store',
                {
                    book_isbn: this.book.isbn
                });
                this.reservation = response.data.reservation;
            },
            async getReservation(){
                const response = await this.$http.get('/api/reservation/show/' + this.bookISBN);
                this.reservation = response.data.reservation;
                console.log(this.reservation);
            },
            async cancelReservation(e){
                e.preventDefault();
                const response = await this.$http.get('/api/reservation/cancel/' + this.reservation.id);
                this.getReservation();
            }
        }
    }
</script>
