@extends('back_layouts.layout')

@section('header')
    <!-- title -->
    <title>Dashboard/Home</title>
    <!-- CSS for particular page goes here -->
@endsection

@section('content-1')
    <!-- Content of the page goes here -->
    <main class="d-flex flex-column min-vh-100 col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
        <h1 class="h2">Dashboard</h1>
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-lg-0">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="table-responsive">
                                    <table class="table table-bordered mb-0 table-dark table-striped text-center">
                                        <thead>
                                          <tr>
                                            <th scope="col">Order</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Date</th>
                                            <th scope="col"></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row">17371705</th>
                                            <td>Volt Premium Bootstrap 5 Dashboard</td>
                                            <td>johndoe@gmail.com</td>
                                            <td>€61.11</td>
                                            <td>Aug 31 2020</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                </div> --}}
                        <a href="#" class="btn btn-block btn-dark">View all</a>
                    </div>
                </div>
            </div>
        </div>
        <footer class="mt-auto pt-5 d-flex justify-content-between">
            <span>Copyright © 2019-2020 <a href="">HRS Cooperative</a></span>
            <ul class="nav m-0">
                <li class="nav-item">
                    <a class="nav-link text-secondary" aria-current="page" href="#">Privacy Policy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="#">Terms and conditions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="#">Contact</a>
                </li>
            </ul>
        </footer>
    </main>
@endsection



@section('footer')
    <!-- JavaScripts or links to js files goes here -->
@endsection
