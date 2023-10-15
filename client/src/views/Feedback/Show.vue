<template>
  <div class="container-fluid mt-3">
    <div class="row">
      <div class="col-md-3 col-sm-12">
        <router-link to="/feedback" class="btn btn-sm btn-primary mb-3"
          >Back</router-link
        >
      </div>
      <div class="col-md-6 col-sm-12">
        <div class="card">
          <div class="card-body" v-if="item">
            <h2>{{ item.title ?? null }}</h2>
            <span>{{ item.category ?? null }}</span>
            <p v-html="item.description ?? null"></p>
            <section class="mt-5">
              <section class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button
                  type="button"
                  class="btn btn-sm btn-primary float-end"
                  @click="voteUp"
                >
                  Up Vote ({{ item.vote_up }})
                </button>
                <button
                  type="button"
                  class="btn btn-sm btn-primary float-end"
                  @click="voteDown"
                >
                  Up Down ({{ item.vote_down }})
                </button>
              </section>
              <section v-if="item.is_comment == 1">
                <small>Comments</small>
                <form @submit.prevent="submit">
                  <div class="form-group">
                    <ckeditor
                      :editor="editor"
                      v-model="comment"
                      :config="editorConfig"
                    ></ckeditor>
                  </div>
                  <div class="d-grid">
                    <button
                      type="submit"
                      class="btn btn-sm btn-primary mt-2 float-end"
                    >
                      Send
                    </button>
                  </div>
                </form>
              </section>
            </section>
            <section
              v-if="item.comment_feedback"
              style="max-height: 400px; overflow: auto"
            >
              <template v-for="item in item.comment_feedback">
                <div
                  style="background-color: #eee; font-size: 12px"
                  class="p-2 mt-2 rounded"
                >
                  <span class="fw-bold">{{ item.comments.user.name }}</span>
                  <span class="float-end" style="font-size: 11px">{{
                    item.comments.comment_at
                  }}</span>
                  <span v-html="item.comments.comment"></span>
                </div>
              </template>
            </section>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-12"></div>
    </div>
  </div>
</template>
<script>
import { useRoute } from "vue-router";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

export default {
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
      item: null,
      comment: "",
      routeId: null,
    };
  },
  created() {
    const route = useRoute();
    this.routeId = route.params.id;
  },
  mounted() {
    this.fetch();
  },
  methods: {
    async fetch() {
      const id = this.routeId;
      await this.$store
        .dispatch("feedback/fetchSingle", { id })
        .then((response) => {
          this.item = response.message;
        });
    },
    async submit() {
      const data = {
        user_id: localStorage.getItem("uid"),
        feedback_id: this.routeId,
        comment: this.comment,
      };
      await this.$store.dispatch("comment/store", { data }).then(() => {
        this.comment = "";
        this.fetch();
      });
    },
    async voteUp() {
      const data = {
        vote_up: this.item.vote_up + 1,
      };
      const id = this.routeId;
      await this.$store
        .dispatch("feedback/update", { data, id })
        .then((response) => {
          this.fetch();
        });
    },
    async voteDown() {
      const data = {
        vote_down: this.item.vote_up + 1,
      };
      const id = this.routeId;
      await this.$store.dispatch("feedback/update", { data, id }).then(() => {
        this.fetch();
      });
    },
  },
};
</script>
