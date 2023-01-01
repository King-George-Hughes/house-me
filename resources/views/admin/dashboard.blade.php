@extends('admin/admin-layout')

@section('content')
<!DOCTYPE html>
<html lang="en">


    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="dashboard"><i class="fas fa-user-alt ms-3"></i> Administrator</a
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
                            <a class="nav-link active text-white" aria-current="page" href="dashboard">
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
                            <a class="nav-link active text-white-50" aria-current="page" href="/posts">
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
                    <h1 class="h2"><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
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
                    <div class="col-lg-4">
                        <div class="card mt-3 m-2">
                            <h6 class="card-header bg-primary text-white">Users</h6>
                            <div class="card-body">
                                <h1>{{ $users->count() }}</h1>
                            </div>
                            <div class="card-footer">
                                <a href="dashboard/customers.html" class="text-decoration-none">View Details >></a
                    >
                    </div>
                </div>
                </div>

            <div class="col-lg-4">
              <div class="card mt-3 m-2">
                <h6 class="card-header bg-success text-white">Posts</h6>
                <div class="card-body">
                  <h1>{{ $posts->count() }}</h1>
                </div>
                <div class="card-footer">
                  <a href="dashboard/vehicle.html" class="text-decoration-none"
                    >View Details >></a
                  >
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="card mt-3 m-2">
                <h6 class="card-header bg-warning text-white">Bookings</h6>
                <div class="card-body">
                  <h1>{{ $bookings->count() }}</h1>
                </div>
                <div class="card-footer">
                  <a
                    href="dashboard/categories.html"
                    class="text-decoration-none"
                    >View Details >></a
                  >
                </div>
              </div>
            </div>

            <div class="col-lg-12">
              <div class="card mt-3 m-2">
                <h6 class="card-header bg-dark text-white">List of All Users</h6>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Created</th>
                        </tr>
                        <?php $number = 1; ?>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $number++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->contact }}</td>
                                <td>{{ $user->created_at }}</td>
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