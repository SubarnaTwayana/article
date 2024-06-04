@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        <div class="ibox-content m-b-sm border-bottom">
            <div class="col-sm-4">
                <a href="{{ route('article.create') }}" class="btn btn-success">Add Article</a>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="col-form-label" for="order_id">Status</label>
                        <input type="text" id="order_id" name="order_id" value=""  class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="col-form-label" for="status">URL</label>
                        <input type="text" id="status" name="status" value="" class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="col-form-label" for="title">Title</label>
                        <input type="text" id="title" name="title" value=""  class="form-control">
                    </div>
                </div>
            </div>
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>URL</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data)
                                    @foreach ($data as $article)
                                        <tr>
                                            <td>{{ $article->id }}</td>
                                            <td>{{ $article->url }}</td>
                                            <td>{{ $article->title }}</td>
                                            <td>{{ $article->status }}</td>
                                            <td>
                                                <a href="{{ route('article.edit', $article->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <form action="{{ route('article.destroy', $article->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">No data available</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
</div>
@endsection

