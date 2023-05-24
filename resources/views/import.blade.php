@extends('layouts.app')

@section('content')
<div class="container" style="text-align: right">
    <div class="card bg-light mt-3">
        <div class="card-header">
             استيراد البيانات من ملف اكسل
        </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <input  type="submit" value="استيراد البيانات" /> 
            </form>
        </div>
    </div>
</div>
@endsection