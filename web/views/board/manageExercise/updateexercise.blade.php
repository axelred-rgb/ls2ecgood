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
                    @tt("UPDATE EXERCISE")
                </h4>
            </div>
            <div class="col-md-6">

                <a href="{{route('manageexercise')}}" class="btn btn-md btn-success pull-right"> <i class="fa fa-book-reader"></i> @tt("All Exercise")</a>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-sm-12">
                <form action="" class="form-control" id="createexercise">
                    <div class="row mb-4">
                        <div class="col-sm-6 form-group" data-id="title">
                            <label for="titreInput">@tt("Title (Fr)")</label>
                            <input type="text" class="form-control" name="titre" value="{{$exo->title}}" id="titreInput">
                            <label for="" class="errormessage"></label>
                        </div>
                        <div class="col-sm-6 form-group" data-id="title_en">
                            <label for="titleInput">@tt("Title (En)")</label>
                            <input type="text" class="form-control" name="title" value="{{$exo->title_en}}" id="titleInput">
                            <label for="" class="errormessage"></label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-6 form-group" data-id="courses.id">
                            <label for="titreInput">@tt("Cours")</label>
                            <select name="" id="" class="form-control">
                                @foreach(Courses::all() as $cours)
                                    <option {{$exo->getCourses()->getId() == $cours->getId() ? 'selected': ''}} value="{{$cours->getId()}}">
                                        {{$cours->getName()}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6 form-group"  data-id="image">
                            <label for="imageInput">@tt("Image")</label>
                            <input type="file" name="image" id="imageInput" class="form-control">
                            <label for="" class="errormessage"></label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-12 form-group" ckeditor="ckeditor" data-id="contenu">
                            <label for="resumeInput">@tt("Exercise (Fr)")</label>
                            <textarea name="contenu" id="contenu" class="form-control" cols="30" rows="10">
                                {{$exo->contenu}}
                            </textarea>
                            <label for="" class="errormessage"></label>
                        </div>

                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-12 form-group" ckeditor="ckeditor" data-id="contenu_en">
                            <label for="summaryInput">@tt("Exercise (En)")</label>
                            <textarea name="contenu_en" id="contenu_en" class="form-control" cols="30" rows="10">
                                {{$exo->contenu_en}}
                            </textarea>
                            <label for="" class="errormessage"></label>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-sm-12 form-group" ckeditor="ckeditor" data-id="reponse">
                            <label for="descriptionFr">@tt("Reponse (Fr)")</label>
                            <textarea name="reponse" id="reponse" cols="30" rows="10" class="form-control">
                                {{$exo->reponse}}
                            </textarea>
                            <label for="" class="errormessage"></label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-12 form-group" ckeditor="ckeditor" data-id="reponse_en">
                            <label for="descriptionEn">@tt("Reponse (En)")</label>
                            <textarea name="reponse_en" id="reponse_en" cols="30" rows="10" class="form-control">
                                {{$exo->reponse_en}}
                            </textarea>
                            <label for="" class="errormessage"></label>
                        </div>
                    </div>
                    <div class="message"></div>
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <button class="btn btn-md btn-success" onclick="app.updatesimpleObject(this,'{{$exo->getId()}}','exercise','createexercise','manageexercise')" type="button" style="width:100%">@tt("Update")</button>
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
