<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Menu sidebar toggle button -->
    <a class="nav-link text-decoration-none text-dark" data-widget="pushmenu" href="#" role="button"><i
            class="fas fa-bars"></i></a>

    <!-- Left navbar links -->
@include('admin::partials.navbar-shortcut')

<!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Full screen -->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <!-- Navbar Search -->
        @include('admin::partials.navbar-search')
        <!-- Messages Dropdown Menu -->
        @include('admin::partials.navbar-message')
        <!-- Notifications Dropdown Menu -->
        @include('admin::partials.navbar-notification')
        <!-- User Profile Dropdown menu -->
        @include('admin::partials.navbar-user')
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Logout" below if you are ready to end your current session.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {!! \Form::open(['route' => 'admin.logout']) !!}
                <button type="submit" class="btn btn-primary">Logout</button>
                {!! \Form::close() !!}
            </div>
        </div>
    </div>
</div>
