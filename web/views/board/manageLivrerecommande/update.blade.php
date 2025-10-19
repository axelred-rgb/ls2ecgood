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
                    @tt("UPDATE BOOK")
                </h4>
            </div>
            <div class="col-md-6">

                <a href="{{route('managelivrerecommande')}}" class="btn btn-md btn-success pull-right"> <i class="fa fa-book-reader"></i> @tt("All Book")</a>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-sm-12">
                <form action="" class="form-control" id="createlivrerecommande">
                    <div class="row mb-4">
                        <div class="col-sm-12 form-group" data-id="name">
                            <label for="titreInput">@tt("Title")</label>
                            <input type="text" class="form-control" name="titre" value="{{$livre->name}}" id="titreInput">
                            <label for="" class="errormessage"></label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-12 form-group" data-id="courses.id">
                            <label for="titreInput">@tt("Cours")</label>
                            <select name="" id="" class="form-control">
                                @foreach(Courses::all() as $cours)
                                    <option {{$livre->getCourses()->getId() == $cours->getId() ? 'selected': ''}} value="{{$cours->getId()}}">
                                        {{$cours->getName()}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6 form-group"  data-id="cover">
                            <label for="imageInput">@tt("Image")</label>
                            <img src="{{$livre->getCover()}}" width="50px" alt="">
                            <input type="file" name="image" id="imageInput" class="form-control">
                            <label for="" class="errormessage"></label>
                        </div>
                        <div class="col-sm-6 form-group"  data-id="doc">
                            <label for="imageInput">@tt("Document")</label> <br>
                            <a target="_blank" href="{{$livre->document}}">@tt("Voir le document")</a>
                            <input type="file" name="image"  class="form-control">
                            <label for="" class="errormessage"></label>
                        </div>
                    </div>

                    <div class="message"></div>
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <button class="btn btn-md btn-success" onclick="app.updatesimpleObject(this,'{{$livre->getId()}}','product','createlivrerecommande','')" type="button" style="width:100%">@tt("Update")</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section("jsimport")

    <script>
        CKEDITOR.replace( 'reponse_en', {
            filebrowserUploadUrl: __env+'/api/uploadimage.article',
            removePlugins: 'exportpdf, emoji',
        });
        CKEDITOR.replace( 'reponse', {
            filebrowserUploadUrl: __env+'/api/uploadimage.article',
            removePlugins: 'exportpdf, emoji',

        });

        CKEDITOR.replace( 'contenu_en', {
            filebrowserUploadUrl: __env+'/api/uploadimage.article',
            removePlugins: 'exportpdf, emoji',
        });
        CKEDITOR.replace( 'contenu', {
            filebrowserUploadUrl: __env+'/api/uploadimage.article',
            removePlugins: 'exportpdf, emoji',

        });


    </script>
@endsection
