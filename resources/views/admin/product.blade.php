@extends('layouts.master')
@section('title')
    Pena
@endsection
@section('content')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Product</h3>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal">
                    Tambah data
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Product Name</th>
                      <th>Description</th>
                      <th >Product Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                    @if (count($data) > 0)
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $d->product_name }}</td>
                                    <td>{{ $d->description }}</td>
                                    <td>
                                        <img src="/uploads/product/{{ $d->product_image }}" width="50px" height="50px" alt="">
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-outline-primary">Edit</a>
                                        <a href="#" class="btn btn-outline-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-center">Data Not found</td>
                            </tr>
                        </tfoot>
                    @endif
                </table>
              </div>
              <!-- /.card-body -->
            </div>

{{-- modal create data --}}

<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="card card-primary">
              <form method="POST" action="{{ route('create-product') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" class="form-control" name="product_name" id="product_name">
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description" >
                  </div>
                  <div class="form-group">
                    <label for="product_image">Product Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="product_image" id="product_image">
                        <label class="custom-file-label" for="product_image">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
      </div>

    </div>
  </div>
</div>
@endsection
@section('scripts')

@endsection
