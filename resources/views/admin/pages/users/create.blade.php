 <!-- add new modal content -->
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Default Modal Heading</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="myForm" class="custom-validation" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <div>
                                            <input parsley-type="email" type="email" name="email" class="form-control" required placeholder="Enter email" id="email"/>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" name="password"
                                                class="form-control " name="password"
                                                id="userpassword" required placeholder="Enter password"
                                                aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light " type="button" id="password-addon"><i
                                                    class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Company Name</label>
                                        <div>
                                            <input parsley-type="company_name" name="company_name" type="text" class="form-control" required placeholder="Company Name" id="company_name"/>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <div>
                                            <input data-parsley-type="digits" type="text" name="phone" class="form-control" 
                                                placeholder="Enter Phone Number" id="phone"/>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Location</label>
                                        <div>
                                            <input data-parsley-type="location" type="text" name="location" class="form-control" required
                                                placeholder="Enter Location" id="location"/>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="customFile">Avatar Image</label>
                                        <input type="file" class="form-control" name="avatar" id="avatarImage" />  
                                    </div>
                                    <div class="modal-footer">
                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light" id="creaete_user">
                                                Submit
                                            </button>
                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->