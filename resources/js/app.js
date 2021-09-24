require("./bootstrap");

window.Vue = require("vue").default;

const files = require.context("./", true, /\.vue$/i);
files.keys().map(key =>
    Vue.component(
        key
            .split("/")
            .pop()
            .split(".")[0],
        files(key).default
    )
);
//Vue.component("edit-book", )
const app = new Vue({
    el: "#app",
    data: () => {
        return {
            success: "",
            error: "",
            errorArr: [],
            loading: false
        };
    },
    methods: {
        deleteBook(id) {
            if (confirm("Are you sure you want to delete this book?")) {
                this.loading = true;
                axios
                    .delete(`/api/v1/books/${id}`)
                    .then(res => {
                        this.loading = false;
                        this.success = res.data.message;
                        setTimeout(function() {
                            window.location.href = "/";
                        }, 3000);
                    })
                    .catch(err => {
                        this.loading = false;
                        this.error = err.data.message;
                        this.errorArr = err.data.data;
                    });
            }
        }
    }
});
