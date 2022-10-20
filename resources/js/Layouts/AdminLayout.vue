<template>
    <div>
        <div class="wrapper">
            <!-- Navbar -->
            <navbar></navbar>

            <!-- Main Sidebar Container -->
            <sidebar></sidebar>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <slot />
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footers></footers>
        </div>
    </div>
</template>

<script setup>
import navbar from "@/Components/Admin/navbar.vue";
import sidebar from "@/Components/Admin/sidebar.vue";
import footers from "@/Components/Admin/footers.vue";
</script>
