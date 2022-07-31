<template>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <router-link :to="{name: 'dashboard_index'}" class="brand-link">
            <span class="brand-text font-weight-bold">Test task</span>
        </router-link>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="pages/widgets.html" class="nav-link">
                            <i class="nav-icon fas fa-solid fa-users"></i>
                            <p>
                                Employees
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'position_index'}" class="nav-link">
                            <i class="nav-icon fas fa-solid fa-book"></i>
                            <p>
                                Positions
                            </p>
                        </router-link>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</template>

<script>
    export default {
        name: 'LeftAside',
    }
</script>

<style lang="sass" scoped>

</style>
