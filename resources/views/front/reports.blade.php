@extends('layouts.front-end')
@section('content')
<!-- Page Content -->
<style>
    .fill {
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden
    }
    .fill img {
        flex-shrink: 0;
        min-width: 100%;
        min-height: 100%
    }
</style>
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">Reported Misuse of State Resources
            </h1>
            <!-- Blog Post -->
            @foreach($answers as $answer)
            <div class="card mb-3">

                <div class="card-body fill">
                    <h2 class="card-title"></h2>
                    <strong>
                        {{$answer->question->question ?? ''}}
                        @foreach($answer->offices as $key => $item)
                            <strong>by {{ $item->name ?? 'Unidentified Person'}}</strong>
                        @endforeach
                        {{$answer->date ?? 'Unknown date'}} at
                        {{$answer->event ?? 'an event'}} that took place at
                        {{$answer->country->name ?? ''}}
                        @foreach($answer->counties as $key => $item)
                            <strong>,{{ $item->name }}</strong> County
                        @endforeach
                        @foreach($answer->sub_counties as $key => $item)
                            <strong>{{ $item->name ?? 'Unknown' }}</strong> Sub-county
                        @endforeach
                        @foreach($answer->constituencies as $key => $item)
                            <strong>{{ $item->name ?? 'Unknown' }}</strong> Constituency,
                        @endforeach
                        @foreach($answer->wards as $key => $item)
                            <strong>{{ $item->name ?? 'Unknown'}}</strong> Ward
                        @endforeach
                    </strong>
                   {{-- <a href="#" class="btn btn-primary">Read More &rarr;</a>--}}
                </div>
                @foreach($answer->photo as $key => $media)
                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                        <img src="{{ $media->getUrl('preview') }}"  width="300">
                    </a>
                @endforeach
                 {{--<a href="#" class="btn btn-primary">Read More &rarr;</a>--}}
                     @foreach($answer->file as $key => $media)
                         <a href="{{ $media->getUrl() }}" target="_blank" class="btn btn-primary">
                             View Other files  &rarr;
                         </a>
                     @endforeach

                {{--<img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">--}}

                <div class="card-footer text-muted">
                   {{-- Posted on January 1, 2020 by--}}
                    Posted on {{$answer->created_at ?? ''}}
                    {{--<a href="#">Start Bootstrap</a>--}}
                </div>
            </div>
        @endforeach

            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <a class="page-link" href="#">&larr; Older</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">State Reources </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg">
                            @foreach($resources as $resource)
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">{{$resource->name ?? ''}}</a>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
@endsection
{{--
<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
--}}
