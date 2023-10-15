<template>
  <div>
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-md-12">
          <router-link
            to="/feedback/create"
            class="btn btn-sm btn-primary float-end mb-2"
            >New Feedback</router-link
          >
        </div>
        <div class="col-md-12">
          <EasyDataTable
            :headers="headers"
            :items="items"
            show-index
            @click-row="openItem"
          />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import router from "@/router";

export default {
  data() {
    return {
      headers: [
        { text: "Title", value: "title", sortable: true },
        { text: "Category", value: "category" },
        { text: "Up Vote", value: "vote_up", sortable: true },
        { text: "Down Vote", value: "vote_down", sortable: true },
        { text: "User", value: "user_feedback.user.name", sortable: true },
      ],
      items: [],
    };
  },
  mounted() {
    this.fetch();
  },
  methods: {
    fetch() {
      this.$store
        .dispatch("feedback/fetch")
        .then((response) => {
          this.items = response.message;
        })
        .catch((e) => {
          console.log(e);
        });
    },
    openItem(item) {
      router.push(`/feedback/${item.id}`);
    },
  },
};
</script>
