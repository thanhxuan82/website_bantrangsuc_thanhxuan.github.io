<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Vote;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class VoteController extends Controller
{
    //
    public function voting(Request $r){
      if(Vote::where('user', $r->user)
      ->where('product', $r->id_product)
      ->update(['star' => $r->star])){
            echo "You have voted ".$r->star." stars for the product";
      }
    }
    public function comment(Request $r){
    //  echo ($r->content);  
      $id_product=$r->id_product;
      $content=$r->content;
      $user=Auth::user()->id;
      $time=Carbon::now('Asia/Ho_Chi_Minh');
      $array_time =explode(" ",$time) ;
      $date=$array_time[0];
      $time=$array_time[1];
      $comment=new Comment;
      $comment->content=$content;
      $comment->date=$date;
      $comment->time=$time;
      $comment->product=$id_product;
      $comment->user=$user;
     if($comment->save()){
          $comments=Comment::where('product',$id_product)->orderBy('id', 'DESC')->get();
          foreach($comments as $comment){
              echo '
              <ul class="list-unstyled" id="comment-info">
              <li>
              <div class="img-holder">
                <img src="../public/frontend/uploads/profile/'.$comment->users->image.'" style="height: 80px" alt="image description">
              </div>
              <!-- Comment Info of the page -->
              <div class="comment-info">
                <div class="header">
                  <div class="heading">
                    <h2>'.$comment->users->name.'</h2>
                    <time class="time" datetime="2016-04-03 20:00">'.$comment->date.' | '.$comment->time.' am</time>
                  </div>
                  <a href="#" class="btn-reply">Reply</a>
                </div>
                <p>'.$comment->content.'</p>
              </div>
            </li>
            </ul>';
           
          }
          
      }
    }
}
