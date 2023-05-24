<?php

namespace App\Http\Controllers;
 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Question;
use App\Imports\QuestionImport;

use App\Models\Question_choice;
use App\Models\Topic;
use Maatwebsite\Excel\Facades\Excel;

class TestController extends Controller
{



///////////////////Import tests from excit////////////////////////////////////////////
public function excel_import_view(Request $request){
    return view('import');
    
 
  }
///////////////////////////////////////////////////////////////
public function import(Request $request){
   echo  $request->file('file') ;
   Excel::import(new QuestionImport,request()->file('file'));
           
   return back(); 
   

 }
 /////////////Vister Counter////////////////////////////////////////////
 public function vister_counter(Request $request){
  
    $data= DB::table('vister_counter')->insert([
        'user_name' => "user",//$request->group_name,
        'join_time' => time(),
         
    ]);


 }
/////////////////////////////////////////////////////////
    public function number_of_joined(Request $request){
       //quiz_group
       $n= DB::table('quiz_group')
       ->where('id', '=',  $request->id  )->get();
       echo $n[0]->joined_count;
 
    }
//////////////////////////////////////////////////////
public function update_of_joined(Request $request){
    //quiz_group
    $n= DB::table('quiz_group')
    ->where('id', '=',  $request->id  )->get();
    //echo $n[0]->joined_count;
     $n = (int)($n[0]->joined_count )+ 1;
  /*  echo $n; */
    $data = DB::table('quiz_group') ->where('id', $request->id) ->update(['joined_count' =>$n]); 
    $n= DB::table('quiz_group')
    ->where('id', '=',  $request->id  )->get();
    echo $n[0]->joined_count;

 }
////////////////////////////////////////////////////////
    public function show_topics(Request $request){
        $topics = Topic::with(['question'])->get();
        
     //   echo $topics[2]->question->count();
        
     return view("show_topics", compact(['topics']));
    }
////////////////api///////////////////////////
public function topics(Request $request){
    $topics = Topic::where('status','=',"مفعل")->get();
  echo json_encode($topics);
      // echo $topics;
  //return view("show_topics", compact(['topics']));
}
///////////////////////////////////////////////////
    public function add_topic(Request $request){
        $this->validate($request, [    
            'topic' => 'required', 
            'status' => 'required',
        ]);
  
        $topic = Topic::create([
            'name' => $request->topic,
            'status' => $request->status,
        ]);  
        $topics = Topic::get();
        // echo $topics;
        
      return view("show_topics", compact(['topics']));
    }
    //////////////////////////////////////////////////////////////
    public function edit_dept(Request $request){
          $topic = Topic::where('id','=',$request->id)->get();
       //    echo  json_encode($topic)  ;
       return view("edit_dept", compact(['topic']));
    }
    //////////////////////////////////////////////////////////////
    public function edit_dept_action(Request $request){
        $topic = Topic::find($request->id);
        $topic->name = $request->name;
        $topic->status = $request->status;
        $topic->save();
        $topics = Topic::with(['question'])->get();
        return view("show_topics", compact(['topics']));
    }
    ////////////////////////////////////////////////////////////////////
    public function   show_test(Request $request){
        $topic_id=$request->id;
          $questions = Question::where('topic_id','=',$request->id)
          ->orderBy('id', 'desc')
          ->get();   
        return view("show_test", compact(['questions','topic_id']));
     }
     //////////////////////////////////////////////////////////////
     public function   show_all_tests(Request $request){
        $topic_id=$request->id;
          $questions = Question::orderBy('id', 'desc')
          ->get();   
        return view("show_all_tests", compact(['questions','topic_id']));
     }
     //////////////////show_groups/////////////////////////////////
     public function   show_groups(Request $request){
    
          $groups = DB::table('quiz_group')
          ->leftJoin('quiz_group_results', 'quiz_group.id', '=', 'quiz_group_results.quiz_group_id')
         // ->select('quiz_group.group_name', 'quiz_group_results.*')
          ->selectRaw('quiz_group.*, count(quiz_group_results.id) as people_count')
      ->groupBy('quiz_group.id')
      ->orderBy('timestamp', 'desc')
           ->get();
    //echo $groups ;
     return view("show_groups", compact(['groups']));
     }
///////////////////////////////////////////////////////////////////
     public function   add_q(Request $request){
        $this->validate($request, [    
            'q' => 'required', 
            //'a[]' => 'required', 
            'correct_index' => 'required',

        ]);
       
       

       $Q = Question::firstOrCreate([
        'question' => $request->q,
        'is_active' => 'y',
        'topic_id' => $request->topic_id,
    ]); 
      

    foreach($_POST['a'] as $index => $value) {
        //echo  $value;
        if( ($index+1) ==  $request->correct_index){
            $Q_choice = Question_choice::firstOrCreate([
                'question_id' =>$Q->id,
                'is_right' => 'y',
                'choice' =>  $value,
               
               ]); 
        }else {
        $Q_choice = Question_choice::firstOrCreate([
            'question_id' =>$Q->id,
            'is_right' => 'n',
            'choice' =>  $value,
           
           ]); 
        }//else
    }
     $topic_id = $request->topic_id ;
    $questions = Question::where('topic_id','=',$request->topic_id)
    ->orderBy('id', 'desc')
    ->get(); 
       return view("show_test", compact(['questions','topic_id']));
   }
   //////////////edit_q_action////////////////////////
   public function edit_q_action (Request $request) {
    
        $question = Question::find($request->id);
        $question->question = $request->q;
        $question->save();
        

        $question_choice = Question_choice::where('question_id','=',$request->id)-> get();
        $question_0 = Question_choice::find($question_choice[0]->id);
        $question_0->choice = $request->a[0];
        if($request->correct_index == 1)  $question_0->is_right = "y" ; else $question_0->is_right = "n";
        $question_0->save();

        $question_1 = Question_choice::find($question_choice[1]->id);
        $question_1->choice = $request->a[1];
        if($request->correct_index == 2)  $question_1->is_right = "y" ; else $question_0->is_right = "n";
        $question_1->save();

        $question_2 = Question_choice::find($question_choice[2]->id);
        $question_2->choice = $request->a[2];
        if($request->correct_index == 3)  $question_2->is_right = "y" ; else $question_0->is_right = "n";
        $question_2->save();

     //   echo json_encode( $question_0);
       $questions = Question::/*where('topic_id','=',$request->topic_id)-> */get(); 
     $topic_id=1;
     return view("show_all_tests", compact(['questions','topic_id']));
   }
    ///////////////////////////////////////////////////
    public function delete_g(Request $request) {
        $group_id=$request->id;
        $q =  DB::table('quiz_group')->where('id', '=',$group_id )->delete();
       
        return back(); 
        
       
    }
   ///////////////////////////////////////////////////
    public function delete_q (Request $request) {
        $topic_id=$request->topic_id;
        $q = Question::find($request["id"]); 
        $q->delete()  ;
    $questions = Question::/*where('topic_id','=',$request->topic_id)-> */get(); 
        return view("show_test", compact(['questions','topic_id']));
    }
    /////////////////////edit_q//////////////////////////////
    public function edit_q (Request $request) {
     /*    $topic_id=$request->topic_id;
        $q = Question::find($request["id"]); 
        $q->delete()  ;*/
        $i=2;
            $question = Question::with(['question_choice'])->where('id','=',$request->id)->get(); 
          return view("edit_q",  compact(['question','i'])); 
    }
    /////////////////////////////////////////////////////////
    public function  delete_topic (Request $request) {
        $topic_id=$request->topic_id;
        $t = Topic::find($request["id"]); 
        $t->delete()  ;
        $topics = Topic::get();
        return view("show_topics" , compact(['topics']) );
    }
   
    ////////////////////////////////////////////////////////
  
 public function   create_group (Request $request) {
     //sql insert in group table
     //  	 
     $data= DB::table('quiz_group')->insert([
        'group_name' => $request->group_name,
        'start_time' => '8:00',
        'topic' =>  $request->topic,
        'is_avalable' => '1',
        'joined_count' => '0'
    ]);
  /*   $q = DB::table('quiz_group')
            ->select('group_name', 'topic')
            ->get(); */
    $id = DB::getPdo()->lastInsertId();
    echo $id;
}

////////////////////////////////////////////////////////
 
public function   get_group(Request $request) {
    
   $q = DB::table('quiz_group')
           ->select('group_name', 'topic')
           ->where('id', '=', $request->id)->get();
  
   echo $q;
}

////////////////////////////////////////////////////////
 
public function  save_g_result(Request $request) {
   
    $data= DB::table('quiz_group_results')->insert([
       'quiz_group_id' => $request->quiz_group_id,
       'std_name' => $request->std_name,
       'result' =>  $request->result,
      
       'finish_time' => now()
   ]);

   echo "success!";
  
}
/////////////////////////////////////////////////////////////
public function show_g_result(Request $request) { 
  //  echo $request->id;
 $query = " SELECT quiz_group.group_name, quiz_group.topic,quiz_group.id  
                 ,quiz_group_results.std_name, quiz_group_results.result 
  FROM `quiz_group_results` 
  INNER JOIN quiz_group ON quiz_group_results.quiz_group_id=quiz_group.id
      AND quiz_group.id =". $request->id."
       ORDER BY quiz_group_results.result DESC " ;
 

/*  SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
FROM Orders
INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;
 */
$r= DB::select($query);
    
echo json_encode($r);
}
////////////////////////////////////////////////////////
public function show (Request $request) { 
$t_id=$request->id;
 $q = Question::with(['question_choice'])->where('topic_id','=',$t_id)->get();
 echo json_encode($q);
     }
////////////////////////////////////////////////////////
public function g_show (Request $request) { 
     $topicid=$request->topicid;
     $q = Question::with(['question_choice'])->where('topic_id','=',$topicid)->get();
     echo json_encode($q);
}
///////////////////////////////////////////////////
}