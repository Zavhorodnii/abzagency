<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Positions</h1>
                </div><!-- /.col -->
                <div class="col-sm-2">
                    <router-link :to="{name: 'position_create'}" class="btn btn-block btn-primary btn-flat" >Add position</router-link>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <router-view></router-view>
</template>

<script>
export default {
    name: "Index"
}
</script>

<style scoped>

</style>
