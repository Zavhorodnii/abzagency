<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Positions</h1>
                </div><!-- /.col -->
<!--                <div v-if="gettt()" class="col-sm-2">-->
                <div v-if="addControl" class="col-sm-2">
                    <router-link :to="{name: 'position_create'}" class="btn btn-block btn-primary btn-flat" >Add position</router-link>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <router-view></router-view>
</template>

<script>
import {mapGetters, mapState} from "vuex";

export default {
    name: "Index",
    computed: {
        ...mapGetters({
            addControl: 'getPositionAdd',
        }),
    },
}
</script>

<style scoped>

</style>
