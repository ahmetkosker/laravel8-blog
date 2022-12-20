@extends('admin.admin_main')

@section('title', 'Edit blog')

@section('main')

<style>
.panel.with-nav-tabs .panel-heading {
    padding: 5px 5px 0 5px;
}

.panel.with-nav-tabs .nav-tabs {
    border-bottom: none;
}

.panel.with-nav-tabs .nav-justified {
    margin-bottom: -1px;
}

/********************************************************************/
/*** PANEL DEFAULT ***/
.with-nav-tabs.panel-default .nav-tabs>li>a,
.with-nav-tabs.panel-default .nav-tabs>li>a:hover,
.with-nav-tabs.panel-default .nav-tabs>li>a:focus {
    color: #777;
}

.with-nav-tabs.panel-default .nav-tabs>.open>a,
.with-nav-tabs.panel-default .nav-tabs>.open>a:hover,
.with-nav-tabs.panel-default .nav-tabs>.open>a:focus,
.with-nav-tabs.panel-default .nav-tabs>li>a:hover,
.with-nav-tabs.panel-default .nav-tabs>li>a:focus {
    color: #777;
    background-color: #ddd;
    border-color: transparent;
}

.with-nav-tabs.panel-default .nav-tabs>li.active>a,
.with-nav-tabs.panel-default .nav-tabs>li.active>a:hover,
.with-nav-tabs.panel-default .nav-tabs>li.active>a:focus {
    color: #555;
    background-color: #fff;
    border-color: #ddd;
    border-bottom-color: transparent;
}

.with-nav-tabs.panel-default .nav-tabs>li.dropdown .dropdown-menu {
    background-color: #f5f5f5;
    border-color: #ddd;
}

.with-nav-tabs.panel-default .nav-tabs>li.dropdown .dropdown-menu>li>a {
    color: #777;
}

.with-nav-tabs.panel-default .nav-tabs>li.dropdown .dropdown-menu>li>a:hover,
.with-nav-tabs.panel-default .nav-tabs>li.dropdown .dropdown-menu>li>a:focus {
    background-color: #ddd;
}

.with-nav-tabs.panel-default .nav-tabs>li.dropdown .dropdown-menu>.active>a,
.with-nav-tabs.panel-default .nav-tabs>li.dropdown .dropdown-menu>.active>a:hover,
.with-nav-tabs.panel-default .nav-tabs>li.dropdown .dropdown-menu>.active>a:focus {
    color: #fff;
    background-color: #555;
}

/********************************************************************/
/*** PANEL PRIMARY ***/
.with-nav-tabs.panel-primary .nav-tabs>li>a,
.with-nav-tabs.panel-primary .nav-tabs>li>a:hover,
.with-nav-tabs.panel-primary .nav-tabs>li>a:focus {
    color: #fff;
}

.with-nav-tabs.panel-primary .nav-tabs>.open>a,
.with-nav-tabs.panel-primary .nav-tabs>.open>a:hover,
.with-nav-tabs.panel-primary .nav-tabs>.open>a:focus,
.with-nav-tabs.panel-primary .nav-tabs>li>a:hover,
.with-nav-tabs.panel-primary .nav-tabs>li>a:focus {
    color: #fff;
    background-color: #3071a9;
    border-color: transparent;
}

.with-nav-tabs.panel-primary .nav-tabs>li.active>a,
.with-nav-tabs.panel-primary .nav-tabs>li.active>a:hover,
.with-nav-tabs.panel-primary .nav-tabs>li.active>a:focus {
    color: #428bca;
    background-color: #fff;
    border-color: #428bca;
    border-bottom-color: transparent;
}

.with-nav-tabs.panel-primary .nav-tabs>li.dropdown .dropdown-menu {
    background-color: #428bca;
    border-color: #3071a9;
}

.with-nav-tabs.panel-primary .nav-tabs>li.dropdown .dropdown-menu>li>a {
    color: #fff;
}

.with-nav-tabs.panel-primary .nav-tabs>li.dropdown .dropdown-menu>li>a:hover,
.with-nav-tabs.panel-primary .nav-tabs>li.dropdown .dropdown-menu>li>a:focus {
    background-color: #3071a9;
}

.with-nav-tabs.panel-primary .nav-tabs>li.dropdown .dropdown-menu>.active>a,
.with-nav-tabs.panel-primary .nav-tabs>li.dropdown .dropdown-menu>.active>a:hover,
.with-nav-tabs.panel-primary .nav-tabs>li.dropdown .dropdown-menu>.active>a:focus {
    background-color: #4a9fe9;
}

/********************************************************************/
/*** PANEL SUCCESS ***/
.with-nav-tabs.panel-success .nav-tabs>li>a,
.with-nav-tabs.panel-success .nav-tabs>li>a:hover,
.with-nav-tabs.panel-success .nav-tabs>li>a:focus {
    color: #3c763d;
}

.with-nav-tabs.panel-success .nav-tabs>.open>a,
.with-nav-tabs.panel-success .nav-tabs>.open>a:hover,
.with-nav-tabs.panel-success .nav-tabs>.open>a:focus,
.with-nav-tabs.panel-success .nav-tabs>li>a:hover,
.with-nav-tabs.panel-success .nav-tabs>li>a:focus {
    color: #3c763d;
    background-color: #d6e9c6;
    border-color: transparent;
}

.with-nav-tabs.panel-success .nav-tabs>li.active>a,
.with-nav-tabs.panel-success .nav-tabs>li.active>a:hover,
.with-nav-tabs.panel-success .nav-tabs>li.active>a:focus {
    color: #3c763d;
    background-color: #fff;
    border-color: #d6e9c6;
    border-bottom-color: transparent;
}

.with-nav-tabs.panel-success .nav-tabs>li.dropdown .dropdown-menu {
    background-color: #dff0d8;
    border-color: #d6e9c6;
}

.with-nav-tabs.panel-success .nav-tabs>li.dropdown .dropdown-menu>li>a {
    color: #3c763d;
}

.with-nav-tabs.panel-success .nav-tabs>li.dropdown .dropdown-menu>li>a:hover,
.with-nav-tabs.panel-success .nav-tabs>li.dropdown .dropdown-menu>li>a:focus {
    background-color: #d6e9c6;
}

.with-nav-tabs.panel-success .nav-tabs>li.dropdown .dropdown-menu>.active>a,
.with-nav-tabs.panel-success .nav-tabs>li.dropdown .dropdown-menu>.active>a:hover,
.with-nav-tabs.panel-success .nav-tabs>li.dropdown .dropdown-menu>.active>a:focus {
    color: #fff;
    background-color: #3c763d;
}

/********************************************************************/
/*** PANEL INFO ***/
.with-nav-tabs.panel-info .nav-tabs>li>a,
.with-nav-tabs.panel-info .nav-tabs>li>a:hover,
.with-nav-tabs.panel-info .nav-tabs>li>a:focus {
    color: #31708f;
}

.with-nav-tabs.panel-info .nav-tabs>.open>a,
.with-nav-tabs.panel-info .nav-tabs>.open>a:hover,
.with-nav-tabs.panel-info .nav-tabs>.open>a:focus,
.with-nav-tabs.panel-info .nav-tabs>li>a:hover,
.with-nav-tabs.panel-info .nav-tabs>li>a:focus {
    color: #31708f;
    background-color: #bce8f1;
    border-color: transparent;
}

.with-nav-tabs.panel-info .nav-tabs>li.active>a,
.with-nav-tabs.panel-info .nav-tabs>li.active>a:hover,
.with-nav-tabs.panel-info .nav-tabs>li.active>a:focus {
    color: #31708f;
    background-color: #fff;
    border-color: #bce8f1;
    border-bottom-color: transparent;
}

.with-nav-tabs.panel-info .nav-tabs>li.dropdown .dropdown-menu {
    background-color: #d9edf7;
    border-color: #bce8f1;
}

.with-nav-tabs.panel-info .nav-tabs>li.dropdown .dropdown-menu>li>a {
    color: #31708f;
}

.with-nav-tabs.panel-info .nav-tabs>li.dropdown .dropdown-menu>li>a:hover,
.with-nav-tabs.panel-info .nav-tabs>li.dropdown .dropdown-menu>li>a:focus {
    background-color: #bce8f1;
}

.with-nav-tabs.panel-info .nav-tabs>li.dropdown .dropdown-menu>.active>a,
.with-nav-tabs.panel-info .nav-tabs>li.dropdown .dropdown-menu>.active>a:hover,
.with-nav-tabs.panel-info .nav-tabs>li.dropdown .dropdown-menu>.active>a:focus {
    color: #fff;
    background-color: #31708f;
}

/********************************************************************/
/*** PANEL WARNING ***/
.with-nav-tabs.panel-warning .nav-tabs>li>a,
.with-nav-tabs.panel-warning .nav-tabs>li>a:hover,
.with-nav-tabs.panel-warning .nav-tabs>li>a:focus {
    color: #8a6d3b;
}

.with-nav-tabs.panel-warning .nav-tabs>.open>a,
.with-nav-tabs.panel-warning .nav-tabs>.open>a:hover,
.with-nav-tabs.panel-warning .nav-tabs>.open>a:focus,
.with-nav-tabs.panel-warning .nav-tabs>li>a:hover,
.with-nav-tabs.panel-warning .nav-tabs>li>a:focus {
    color: #8a6d3b;
    background-color: #faebcc;
    border-color: transparent;
}

.with-nav-tabs.panel-warning .nav-tabs>li.active>a,
.with-nav-tabs.panel-warning .nav-tabs>li.active>a:hover,
.with-nav-tabs.panel-warning .nav-tabs>li.active>a:focus {
    color: #8a6d3b;
    background-color: #fff;
    border-color: #faebcc;
    border-bottom-color: transparent;
}

.with-nav-tabs.panel-warning .nav-tabs>li.dropdown .dropdown-menu {
    background-color: #fcf8e3;
    border-color: #faebcc;
}

.with-nav-tabs.panel-warning .nav-tabs>li.dropdown .dropdown-menu>li>a {
    color: #8a6d3b;
}

.with-nav-tabs.panel-warning .nav-tabs>li.dropdown .dropdown-menu>li>a:hover,
.with-nav-tabs.panel-warning .nav-tabs>li.dropdown .dropdown-menu>li>a:focus {
    background-color: #faebcc;
}

.with-nav-tabs.panel-warning .nav-tabs>li.dropdown .dropdown-menu>.active>a,
.with-nav-tabs.panel-warning .nav-tabs>li.dropdown .dropdown-menu>.active>a:hover,
.with-nav-tabs.panel-warning .nav-tabs>li.dropdown .dropdown-menu>.active>a:focus {
    color: #fff;
    background-color: #8a6d3b;
}

/********************************************************************/
/*** PANEL DANGER ***/
.with-nav-tabs.panel-danger .nav-tabs>li>a,
.with-nav-tabs.panel-danger .nav-tabs>li>a:hover,
.with-nav-tabs.panel-danger .nav-tabs>li>a:focus {
    color: #a94442;
}

.with-nav-tabs.panel-danger .nav-tabs>.open>a,
.with-nav-tabs.panel-danger .nav-tabs>.open>a:hover,
.with-nav-tabs.panel-danger .nav-tabs>.open>a:focus,
.with-nav-tabs.panel-danger .nav-tabs>li>a:hover,
.with-nav-tabs.panel-danger .nav-tabs>li>a:focus {
    color: #a94442;
    background-color: #ebccd1;
    border-color: transparent;
}

.with-nav-tabs.panel-danger .nav-tabs>li.active>a,
.with-nav-tabs.panel-danger .nav-tabs>li.active>a:hover,
.with-nav-tabs.panel-danger .nav-tabs>li.active>a:focus {
    color: #a94442;
    background-color: #fff;
    border-color: #ebccd1;
    border-bottom-color: transparent;
}

.with-nav-tabs.panel-danger .nav-tabs>li.dropdown .dropdown-menu {
    background-color: #f2dede;
    /* bg color */
    border-color: #ebccd1;
    /* border color */
}

.with-nav-tabs.panel-danger .nav-tabs>li.dropdown .dropdown-menu>li>a {
    color: #a94442;
    /* normal text color */
}

.with-nav-tabs.panel-danger .nav-tabs>li.dropdown .dropdown-menu>li>a:hover,
.with-nav-tabs.panel-danger .nav-tabs>li.dropdown .dropdown-menu>li>a:focus {
    background-color: #ebccd1;
    /* hover bg color */
}

.with-nav-tabs.panel-danger .nav-tabs>li.dropdown .dropdown-menu>.active>a,
.with-nav-tabs.panel-danger .nav-tabs>li.dropdown .dropdown-menu>.active>a:hover,
.with-nav-tabs.panel-danger .nav-tabs>li.dropdown .dropdown-menu>.active>a:focus {
    color: #fff;
    /* active text color */
    background-color: #a94442;
    /* active bg color */
}
</style>

<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-10">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="basicform">
                            <h3 class="section-title">Editing Settings</h3>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="{{ route('updating setting') }}" method='POST'>
                                            @method('PUT')
                                            @csrf
                                            @if(isset($setting))
                                            <div class="panel with-nav-tabs panel-primary">
                                                <div class="panel-heading">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active click" value="click"><a href="#tab1primary"
                                                                data-toggle="tab">General</a></li>
                                                        <li><a href="#tab2primary" data-toggle="tab">Smtp Email</a></li>
                                                        <li><a href="#tab3primary" data-toggle="tab">Social Media</a>
                                                        </li>
                                                        <li><a href="#tab4primary" data-toggle="tab">About Us</a></li>
                                                        <li><a href="#tab5primary" data-toggle="tab">Contact Page</a>
                                                        </li>
                                                        <li><a href="#tab6primary" data-toggle="tab">References</a></li>
                                                    </ul>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade in active" id="tab1primary">
                                                            <div class="form-group">
                                                                <label for="title" class="col-form-label">Title</label>
                                                                <input id="title" type="text" name="title"
                                                                    value="{{ $setting->title }}" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="keywords"
                                                                    class="col-form-label">Keywords</label>
                                                                <input id="keywords" type="text" name="keywords"
                                                                    value="{{ $setting->keywords }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="company"
                                                                    class="col-form-label">Company</label>
                                                                <input id="company" type="text" name="company"
                                                                    value="{{ $setting->company }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="address"
                                                                    class="col-form-label">Address</label>
                                                                <input id="address" type="text" name="address"
                                                                    value="{{ $setting->address }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="phone" class="col-form-label">Phone</label>
                                                                <input id="phone" type="number" name="phone"
                                                                    value="{{ $setting->phone }}" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="fax" class="col-form-label">Fax</label>
                                                                <input id="fax" type="number" name="fax"
                                                                    value="{{ $setting->fax }}" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email" class="col-form-label">Email</label>
                                                                <input id="keyemailwords" type="email" name="email"
                                                                    value="{{ $setting->email }}" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description">Description</label>
                                                                <textarea name="description"
                                                                    class='form-group summernote'>{{ $setting->description }}</textarea>
                                                                <script>
                                                                $(document).ready(function() {
                                                                    $('.summernote').summernote();
                                                                });
                                                                </script>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="input-select">Status</label>
                                                                <select name='status' class="form-control" id="status">
                                                                    <option value="true">True</option>
                                                                    <option value="false" selected>False</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <input id="submit" type="submit"
                                                                    class="form-control btn-facebook" value='Submit'>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tab2primary">
                                                            <div class="form-group">
                                                                <label for="smtpserver"
                                                                    class="col-form-label">Smtpserver</label>
                                                                <input id="smtpserver" type="text" name="smtpserver"
                                                                    value="{{ $setting->smtpserver }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="smtpemail"
                                                                    class="col-form-label">Smtpemail</label>
                                                                <input id="smtpemail" type="email" name="smtpemail"
                                                                    value="{{ $setting->smtpemail }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="smtppassword"
                                                                    class="col-form-label">Smtppassword</label>
                                                                <input id="smtppassword" type="password"
                                                                    name="smtppassword"
                                                                    value="{{ $setting->smtppassword }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="smtpport"
                                                                    class="col-form-label">Smtpport</label>
                                                                <input id="smtpport" type="number" name="smtpport"
                                                                    value="{{ $setting->smtpport }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <input id="submit" type="submit"
                                                                    class="form-control btn-facebook" value='Submit'>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tab3primary">
                                                            <div class="form-group">
                                                                <label for="facebook"
                                                                    class="col-form-label">Facebook</label>
                                                                <input id="facebook" type="text" name="facebook"
                                                                    value="{{ $setting->facebook }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="instagram"
                                                                    class="col-form-label">Instagram</label>
                                                                <input id="instagram" type="text" name="instagram"
                                                                    value="{{ $setting->instagram }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="twitter"
                                                                    class="col-form-label">Twitter</label>
                                                                <input id="twitter" type="text" name="twitter"
                                                                    value="{{ $setting->twitter }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="youtube"
                                                                    class="col-form-label">Youtube</label>
                                                                <input id="youtube" type="text" name="youtube"
                                                                    value="{{ $setting->youtube }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <input id="submit" type="submit"
                                                                    class="form-control btn-facebook" value='Submit'>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tab4primary">
                                                            <div class="form-group">
                                                                <label for="aboutus">About Us</label>
                                                                <textarea name="aboutus"
                                                                    class='form-group summernote'>{{ $setting->aboutus }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <input id="submit" type="submit"
                                                                    class="form-control btn-facebook" value='Submit'>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tab5primary">
                                                            <div class="form-group">
                                                                <label for="contact">Contact</label>
                                                                <textarea name="contact"
                                                                    class='form-group summernote'>{{ $setting->contact }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <input id="submit" type="submit"
                                                                    class="form-control btn-facebook" value='Submit'>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tab6primary">
                                                            <div class="form-group">
                                                                <label for="references">References</label>
                                                                <textarea name="references"
                                                                    class='form-group summernote'>{{ $setting->references }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <input id="submit" type="submit"
                                                                    class="form-control btn-facebook" value='Submit'>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>

<script src="/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="/assets/vendor/multi-select/js/jquery.multi-select.js"></script>
<script src="/assets/libs/js/main-js.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="/assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="/assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="/assets/vendor/datatables/js/data-table.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>

@endsection