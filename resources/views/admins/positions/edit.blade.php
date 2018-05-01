@extends("layouts.master")

@section("content")
<br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-12" style="text-align:center">
                <h3><b>Edit Posiname name</b></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form-group" method="post" action="/admin/positions/{{ $position->id }}">
                    <!-- CSRF: Cross-Site Request Forgery -->
                    @method("PUT")
                    @csrf
                    <label for="name">Name:</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ old('name') ?? $position->name }}">
                    <!-- <select name="status" id=""></select> -->
                    <br>
                    <center>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </center>
                    
                </form>
            </div>
        </div>
    </div>
@endsection