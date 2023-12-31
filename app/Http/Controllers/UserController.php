<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\PostComment;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\QuestionAnswerLike;
// use App\Models\User;


class UserController extends Controller
{
    public function index(){

        $postObj = new Post();
        $posts = $postObj->join('categories','categories.id', '=', 'posts.category_id')
        ->select('posts.*', 'categories.name as category_name')
        ->where('posts.status', 1)
        ->orderby('posts.id','desc')
        ->paginate(3);

        
        $categories = Category::all();
        
        return view('user.index', compact('posts','categories'));
    }

    public function single_post_view($id){

        $postObj = new Post();

        $post = $postObj->join('categories','categories.id', '=', 'posts.category_id')
        ->select('posts.*', 'categories.name as category_name')
        ->where('posts.id', $id)
        ->first();

        $commentObj = new PostComment();

        $comments = $commentObj->join('users','users.id', '=', 'post_comments.user_id')
        ->select('post_comments.*', 'users.name as user_name','users.photo as user_photo')
        ->where('post_comments.post_id', $id)
        ->paginate(2);

        // $posts = Post::all()->where('status', 1)->sortByDesc('created_at');
        
        return view('user.single_post_view', compact('post', 'comments'));
    }

    public function filter_by_category($id){

        $postObj = new Post();
        $posts = $postObj->join('categories','categories.id', '=', 'posts.category_id')
        ->select('posts.*', 'categories.name as category_name')
        ->where('posts.status', 1)
        ->where('posts.category_id', $id)
        ->orderby('posts.id','desc')
        ->get();

        // $posts = Post::all()->where('status', 1)->sortByDesc('created_at');
        
        
        return view('user.filter_by_category', compact('posts'));

    }

    public function comment_store(Request $request, $id){
        
        $data = [
            'post_id' => $id,
            'user_id' => auth()->user()->id,
            'comment' => $request->comment,
        ];

        PostComment::create($data);

        $notify = ['message' => 'Comment Added Successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notify);
    }

    public function questions(){

        $questionObj = new Question();

        $questions = $questionObj->join('categories','categories.id', '=', 'questions.category_id')
        ->join('users','users.id', '=', 'questions.user_id')
        ->select('questions.*', 'categories.name as category_name', 'users.name as user_name', 'users.photo as user_photo')
        ->orderby('questions.id','desc')
        ->paginate(5);

        $categories = Category::all();
        return view('user.questions', compact('questions','categories'));
    }

    public function question_store(Request $request){

        $request->validate([
            'category_id' => 'required',
            'question' => 'required',
        ]);

        $data = [
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'question' => $request->question,
        ];

        Question::create($data);

        $notify = ['message'=>'Question Added Successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notify);
    }


    public function question_delete($id){

        Question::find($id)->delete();

        $notify = ['message'=>'Question Deleted Successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notify);

    }

    public function question_answers($id){

        $questionObj = new Question();
        $answersObj = new QuestionAnswer();

        $question = $questionObj->join('categories','categories.id', '=', 'questions.category_id')
        ->join('users','users.id', '=', 'questions.user_id')
        ->select('questions.*', 'categories.name as category_name', 'users.name as user_name', 'users.photo as user_photo')
        ->where('questions.id', $id)
        ->first();

        $answers = $answersObj->join('users','users.id', '=', 'question_answers.user_id')
        ->select('question_answers.*', 'users.name as user_name', 'users.photo as user_photo')
        ->where('question_answers.question_id', $id)
        ->orderby('question_answers.id','desc')
        ->get();

       

        return view('user.question_answers',compact('question','answers'));
    }
    public function question_answer_store(Request $request, $id){


        $data = [
            'question_id' => $id,
            'user_id' => auth()->user()->id,
            'answer' => $request->answer, 
        ];
        QuestionAnswer::create($data);

        $notify = ['message'=>'Question Added Successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notify);

        
    }



    // public function question_answer_delete($id){

    //     QuestionAnswer::find($id)->delete();

    //     $notify = ['message'=>'Question Answer Deleted Successfully', 'alert-type' => 'success'];
    //     return redirect()->back()->with($notify);

    // }

    public function question_answer_delete($id)
    {
        $questionAnswer = QuestionAnswer::find($id);

        if ($questionAnswer) {
            $questionAnswer->delete();
            $notify = ['message' => 'Question Answer Deleted Successfully', 'alert-type' => 'success'];
        } else {
            $notify = ['message' => 'Question Answer not found', 'alert-type' => 'error'];
        }

        return redirect()->back()->with($notify);
    }


    public function question_answer_like($id){

        $data = [
            'answer_id' => $id,
            'user_id' => auth()->user()->id
        ];

        QuestionAnswerLike::create($data);

        return redirect()->back();
    }

    public function question_answer_unlike($id){

        QuestionAnswerLike::where('answer_id', $id)->where('user_id', auth()->user()->id)->delete();

        return redirect()->back();
    }


    public function checkEmailAvailability(Request $request)
    {
        $email = $request->input('email');

        // Check if the email exists in the database
        $user = User::where('email', $email)->first();

        if ($user) {
            return response()->json(['available' => false]);
        }

        return response()->json(['available' => true]);
    }




}
