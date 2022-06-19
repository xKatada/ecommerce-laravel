@extends('seller.layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="container-xl pt-3">
        @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="page-header">
            <div class="row align-items-center mw-100">
                <div class="col">
                    <div class="mb-3">
                        {{ Breadcrumbs::render() }}
                    </div>
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Categories
                    </h2>
                </div>
                <div class="col-auto">
                    <div class="btn-list">
                        <a class="btn btn-success d-none d-sm-inline-block" onclick="document.getElementById('productForm').submit()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                <circle cx="12" cy="14" r="2" />
                                <polyline points="14 4 14 8 8 8 8 4" />
                            </svg>
                            Save
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <form action="{{ route('product.store') }}" method="POST" id="productForm" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-12">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" placeholder="General Secretariat Ayude for A New Day">
                        @error('product_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-label">Category</div>
                        <select class="form-select @error('category') is-invalid @enderror" name="category">
                            <option disabled selected>Select category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @error('category') selected @enderror>{{ $category->category }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control @error('product_price') is-invalid @enderror" name="product_price" value="{{ old('product_price') }}" placeholder="General Secretariat Ayude for A New Day">
                        @error('product_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <label class="form-label">Description</label>
                        <textarea class="form-control @error('product_desc') is-invalid @enderror" name="product_desc" rows="6" placeholder="Content..">{{ old('product_desc') }}</textarea>
                        @error('product_desc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <label class="form-label">Product Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <label class="form-label">Preview</label>
                        <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif" alt="Add image" style="max-height: 250px;">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function (e) {
            $('#image').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => { 
                    $('#preview-image-before-upload').attr('src', e.target.result); 
                }
                reader.readAsDataURL(this.files[0]); 
            });
        });
    
    </script>
@endsection