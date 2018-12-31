<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 29.12.2018
 * Time: 22:55
 */

namespace App\Http\Controllers\Topics;

use App\Http\Controllers\Controller;
use App\Http\Form\AddTopicForm;
use Illuminate\Http\Request;

class TopicController extends Controller{

    protected $postsModel;
    protected $commentModel;
    public function __construct()
    {
        $this->postsModel = app()->make('App\Http\Model\PostsModel');
        $this->commentModel = app()->make('App\Http\Model\CommentsModel');
    }

    public function index(){

        $f = new AddTopicForm();
        $form = $f::prepareForm();
        $categories = app()->make('App\Http\Model\CategoryModel')->getAllCategories();
        $selectCategories = array();
        foreach ($categories as $c){
            $selectCategories[$c->id] = $c->name;
        }
        $form[2]['input']['values'] = $selectCategories;

        return view('topics.index',array(
            'form'=>$form,
        ));
    }

    public function listTopic(){
        $list = $this->postsModel->getAllPosts();

        return view('topics.listTopic',array(
            'list'=>$list,
        ));
    }

    public function showPost(Request $request,$title,$id){
        $post = $this->postsModel->getPostById($id);
        $comments = $this->commentModel->getCommentsByIdPost($id);
        return view('topics.showPost',array(
            'post'=>$post,
            'comments'=>$comments
        ));
    }

    public function addComment(Request $request,$id){
        if($request->getMethod() == "POST"){
            $data = $request->all();
            if($request->getSession()->get('authUser')){
                $data['author'] = $request->getSession()->get('authUser')->name;
            } else{
                $data['author'] = "Gość";
            }
            $data['id_post'] = $id;
            $result = $this->commentModel->insert($data);
            if($result){
                return redirect($_SERVER['HTTP_REFERER']);
            }else{
                $request->getSession()->flash('errorMessage','Błąd logowania!');
                return redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }
}