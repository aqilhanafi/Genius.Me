<?php

namespace App\Http\Controllers;

use App\Models\QuizContent;
use App\Models\QuizDetail;
use App\Models\User;
use Illuminate\Http\Request;

class GeniusmeController extends Controller
{
    public function home() {
        return view('home');
    }

    public function createQuiz(Request $request) {
        $userId = $request->session()->get('userId');    
        return view('create')->with('userId', $userId);
    }

    public function login(Request $request) {
        $userName = $request->input('userName');
        $password = $request->input('password');
        $users = User::all();
        $userNameStatus = false;
        $passwordStatus = false;

        foreach($users as $user) {
            if ($userName == $user->name) {
                $userNameStatus = true;
                if ($password == $user->password) {
                    $passwordStatus = true;
                }
            }
            if ($userNameStatus == true && $passwordStatus == true) {
                $userId = $user->id;
            }
        }

        if ($userNameStatus == true && $passwordStatus == true) {
            $request->session()->put('userId', $userId);
            return redirect('/create');
        }

        else if ($userNameStatus == false && $passwordStatus == false) {
            $errorMsg = "Account with the username does not exist";
            return view('home')->with('errorMsg', $errorMsg);
        }

        else if ($userNameStatus == true && $passwordStatus == false) {
            $errorMsg = "Password does not match";
            return view('home')->with('errorMsg', $errorMsg);
        }
        else {
            echo 'hello world';
        }
    }

    public function signUp(Request $request) {
        $userName = $request->input('userName');
        $email = $request->input('email');
        $password = $request->input('password');
        
        $users = User::all();
        $sameNameStatus = false;
        $sameEmailStatus = false;
        foreach($users as $user) {
            if ($user->name == $userName) {
                $sameNameStatus = true;
            }
            if ($user->email == $email) {
                $sameEmailStatus = true;
            }

        }

        if (!$sameNameStatus && !$sameEmailStatus) {
            $user = new User;
            $user->name = $userName;
            $user->email = $email;
            $user->password = $password;
            $user->save();
            $errorMsg = "Account has been created";
            return view('home')->with('errorMsg', $errorMsg);
        }

        else if ($sameNameStatus){
            $errorMsg = "Account with the same name already exist";
            return view('home')->with('errorMsg', $errorMsg);
        }

        else if ($sameEmailStatus) {
            $errorMsg = "You have created an account associated wih this e-mail";
            return view('home')->with('errorMsg', $errorMsg);
        }
    }

    public function saveQuiz(Request $request) {
        $userId = $request->session()->get('userId');

        $title = $request->input('title');
        $preview = $request->input('preview');

        //update quizDetail table
        $quizDetail = new QuizDetail;
        $quizDetail->userId = $userId;
        $quizDetail->title = $title;
        $quizDetail->save();

        //update quizId
        $quizId = 0; 
        $quizDetails = QuizDetail::all();
        foreach($quizDetails as $quizDetail) {
            if ($quizDetail->title == $title) {
                if ($quizDetail->userId == $userId) {
                    $quizId = $quizDetail->id;
                }
            }
        }

        //update quiz preview
        $quizContent = new QuizContent;
        $quizContent->quizId = $quizId;
        $quizContent->content = $preview;
        $quizContent->type = 'preview';
        $quizContent->number = 0;
        $quizContent->save();

        //update quiz questions and choices
        $i = 1;
        while(true) {
            if ($request->input(('question'.$i)) != null) {
                //update quiz question
                $question = $request->input('question'.$i);
                $quizContent = new QuizContent;
                $quizContent->quizId = $quizId;
                $quizContent->content = $question;
                $quizContent->type = 'question';
                $quizContent->number = $i;
                $quizContent->save();

                for ($j = 1; $j < 5; $j++) {
                    //update quiz choices
                    $choice = $request->input('choice'.$i.'_'.$j);
                    if ($choice == null) {
                        continue;
                    }
                    $quizContent = new QuizContent;
                    $quizContent->quizId = $quizId;
                    $quizContent->content = $choice;
                    $quizContent->type = 'choice';
                    $quizContent->number = $i;
                    $quizContent->save();   
                }
                
                //update quiz answer
                $answer = $request->input('answer'.$i);
                $quizContent = new QuizContent;
                $quizContent->quizId = $quizId;
                $quizContent->content = $answer;
                $quizContent->type = 'answer';
                $quizContent->number = $i;
                $quizContent->save();
            }
            else {
                break;
            }
            $i++;
        }

        echo "<script>alert('Your quiz has been saved')</script>";
        return view('create')->with('userId', $userId);
    }

    public function logout(Request $request) {
        return view('home');
    }
}
