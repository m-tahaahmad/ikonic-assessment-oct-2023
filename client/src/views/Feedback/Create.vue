<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 col-sm-12">
        <router-link to="/feedback" class="btn btn-sm btn-primary mt-3"
          >Back</router-link
        >
      </div>
      <div class="col-md-4 col-sm-12">
        <div class="card mt-3">
          <div class="card-body">
            <form @submit.prevent="submit">
              <div class="form-group mb-2">
                <label>Title <span class="text-danger">*</span></label>
                <input
                  type="text"
                  class="form-control form-control-sm"
                  v-model="title"
                  required
                  autofocus
                />
              </div>
              <div class="form-group mb-2">
                <label>Category <span class="text-danger">*</span></label>
                <select
                  class="form-control form-control-sm"
                  v-model="category"
                  required
                >
                  <option value="">Select Category</option>
                  <option value="Bug report">Bug report</option>
                  <option value="Feature request">Feature request</option>
                  <option value="Improvement">Improvement</option>
                </select>
              </div>
              <div class="form-group mb-2">
                <label>Description</label>
                <ckeditor
                  :editor="editor"
                  v-model="description"
                  :config="editorConfig"
                ></ckeditor>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  v-model="is_comment"
                  value="1"
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  Allow comments
                </label>
              </div>
              <div class="d-grid col-6 mx-auto">
                <button type="submit" class="btn btn-sm btn-primary">
                  Save
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-12"></div>
    </div>
  </div>
</template>
<script>
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

export default {
  name: "app",
  data() {
    return {
      editor: ClassicEditor,
      editorConfig: {
        toolbar: [
          "bold",
          "italic",
          "bulletedList",
          "numberedList",
          "blockQuote",
        ],
      },
      title: "",
      category: "",
      description: "",
      is_comment: true,
    };
  },
  methods: {
    submit() {
      const data = {
        title: this.title,
        category: this.category,
        description: this.description,
        user_id: localStorage.getItem("uid"),
        is_comment: this.is_comment,
      };
      this.$store
        .dispatch("feedback/store", { data })
        .then((response) => {
          if (response.status == "success") {
            this.title = "";
            this.category = "";
            this.description = "";
          } else {
            console.log(response);
          }
        })
        .catch((e) => {
          console.log(e);
        });
    },
  },
};
</script>
