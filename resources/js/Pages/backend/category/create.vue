<template>
    <Head title="Dashboard" />

    <AdminLayout>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id=""
                                                placeholder="Category Name"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Example label</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id=""
                                                placeholder="Example input"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AdminLayout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import axios from "axios";

export default {
    components: {
        AdminLayout,
    },
    props: {
        // user: Object,
    },

    data() {
        return {
            table_data: null,
        };
    },

    mounted() {
        axios
            .get("https://jsonplaceholder.typicode.com/todos")
            .then((resp) => {
                // this.table_data = resp.data;
                $("#example").DataTable({
                    data: resp.data,
                    columns: [
                        { data: "id" },
                        { data: "userId" },
                        { data: "title" },
                        { data: "title" },
                    ],
                });
            })
            .catch((error) => console.log(error));
    },
};
</script>
