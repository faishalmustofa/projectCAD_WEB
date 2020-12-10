@extends('layouts.app')

@section('content')
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Profile</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- /.col -->
                    <div class="col">
                    <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('assets/dist/img/user4-128x128.jpg') }}"
                                alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                            <p class="text-muted text-center">Software Engineer</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    <div class="card">
                        <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#aboutme" data-toggle="tab">About Me</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit Profile</a></li>
                        </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="aboutme">
                            <!-- Post -->
                            <div>
                                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                                <p class="text-muted">
                                B.S. in Computer Science from the University of Tennessee at Knoxville
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                <p class="text-muted">Malibu, California</p>

                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                <p class="text-muted">
                                <span class="tag tag-danger">UI Design</span>
                                <span class="tag tag-success">Coding</span>
                                <span class="tag tag-info">Javascript</span>
                                <span class="tag tag-warning">PHP</span>
                                <span class="tag tag-primary">Node.js</span>
                                </p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim
                                neque.
                                </p>
                            </div>
                            <!-- /.post -->
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group col">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('assets/dist/img/user4-128x128.jpg') }}"
                                    alt="User profile picture">
                                    <div class="col-sm-10">
                                    <input type="file" class="form-file-input" id="contohupload1">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">Telepon</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                </div>
                                </div>
                                <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                                </div>
                                </div>
                            </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
@include('layouts.footer')
@endsection
