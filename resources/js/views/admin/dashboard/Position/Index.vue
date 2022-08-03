<template>

    <div class="card" v-if="loading">
        <spinner class="mb-10 mt-10"></spinner>
    </div>
    <div class="card m-0" v-if="error">
        <Error>Cannot load positions</Error>
    </div>
    <div class="card" v-if="!loading && !error">
        <div class="card-header">
            <h3 class="card-title col-md-12">Position list</h3>
            <div class="row">
                <div class="col-sm-6">
                    <div class="col-sm-5">

                        <div class="align-center d-flex">
                            <label class="m-0">Show</label>
                            <select v-model="paginate" class="custom-select form-control-border border-width-2 ml-4 mr-4" id="exampleSelectBorderWidth2">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                            </select>
                            <label class="m-0">entries</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 m-0 float-right">
                    <div id="example1_filter" class="float-right flex-fill align-center d-flex ">
                        <label class="m-0">Search:</label>
                        <input v-model.lazy="search" type="search" class="form-control ml-4 form-control-sm" placeholder="search" aria-controls="example1">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th >Name</th>
                    <th>Last update</th>
                    <th style="width: 100px">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="position in positions.data" :key="position.id">
                    <td>
                        {{ position.title }}
                    </td>
                    <td>
                        {{ position.updated_at }}
                    </td>
                    <td class="d-flex justify-space-between">
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-secondary">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>

        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                        Showing 1 to 10 of 57 entries
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                        <ul class="pagination pagination-sm m-0 float-right">

                            <pagination :data="positions" @pagination-change-page="getPositions">
                                <template #prev-nav>
                                    <span>&lt; Previous</span>
                                </template>
                                <template #next-nav>
                                    <span>Next &gt;</span>
                                </template>
                            </pagination>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-secondary" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete position</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>One fine body…</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-outline-light">Delete</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </div>
</template>

<script>

import axiosInstance from "../../../../../axios/axios-instance.js";
import Spinner from "../layout/Spinner.vue";
import Error from "../Info/Error.vue";

export default {
    name: "Index",
    components: {Error, Spinner},

    data(){
        return {
            positions: {},
            loading: true,
            error: false,
            paginate: 10,
            search: "",
        }
    },
    watch: {
        paginate: function ( value ){
            this.getPositions()
        },
        search: function ( value ){
            this.getPositions()
        }
    },
    methods: {
        showAlert(){
          toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
          }

          toastr["error"]("Error load positions")
        },
        getPositions(page = 1){
            axiosInstance.get('/api/v1/position?page=' + page
                + '&paginate=' + this.paginate
                + '&q=' + this.search
            )
                .then(response => {
                    this.positions = response.data;
                })
                .catch(error => {
                    console.log(error)
                    this.showAlert()
                    this.error = true
                })
                .finally(() => {
                    this.loading = false
                })
        }
    },
    mounted() {
        this.getPositions()
    }
}
</script>

<style scoped>

</style>
