<template>
    <div class="card card-info col-sm-6">
        <div class="card-header">
            <h3 class="card-title">Add position</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal">
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Name">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <router-link :to="{name: 'position_index'}" class="btn btn-default">Cancel</router-link>
                <button type="submit" class="btn btn-info float-right">Save</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
</template>

<script>
export default {
    name: "PositionCreate",

    methods: {
        hideCreateButtonControl(){
            this.$store.dispatch('hidePositionAdd')
        },
        showCreateButtonControl(){
           this.$store.dispatch('showPositionAdd')
        },
    },
    mounted () {
        this.hideCreateButtonControl()
    },

    unmounted() {
        this.showCreateButtonControl()
    }

}
</script>

<style scoped>

</style>
