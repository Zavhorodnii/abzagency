<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title col-md-12">Position list</h3>
            <div class="row">
                <div class="col-sm-6">
                <div class="col-sm-5">

                    <div class="align-center d-flex">
                        <label class="m-0">Show</label>
                        <select class="custom-select form-control-border border-width-2 ml-4 mr-4" id="exampleSelectBorderWidth2">
                            <option>Value 1</option>
                            <option>Value 2</option>
                            <option>Value 3</option>
                        </select>
                        <label class="m-0">entries</label>
                    </div>
                </div>
                </div>

                <div class="col-md-6 m-0 float-right">
                    <div id="example1_filter" class="float-right flex-fill align-center d-flex ">
                        <label class="m-0">Search:</label><input type="search" class="form-control ml-4 form-control-sm" placeholder="" aria-controls="example1">
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
                <tr>
                    <td>
                        Update software
                    </td>
                    <td>
                        24.01.19
                    </td>
                    <td class="table-control">
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-secondary">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        Update software
                    </td>
                    <td>
                        24.01.19
                    </td>
                    <td class="table-control">
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Update software
                    </td>
                    <td>
                        24.01.19
                    </td>
                    <td class="table-control">
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Update software
                    </td>
                    <td>
                        24.01.19
                    </td>
                    <td class="table-control">
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Update software
                    </td>
                    <td>
                        24.01.19
                    </td>
                    <td class="table-control">
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Update software
                    </td>
                    <td>
                        24.01.19
                    </td>
                    <td class="table-control">
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                        </a>
                    </td>
                </tr>

                </tbody>
            </table>
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
                            <li class="paginate_button page-item previous disabled" id="example2_previous">
                                <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                            </li>
                            <li class="paginate_button page-item active">
                                <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                            </li>
                            <li class="paginate_button page-item ">
                            <a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a>
                            </li>
                            <li class="paginate_button page-item next" id="example2_next">
                                <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Index"
}
</script>

<style scoped>
    .table-control{
        display: flex;
        justify-content: space-between;
    }
</style>
