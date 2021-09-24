<template>
  <div>
    <div class="items-center justify-between mb-6 lg:flex">
      <p class="mb-2 text-2xl font-semibold lg:mb-0">Edit {{ book.name }}</p>
    </div>
    <div class="mb-6">
      <div class="flex items-center justify-center py-4">
        <div class="w-full lg:max-w-3xl">
          <ul v-if="errorArr.length != []">
            <li v-for="(err, index) in errorArray" :key="index">
              {{ err[0] }}
            </li>
          </ul>
          <form action="#" method="POST" @submit.prevent="editBook(book.id)">
            <div class="grid gap-4 lg:grid-cols-2 grid-col-1">
              <div>
                <label
                  for="name"
                  class="block text-sm font-medium text-gray-700"
                  >Book Name</label
                >
                <input
                  id="name"
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text"
                  name="name"
                  v-model="book.name"
                  required
                  autofocus
                />
              </div>
              <div class="">
                <label
                  for="isbn"
                  class="block text-sm font-medium text-gray-700"
                  >ISBN</label
                >
                <input
                  id="isbn"
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text"
                  name="name"
                  v-model="book.isbn"
                  required
                />
              </div>
              <div class="">
                <label
                  for="publisher"
                  class="block text-sm font-medium text-gray-700"
                  >Publisher</label
                >
                <input
                  id="publisher"
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text"
                  name="name"
                  v-model="book.publisher"
                  required
                />
              </div>
              <div class="">
                <label
                  for="authors"
                  class="block text-sm font-medium text-gray-700"
                  >Authors (separate with commas [,])</label
                >
                <input
                  id="authors"
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text"
                  name="authors"
                  v-model="book.authors"
                  required
                />
              </div>
              <div class="">
                <label
                  for="number_of_pages"
                  class="block text-sm font-medium text-gray-700"
                  >Number of Pages</label
                >
                <input
                  id="number_of_pages"
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="number"
                  name="number_of_pages"
                  v-model="book.number_of_pages"
                  required
                />
              </div>
              <div class="">
                <label
                  for="country"
                  class="block text-sm font-medium text-gray-700"
                  >Country</label
                >
                <input
                  id="country"
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text"
                  name="country"
                  v-model="book.country"
                  required
                />
              </div>
              <div class="">
                <label
                  for="release_date"
                  class="block text-sm font-medium text-gray-700"
                  >Publisher</label
                >
                <input
                  id="release_date"
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="date"
                  name="release_date"
                  v-model="book.release_date"
                  required
                />
              </div>
            </div>
            <div class="mt-4">
              <button
                type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md  hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25"
                :disabled="loading"
              >
                Edit Book
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  props: ["bookprop"],
  data() {
    return {
      book: this.bookprop,
      success: "",
      error: "",
      errorArr: [],
      loading: false,
    };
  },
  mounted() {
    this.book.authors = this.book.authors.join(",");
  },
  methods: {
    editBook(id) {
      this.loading = true;
      this.book.authors = this.book.authors.split(",");
      axios
        .patch(`/api/v1/books/${id}`, this.book)
        .then((res) => {
          this.loading = false;
          this.$root.success = res.data.message;
          setTimeout(function () {
            window.location.href = "/";
          }, 3000);
        })
        .catch((err) => {
          this.loading = false;
          if (err.data.message != undefined) {
            this.$root.error = err.data.message;
            this.$root.errorArr = err.data.data;
          } else {
            this.$root.error = "Error updating book!";
          }
        });
    },
  },
};
</script>

<style>
</style>
