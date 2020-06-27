<?php
include("header.php");
?>
 <div class="page-content container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center mb-4">
                                    <h4 class="card-title">All Users</h4>
                                    <div class="ml-auto">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-dark" data-toggle="modal"
                                                data-target="#createmodel">
                                                Create New User
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-bordered nowrap display">
                                        <thead>
                                            <tr>
                                                <th> </th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Role</th>
                                                <th>Uni</th>
                                                <th>Age</th>
                                                <th>Joining date</th>
                                                <th>Earning</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customControlValidation25" required>
                                                        <label class="custom-control-label"
                                                            for="customControlValidation25"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="#"><img
                                                            src="../user_img/log.jpeg" alt="user"
                                                            class="rounded-circle" width="30" /> Pinza Studio</a>
                                                </td>
                                                <td>pinzastudio2020@gmail.com</td>
                                                <td>+2348162399614</td>
                                                <td><span class="label label-inverse">Manager</span></td>
                                                <td><span class="label label-inverse">Uni Abuja</span></td>
                                                <td>36</td>
                                                <td>18-05-2020</td>
                                                <td>NGN 4200</td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn"
                                                        data-toggle="tooltip" data-original-title="Delete"><i
                                                            class="ti-close" aria-hidden="true"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="border-bottom p-3">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Sharemodel"
                                    style="width: 100%">
                                    <i class="ti-share mr-2"></i> Share With
                                </button>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-search"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search Users Here..."
                                            aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                            <button class="btn btn-info">Ok</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="list-group mt-4">
                                    <a href="javascript:void(0)" class="list-group-item active"><i
                                            class="ti-layers mr-2"></i> All Users</a>
                                    <a href="javascript:void(0)" class="list-group-item"><i class="ti-star mr-2"></i>
                                        Favourite Users</a>
                                    <a href="javascript:void(0)" class="list-group-item"><i
                                            class="ti-bookmark mr-2"></i> Recently Created</a>
                                </div>
                                <h4 class="card-title mt-4">Groups</h4>
                                <div class="list-group">
                                    <a href="javascript:void(0)" class="list-group-item"><i
                                            class="ti-flag-alt-2 mr-2"></i> Success Warriers
                                        <span class="badge badge-info float-right">20</span>
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item"><i class="ti-notepad mr-2"></i>
                                        Project
                                        <span class="badge badge-success float-right">12</span>
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item"><i class="ti-target mr-2"></i>
                                        Tech support
                                        <span class="badge badge-dark float-right">22</span>
                                    </a>
                                </div>
                                <h4 class="card-title mt-4">More</h4>
                                <div class="list-group">
                                    <a href="javascript:void(0)" class="list-group-item">
                                        <span class="badge badge-info mr-2"><i class="ti-import"></i></span> Import
                                        Users
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item">
                                        <span class="badge badge-warning text-white mr-2"><i
                                                class="ti-export"></i></span> Export Users
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item">
                                        <span class="badge badge-success mr-2"><i class="ti-share-alt"></i></span>
                                        Restore Users
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item">
                                        <span class="badge badge-primary mr-2"><i class="ti-layers-alt"></i></span>
                                        Duplicate Users
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item">
                                        <span class="badge badge-danger mr-2"><i class="ti-trash"></i></span> Delete All
                                        Users
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- djj -->
            <div class="modal fade" id="Sharemodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-auto-fix mr-2"></i>
                                    Share With</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-user text-white"></i></button>
                                    <input type="text" class="form-control" placeholder="Enter Name Here"
                                        aria-label="Username">
                                </div>
                                <div class="row">
                                    <div class="col-3 text-center">
                                        <a href="#Whatsapp" class="text-success">
                                            <i class="display-6 mdi mdi-whatsapp"></i><br><span
                                                class="text-muted">Whatsapp</span>
                                        </a>
                                    </div>
                                    <div class="col-3 text-center">
                                        <a href="#Facebook" class="text-info">
                                            <i class="display-6 mdi mdi-facebook"></i><br><span
                                                class="text-muted">Facebook</span>
                                        </a>
                                    </div>
                                    <div class="col-3 text-center">
                                        <a href="#Instagram" class="text-danger">
                                            <i class="display-6 mdi mdi-instagram"></i><br><span
                                                class="text-muted">Instagram</span>
                                        </a>
                                    </div>
                                    <div class="col-3 text-center">
                                        <a href="#Skype" class="text-cyan">
                                            <i class="display-6 mdi mdi-skype"></i><br><span
                                                class="text-muted">Skype</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>
                                    Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Create Modal -->
            <div class="modal fade" id="createmodel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt mr-2"></i> Create
                                    New User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-user text-white"></i></button>
                                    <input type="text" class="form-control" placeholder="Enter Name Here"
                                        aria-label="name">
                                </div>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-email text-white"></i></button>
                                    <input type="email" class="form-control" placeholder="Enter Email Here"
                                        aria-label="name">
                                </div>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-face-smile text-white"></i></button>
                                    <input type="date" class="form-control" placeholder="Age"
                                        aria-label="name">
                                </div>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-angle-up text-white"></i></button>
                                    <select class="form-control">
                                        <option value="1">Super Admin</option>
                                        <option value="2">Manager</option>
                                        <option value="3">Rep</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-home text-white"></i></button>
                                    <select class="form-control">
                                        <option value="1">Uni Abuja</option>
                                        <option value="2">Uni Osun</option>
                                        <option value="3">Uni Lagos</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-more text-white"></i></button>
                                    <input type="text" class="form-control" placeholder="Enter Mobile Number Here"
                                        aria-label="no">
                                </div>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-import text-white"></i></button>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<?php
include("footer.php");
?>