
    @extends('dashboard.master')


    @section('title')
    {{__('main_header.show_category')}}
    @endsection

    @section('css')

    @endsection
    @section('content')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('main_header.show_category')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">{{trans('buttons_trans.show')}}</li>
                    <li class="breadcrumb-item "><a href="{{route('categories.index')}}">{{__('main_header.categories')}}</a></li>
                    <li class="breadcrumb-item ">{{trans('main_sidbar_translate.dashboard')}}</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div>

    {{-- ================================================== --}}
        <!-- Content Wrapper. Contains page content -->
        <div class="card-body">
            @if(session('error_catch'))
            <div class="bg-danger">{{session('error_catch')}}</div>
            @endif
            <form>
                <div class="row">
                    <div class="col">
                        <label for="name_ar">{{trans('category_trans.name_ar')}}</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control " readonly name="name_ar" value="{{$category->getTranslation('name','ar')}}">
                        </div>

                    </div>
                    <div class="col">
                        <label for="name_en">{{trans('category_trans.name_en')}}</label>
                        <div class="input-group mb-3 col">
                            <input type="text" class="form-control " readonly name="name_en" value="{{$category->getTranslation('name','en')}}">

                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="slug">{{trans('category_trans.slug')}}</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control  " readonly name="slug" value="{{$category->slug}}">
                        </div>

                    </div>
                    <div class="col">
                        <label for="image">{{trans('category_trans.image')}}</label>
                        <div class="input-group mb-3 col">
                            <img src="{{asset($route.'/'.$category->image)}}" alt="" class="img-thumbnail" style="max-width:200px;">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col">
                        <label for="description_ar">{{trans('category_trans.description_ar')}}</label>
                        <div class="input-group mb-3">
                            <textarea name="description_ar" rows="3" cols="3"
                                    class="form-control " readonly>
                                    {{$category->getTranslation('description','ar')}}
                                </textarea>
                        </div>

                    </div>
                    <div class="col">
                        <label for="description_en">{{trans('category_trans.description_en')}}</label>
                        <div class="input-group mb-3">
                            <textarea name="description_en" rows="3" cols="3"
                                    class="form-control " readonly>
                                    {{$category->getTranslation('description','en')}}
                                </textarea>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="is_showing">{{trans('category_trans.is_showing')}}</label>
                        <div class="input-group mb-3">
                            @if($category->is_showing == 1)
                                <span class="badge badge-success">{{trans('category_trans.showing')}}</span>
                            @else
                                <span class="badge badge-danger">{{trans('category_trans.hidden')}}</span>
                            @endif

                    </div>
                    <div class="col">
                        <label for="is_popular">{{trans('category_trans.is_popular')}}</label>
                        <div class="input-group mb-3 col">
                            @if($category->is_popular == 1)
                                <span class="badge badge-success">{{trans('category_trans.popular')}}</span>
                            @else
                                <span class="badge badge-danger">{{trans('category_trans.no_popular')}}</span>
                            @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="meta_title_ar">{{trans('category_trans.meta_title_ar')}}</label>
                        <div class="input-group mb-3">
                            <input type="text" name="meta_title_ar"
                                class="form-control " readonly value="{{$category->getTranslation('meta_title','ar')}}">
                        </div>
                    </div>
                    <div class="col">
                        <label for="meta_title_en">{{trans('category_trans.meta_title_en')}}</label>
                        <div class="input-group mb-3">
                            <input type="text" name="meta_title_en"
                                class="form-control " readonly value="{{$category->getTranslation('meta_title','en')}}">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="meta_description_ar">{{trans('category_trans.meta_description_ar')}}</label>
                        <div class="input-group mb-3">
                        <textarea name="meta_description_ar" rows="3" cols="3"
                                class="form-control " readonly>
                                {{$category->getTranslation('meta_description','ar')}}
                            </textarea>
                        </div>

                    </div>
                    <div class="col">
                        <label for="meta_description_en">{{trans('category_trans.meta_description_en')}}</label>
                        <div class="input-group mb-3">
                        <textarea name="meta_description_en" rows="3" cols="3"
                                class="form-control " readonly>
                                {{$category->getTranslation('meta_description','en')}}
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="meta_keywords">{{trans('category_trans.meta_keyword')}}</label>
                        <div class="input-group mb-3">
                        <textarea name="meta_keywords" rows="3" cols="3"
                                class="form-control " readonly>
                                {{$category->meta_keywords}}
                            </textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    @endsection

    @section('script')

    @endsection
