@extends('admin/admin-layout')

@section('content')
<!DOCTYPE html>
<html lang="en">


    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="admin/dashboard"><i class="fas fa-user-alt ms-3"></i> Administrator</a
      >
      <button
        class="navbar-toggler position-absolute d-md-none collapsed"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu"
        aria-controls="sidebarMenu"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <input
        class="form-control form-control-dark w-100"
        type="text"
        placeholder="Search"
        aria-label="Search"
      />
      <div class="navbar-nav">
        <div class="nav-item text-nowrap">
          <form action="/logout" method="POST">
            @csrf
            <button class="btn nav-link px-3"
            ><i class="fas fa-arrow-right mx-1"></i> Sign out</button>
          </form>
        </div>
        </div>
    </header>

    <div class="container-fluid min-vh-100">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
                <div class="position-sticky pt-3 min-vh-100">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-white-50" aria-current="page" href="admin/dashboard">
                                <span data-feather="home"></span>
                                <i class="fas fa-tachometer-alt ms-3"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white-50" aria-current="page" href="/users">
                                <span data-feather="home"></span>
                                <i class="fas fa-users ms-3"></i> Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="/posts">
                                <span data-feather="home"></span>
                                <i class="fas fa-blog ms-3"></i> Posts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white-50" aria-current="page" href="/bookings">
                                <span data-feather="home"></span>
                                <i class="fas fa-book ms-3"></i> Bookings
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"><i class="fas fa-tachometer-alt"></i> All Posts</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                            Share
                            </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                            Export
                            </button>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button>
                    </div>
                </div>

                <div class="container-fluid row">

            <div class="col-lg-12">
              <div class="card mt-3 m-2 overflow-auto">
                <h6 class="card-header bg-dark text-white">List of All Posts</h6>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>User Id</th>
                            <th>Post Id</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Location</th>
                            <th>Created At</th>
                        </tr>
                        <?php $number = 1; ?>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $number++ }}</td>
                                <td>{{ $post->user_id }}</td>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->category }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->price }}</td>
                                <td>{{ $post->location }}</td>
                                <td>{{ $post->created_at }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
</html>
@endsection