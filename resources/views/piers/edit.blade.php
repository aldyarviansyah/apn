@extends('layouts.app')

@section('content')
    <section id="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <div class="mt-30"></div>

                    <form class="apn-form" action="{{ route('piers.update', $detail) }}" method="post">
                        @csrf

                        <div class="form-section mb-40">
                            <div class="form-group">
                                <label>Pier number</label>
                                <input type="number" class="form-control gmod @error('number') is-invalid @enderror" name="number" value="{{ old('number', $detail->number) }}">
                                <div class="o5 mt-1">Numbers only</div>
                                @error('number')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Pier category</label>
                                <select class="custom-select @error('pier_category_id') is-invalid @enderror" name="pier_category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('pier_category_id', $detail->pier_category_id)==$category->id?'selected':''  }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('pier_category_id')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Harbor section</label>
                                <select class="custom-select @error('section') is-invalid @enderror" name="section">
                                    <option value="west" {{ old('section', $detail->section)=='west'?'selected':'' }}>West</option>
                                    <option value="east" {{ old('section', $detail->section)=='east'?'selected':'' }}>East</option>
                                    <option value="center" {{ old('section', $detail->section)=='center'?'selected':'' }}>Center</option>
                                </select>
                                @error('section')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-10">
                                    <button type="submit" class="btn btn-primary btn-block gmod-btn scale has-spinner add-spinner white-spinner">Update</button>
                                </div>
                                <div class="col-md-6 mb-10">
                                    <a href="{{ route('piers') }}" class="btn btn-light btn-block mb-10 gmod-btn pop-onclick">Back to Piers</a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('extraCss')
    <style type="text/css">
        /*page-specific css*/
        .role-select-item {
            cursor: pointer;
            margin-bottom: 10px;
        }
        .role-select-item.active,
        .role-select-item:hover {
            background: #ececec;
            border: 1px solid #ececec;
        }
        .role-select-item .card-body {
            padding-top: 14px;
            padding-bottom: 14px;
        }
    </style>
@endsection
