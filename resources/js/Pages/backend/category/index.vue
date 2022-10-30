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
                            <div class="d-inline-flex float-right">
                                <Link
                                    :href="route('admin.category.create')"
                                    class="btn btn-sm btn-primary float-right"
                                >
                                    <i class="fa fa-plus"></i> Add New Category
                                </Link>
                            </div>
                            <table
                                id="example"
                                class="table table-bordered table-striped"
                            >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User ID</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
</script>

<script>
import axios from "axios";
export default {
    components: {
        AdminLayout,
    },
    props: {
        // user: Object,
    },

    data() {
        return {};
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
                        { data: "completed" },
                    ],
                });
            })
            .catch((error) => console.log(error));
    },
};
</script>
