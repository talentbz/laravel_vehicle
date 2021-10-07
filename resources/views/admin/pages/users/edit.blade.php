 <!-- add new modal content -->
 <div id="editModal" class="modal fade" tabindex="-1" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="editModalLabel">ユーザー作成</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="editForm" class="custom-validation" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    
                                    <!-- <div class="mb-3">
                                        <label class="form-label">ユーザー名</label>
                                        <div>
                                            <input parsley-type="user_name" name="name" type="text" class="form-control" required placeholder="ユーザー名" id="user_name"/>
                                        </div>
                                    </div> -->
                                    <div class="mb-3">
                                        <input type="hidden" name='id' id="user_id"/>
                                        <label class="form-label">Email</label>
                                        <div>
                                            <input parsley-type="email" type="email" name="email" class="form-control" required placeholder="Email" id="email"/>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">パスワード</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" name="password"
                                                class="form-control " name="password"
                                                id="userpassword" required placeholder="パスワード"
                                                aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light " type="button" id="password-addon"><i
                                                    class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>
                                    <!-- <div class="mb-3">
                                        <label class="form-label">会社名</label>
                                        <div>
                                            <input parsley-type="company_name" name="company_name" type="text" class="form-control" required placeholder="会社名" id="company_name"/>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">電話番号</label>
                                        <div>
                                            <input data-parsley-type="digits" type="text" name="phone" class="form-control" 
                                                placeholder="電話番号を入力してください" id="phone"/>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">ロケーション</label>
                                        <div>
                                            <input data-parsley-type="location" type="text" name="location" class="form-control" required
                                                placeholder="ロケーション" id="location"/>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="customFile">ユーザー画像</label>
                                        <input type="file" class="form-control" name="file" id="avatarImage" />  
                                    </div> -->
                                    <div class="modal-footer">
                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">閉じる</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light" id="creaete_user">
                                                保存
                                            </button>
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