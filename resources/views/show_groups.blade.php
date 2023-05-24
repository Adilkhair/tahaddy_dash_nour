@extends('layouts.app')
@section('content') 
 
 
<main id="main">
   
<div class="container-fluid admin">
   <h1 style="text-align: center">المجموعات</h1>
   <br>
  
          <div class="row">
          <div class="col-6 offset-6" style="margin: auto;">
                <table class="table table-striped" id="groups" style="font-family: 'JF-Flat-Regular'">
                
                
                <thead>
                <tr> <th>تاريخ الإنشاء</th>
                        <th>إسم المجموعة</th>     
                        <th>عدد المشاركين</th>
                        <th>حزف</th>
                      </tr>             
                    </thead>
                    <tbody>
                    @foreach ($groups as $group)
                    <tr>
                       <td>{{$group->timestamp}}</td>    
                        <td>{{$group->group_name}}</td>    
                        <td>{{$group->people_count}}</td>  
                        <td><a onClick="return confirm('هل تريد الحزف')" title="حذف" href="delete_g?id=<?php echo ($group->id); ?>"><i class="bi-trash"></i></a>
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