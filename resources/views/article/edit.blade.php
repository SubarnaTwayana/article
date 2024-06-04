@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">

            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> Article info</a></li>
                        </ul>
                        <div class="tab-content">

                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <form action="{{ route('article.update', $article->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <fieldset>
                                            <div class="form-group row">
                                                <label for="status" class="col-sm-2 col-form-label">Status:</label>
                                                <div class="col-sm-10">
                                                    <div class="form-check">
                                                        <input type="radio" name="status" value="private"
                                                            class="form-check-input" id="status_private"
                                                            {{ $article->status == 'private' ? 'checked' : '' }} required>
                                                        <label for="status_private" class="form-check-label">Private</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" name="status" value="release"
                                                            class="form-check-input" id="status_release"
                                                            {{ $article->status == 'release' ? 'checked' : '' }} required>
                                                        <label for="status_release" class="form-check-label">Release</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="url" class="col-sm-2 col-form-label">URL:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="url" class="form-control"
                                                        value="{{ $article->url }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="title" class="col-sm-2 col-form-label">Title:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="title" class="form-control" value="{{ $article->title }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="content" class="col-sm-2 col-form-label">Content:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="content" class="form-control" value="{{ $article->content }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="meta_tag_title" class="col-sm-2 col-form-label">Meta Tag
                                                    Title:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="meta_tag_title" class="form-control" value="{{ $article->meta_tag_title }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="meta_tag_description" class="col-sm-2 col-form-label">Meta Tag
                                                    Description:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="meta_tag_description" class="form-control" value="{{ $article->meta_tag_description }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="category" class="col-sm-2 col-form-label">Category:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="category" class="form-control" value="{{ $article->category }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="published_date" class="col-sm-2 col-form-label">Published
                                                    Date:</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="published_date" class="form-control"
                                                        id="published_date" value="{{ $article->published_date }}" required>
                                                </div>
                                            </div>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    @endsection
