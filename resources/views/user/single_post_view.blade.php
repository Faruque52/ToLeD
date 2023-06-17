@extends('layouts.app')

@section('mainSection')

    <div class="py-4"></div>
    <section class="section">
    <div class="container">
        <div class="row justify-content-center">
        <div class=" col-lg-9   mb-5 mb-lg-0">
            <article>
            <div class="post-slider mb-4">
                <img src="{{asset('post_thumbnails/'.$post->thumbnail)}}" class="card-img" alt="post-thumb">
            </div>
            
            <h1 class="h2">{{$post->title}}</h1>
            <ul class="card-meta my-3 list-inline">
                <li class="list-inline-item">
                    <i class="ti-calendar"></i>{{date('d M Y', strtotime($post->created_at))}}
                </li>
                <li class="list-inline-item">
                    Category:<b class="text-primary" >{{ $post->category_name }}</b>
                    
                </li>
            </ul>
            <div class="content">
                <p>
                    @php
                    echo $post->description;
                @endphp
                </p>
            </div>
            </article>
            
        </div>

        <div class="col-lg-9 col-md-12">
            <div class="mb-5 border-top mt-4 pt-5">
                <h3 class="mb-4">Comments</h3>

                @foreach ($comments as $comment)

                    <div class="media d-block d-sm-flex mb-4 pb-4">
                        <a class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                            @if ($comment->user_photo)
                                <img src="{{asset('images/user_photos/'.$comment->user_photo)}}" alt="" class="rounded-circle" style="height: 30px">
                            @else
                                <img src="{{asset('images/user_photos/user.png')}}" alt="" class="rounded-circle" style="height: 30px">
                            @endif
                        </a>
                        <div class="media-body">
                            <a href="#!" class="h4 d-inline-block mb-3">{{$comment->user_name}}</a>

                            <p>
                                @php
                                    echo $comment->comment;
                                @endphp
                            </p>
                            
                            <small class="text-black-800 mr-3 font-weight-600">{{ date('d M Y', strtotime($comment->created_at))}}
                            </small>
                            {{-- <a class="text-primary font-weight-600" href="#!">Reply</a> --}}
                        </div>
                    </div>
                    
                @endforeach

                    {{$comments->links('pagination::bootstrap-4')}}
                {{-- <div class="media d-block d-sm-flex">
                    <div class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                        <img class="mr-3" src="images/post/arrow.png" alt="">
                        <a href="#!"><img src="images/post/user-02.jpg" class="mr-3 rounded-circle" alt=""></a>
                    </div>
                    <div class="media-body">
                        <a href="#!" class="h4 d-inline-block mb-3">Nadia Sultana Tisa</a>

                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>

                        <span class="text-black-800 mr-3 font-weight-600">April 18, 2020 at 6.25 pm</span>
                        <a class="text-primary font-weight-600" href="#!">Reply</a>
                    </div> --}}
                {{-- </div> --}}
            </div>

            <div>
                <h3 class="mb-4">Leave a Reply</h3>
                <form action="{{route('comment_store', $post->id)}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                           <textarea name="comment" class="summernote shadow-none form-control" rows="7" required></textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Comment Now</button>
                </form>
            </div>
        </div>
        
        </div>
    </div>
    </section>
    
@endsection