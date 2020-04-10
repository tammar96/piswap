<template>
    <b-container class="book-list">
        <b-row class="filter justify-content-center">
            <b-col cols="3">
                <b-form-input v-model="filterName" placeholder="Názvu/autor/vydavatel" v-on:input="filterBooks()"></b-form-input>
            </b-col>
            <b-col cols="3">
                 <b-form-input v-model="filterYear" placeholder="Rok vydání" type="number" min="1900" max="2021" v-on:input="filterBooks()"></b-form-input>
            </b-col>
            <b-col cols="3">
                 <b-form-checkbox
                    id="cbOnlyAvailable"
                    v-model="filterAvailable"
                    name="cbOnlyAvailable"
                    value="true"
                    unchecked-value="false"
                    v-on:input="filterBooks()">
                    Pouze dostupné
                    </b-form-checkbox>
            </b-col>
        </b-row>
        <b-row class="centered-row">
            <b-card-group deck v-for="i in cardDecksCount" v-bind:key="i">
                    <b-card v-bind:key="book.isbn" v-for="book in booksInDeck(i)" no-body img-src="/img/test.jpg" img-alt="Book image" img-top>
                            <h6 class="card-title">{{book.title}}</h6>
                            <span class="card-subtitle mb-2 text-muted">{{book.author}}</span>
                            <b-card-text>
                                  <small class="text-muted">
                                        {{book.quantity == 0 ? "Momentálně nedostupná" : "K zapůjčení: " + book.quantity}}
                                    </small>
                            </b-card-text>
                        <template v-slot:footer>       
                                <a v-bind:href="'/books/show/'+ book.isbn" target="blank" class="card-link">Půjčit si knihu</a>
                        </template>
                    </b-card>
            </b-card-group>
        </b-row>
        <b-row class="justify-content-center">
            <nav>
                <ul class="pagination">
                    <li class="page-item" v-bind:class="{ active: index == page + 1 }" v-for="index in pages" :key="index"><a class="page-link" v-on:click="getBooks(index - 1)"> {{ index }}</a></li>
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
                perPage: 16,
                perRow: 4,
                filterName: "",
                filterYear: "",
                filterAvailable: false,
                filterString: ""
            }
        },

        mounted() {
            this.getBooks(this.page);
        },
        computed:{
          cardDecksCount: function(){
              return Math.ceil(this.books.length / this.perRow);
          }  
        },
        methods: {
            filterBooks: _.debounce(function (e) {
                var filterParts = [];

                if (this.filterName != ""){
                    filterParts.push("text=" + this.filterName);
                }
                if (this.filterYear != ""){
                    filterParts.push("year=" + this.filterYear);
                }
                if (this.filterAvailable != false){
                   filterParts.push("available=true");
                }

                this.filterString = filterParts.length > 0 ? "?" + filterParts.join("&") : "";

                this.getBooks(0);
            }, 500),
            async getBooks(index) {
                const response = await this.$http.get('/books' + this.filterString);
                var result = response.data.books;
                this.pages = Math.ceil((result.length / this.perPage));
                this.page = index;
                this.books = result.slice(this.page * this.perPage, (this.page + 1) * this.perPage);
            },
            booksInDeck: function(deckIndex){
                return this.books.slice((deckIndex-1) * this.perRow, deckIndex * this.perRow);
            }
        }
    }
</script>
