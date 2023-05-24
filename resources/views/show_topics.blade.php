@extends('layouts.app')
@section('content') 
 
 
<main id="main">
   
<div class="container-fluid admin">
    <div class="row">
   <h1 style="text-align: center">الأقسام</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                
        <?php if(isset($_GET["message"])) echo '<div class="alert alert-success" >
        '.  $_GET["message"]. ' </div>' ; ?>
         
        <div class="col-6 offset-6" style="margin: auto;">
        <form action="add_topic" method="POST">
        <input type="hidden"  name="_token" value="{{ csrf_token() }}">    
        <div class="form-group row">
        <div class="col offset-0">    <input type="text" class="form-control"   name="topic" placeholder="أدخل عنوان القسم"/>
        </div>
        <div class="col offset-0">

        <select name="status"  class="form-control"  id="status" >
        <option>مفعل</option>
        <option>غير مفعل</option> 
        </select>
        </div><div class="col-2">
        <input type="submit" class="form-control"    value="إضافة">
        </div>
        </form></div></div> 

          <div class="row">
          <div class="col-6 offset-6" style="margin: auto;">
                <table class="table" style="font-family: 'JF-Flat-Regular'">
                    <thead>
                        <th>القسم</th>
                        <th>عدد الاسئلة</th>
                        <!-- <th>تاريخ الادخال</th>       -->                 
                        <th>الحالة</th>
                         <th colspan="2" >التحكم</th>
                       
                       
                    </thead>
                    <tbody>
                    @foreach ($topics as $topic)
                        <tr>
                        <td>{{$topic->name}}</td>    
                        <th>{{$topic->question->count()}}</th>                                        
                       <!--  <td class='text-center'>{{$topic->updated_at}}</td> -->
                        <td >{{$topic->status}}</td>  
                        
                           <td> 
                             <a  title="حزف"  onClick="return confirm('هل تريد الحزف')"  href="delete_topic?id={{$topic->id}}"><i class="bi-trash"></i></a>
                               |  <a  title="الاسئلة عرض" href="show_test?id={{$topic->id}}"><i class="bi-list"></i></a>
                               |  <a  title="تعديل"  href="edit_dept?id={{$topic->id}}"><i class="bi-pencil"></i></a>
                           
                            </td>                    

                        </tr>
                        @endforeach


                    </tbody>  
                </table>
               </div>
            </div>
       </div>
 
   </main><!-- End #main -->
 <br/><br/>

@stop