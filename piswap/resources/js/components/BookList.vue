<template>
    <b-container class="book-list">
        <div class="filter">
            <div class="filter-content">
                <div class="filter-item input">
                    <b-form-input v-model="filterName" placeholder="Name/Author/Publisher..." v-on:input="filterBooks()"></b-form-input>
                </div>
                <div class="filter-item input">
                    <b-form-input v-model="filterYear" placeholder="Year" type="number" min="1900" max="2021" v-on:input="filterBooks()"></b-form-input>
                </div>
                <div class="filter-item checkbox">
                    <b-form-select v-model="filterAvailable" v-on:input="filterBooks()">
                         <b-form-select-option value="false">All books</b-form-select-option>
                         <b-form-select-option value="true">Only available</b-form-select-option>
                    </b-form-select>
                </div>
            </div>
        </div>
        <b-row class="centered-row">
            <b-card-group deck v-for="i in cardDecksCount" v-bind:key="i">
                    <b-card v-bind:key="book.isbn" v-for="book in booksInDeck(i)" no-body>
                            <div class="img-wrapper">
                                <span class="card-label-yellow">{{book.genre}}</span>
                                <span class="card-label-blue">{{book.numberOfPages}} pages</span>
                                <img class="card-img-top" src="/img/test.jpg"/>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">{{book.title}}</h6>
                                <span class="card-subtitle mb-2 text-muted">{{book.author}}</span>
                                <b-card-text>
                                    <small class="text-muted">
                                            {{book.quantity == 0 ? "Not available" : "Available: " + book.quantity}}
                                        </small>
                                </b-card-text>
                            </div>
                        <template v-slot:footer>       
                            <a v-on:click="openDetail($event, book.isbn)" href="#" class="card-link">Show detail</a>
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
        <bookdetail v-if="showDetail" v-bind:bookISBN="this.selectedISBN" @close="showDetail = false"></bookdetail>
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
                filterAvailable: 'false',
                filterString: "",
                showDetail: false,
                selectedISBN: ""
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
            openDetail: function(e, isbn){
                e.preventDefault();
                this.selectedISBN = isbn;
                this.showDetail = true; 
            },
            filterBooks: _.debounce(function (e) {
                var filterParts = [];

                if (this.filterName != ""){
                    filterParts.push("text=" + this.filterName);
                }
                if (this.filterYear != ""){
                    filterParts.push("year=" + this.filterYear);
                }
                if (this.filterAvailable != 'false'){
                   filterParts.push("available=true");
                }

                this.filterString = filterParts.length > 0 ? "?" + filterParts.join("&") : "";

                this.getBooks(0);
            }, 500),
            async getBooks(index) {
                const response = await this.$http.get('/api/books' + this.filterString);
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
