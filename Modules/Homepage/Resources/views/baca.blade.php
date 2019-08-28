@extends('layouts.frontend.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-md-2">
                    <div class="card mb-3" style="padding: 20px">
                      <div class="card-header">
                          <h3><b>{{ $berita->title }}</b></h3>
                          <em><small><p>{{ $berita->created_at }}</p></small></em>
                          <legend></legend>
                      </div>
                            <div class="row no-gutters">
                            <img src="{{ asset($berita->image) }}" alt="" style="width: 100%; height: 420px">
                            <legend></legend>
                            {!! $berita->description !!}
                            
                            </div>
                            <legend></legend>
                   
                    <h5><u> Comments : </u></h5>
                        <form action="{{ route('berita.comment', ['id' => $berita->id]) }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Post Comment</label>
                                    <div class="col-lg-10">
                                        <textarea rows="3" cols="3" name="comment" class="form-control" placeholder="post your comment" required></textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin?')"> Comment</button>
                        </form>
                        <legend></legend>
                        
                        @if($comments->count() > 0)
                            @foreach ($comments as $comment)
                                    <div class="row" style="margin-bottom: 30px;">
                                        
                                    <div class="col-md-2">
                                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" width="50px" class="img img-rounded img-fluid">
                                        <p class="text-secondary text-center"></p>
                                    </div>
                                    <div class="col-md-10">
                                    <p><strong style="color: blue">User</strong>&nbsp;<em style="margin-left: 30px;
                                        color: #ccc"><small>{{ $comment->created_at }}</small></em></p>
                                        <p>{{ $comment->comment }}</p>
                                        <p>
                                            {{-- <a class="float-right btn btn-outline-primary ml-2">  <i class="fa fa-reply"></i> Reply</a>
                                            <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a> --}}
                                        </p>
                                    </div>
                                    </div>
                            @endforeach
                        
                        @endif


                    </div>
                    
            </div>

            {{-- <div class="col-md-3">
                <div class="card">

                </div>
            </div> --}}
                
        </div>
    </div>
@endsection