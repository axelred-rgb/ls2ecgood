@extends('board.layoutboard')
@section('cssimport')
    <style>
        .error>label{
            color:#e31313!important;
        }
        .error>input, .error>textarea{
            border-color:#e31313!important;
        }
        .error>.cke_chrome{
            border-color:#e31313!important;
        }
    </style>
@endsection
@section('content')
    <div class="tab-pane fade active show" id="pills-mylabs" role="tabpanel" aria-labelledby="pills-mylabs-tab">
        <div class="row">
            <div class="col-md-6">
                <h4 class="box-title mb-0">
                    @tt("MANAGE BLOG")
                </h4>
            </div>
            <div class="col-md-6">
                
                <a href="{{route('manageBlog')}}" class="btn btn-md btn-success pull-right"> <i class="fa fa-eye"></i> @tt("All Post")</a>
            </div>
        </div>
        
        <hr>
		
        <div class="row">
            <div class="col-sm-12">
                <form action="" class="form-control">
                    <div class="row mb-4">
                        <div class="col-sm-6" id="titre">
                            <label for="titreInput">@tt("Title (Fr)")</label>
                            <input type="text" class="form-control" name="titre" id="titreInput">
                            <label for="" class="errormessage"></label>
                        </div>
                        <div class="col-sm-6" id="title">
                            <label for="titleInput">@tt("Title (En)")</label>
                            <input type="text" class="form-control" name="title" id="titleInput">
                            <label for="" class="errormessage"></label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-6" id="resume">
                            <label for="resumeInput">@tt("Summary (Fr)")</label>
                            <textarea name="resume" id="resumeInput" class="form-control" cols="30" rows="10"></textarea>
                            <label for="" class="errormessage"></label>
                        </div>
                        <div class="col-sm-6" id="summary">
                            <label for="summaryInput">@tt("Summary (En)")</label>
                            <textarea name="summary" id="summaryInput" class="form-control" cols="30" rows="10"></textarea>
                            <label for="" class="errormessage"></label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-12" id="image">
                            <label for="imageInput">@tt("Image")</label>
                            <input type="file" name="image" id="imageInput" class="form-control">
                            <label for="" class="errormessage"></label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <label for="descriptionFr">@tt("Description (Fr)")</label>
                            <textarea name="descriptionFr" id="" cols="30" rows="10" class="form-control"></textarea>
                            <label for="" class="errormessage"></label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-12" >
                            <label for="descriptionEn">@tt("Description (En)")</label>
                            <textarea name="descriptionEn" id="" cols="30" rows="10" class="form-control"></textarea>
                            <label for="" class="errormessage"></label>
                        </div>
                    </div>
                    <div class="message"></div>
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <button class="btn btn-md btn-success" onclick="app.createPost(this)" type="button" style="width:100%">@tt("Save")</button>                        
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section("jsimport")

	<script>
        CKEDITOR.replace( 'descriptionEn', {
            filebrowserUploadUrl: __env+'/api/uploadimage.article',
            removePlugins: 'exportpdf, emoji',
        });
        CKEDITOR.replace( 'descriptionFr', {
            filebrowserUploadUrl: __env+'/api/uploadimage.article',
            removePlugins: 'exportpdf, emoji',

        });

        
    </script>
@endsection
