<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of question
 *
 * @author WEB
 */
/*
 Question types can be 
 
 *  Simple Objective Question :     1
 *  Objective, with Question containing one or more image : 2
 *  Objective, with answer option containing images : 3
 *  Objective, with Question containing one or more video : 4
 *  Objective, with answer option containing videos : 5
 * 
 *  Simple Passage type Question : 6
 * 
 * 
 *  Simple Question with text answers : 7
 *  Simple Question, containing images in question, with text answer: 8  
 *  Simple Question, containing videos in question, with text answer: 9
 * 
 *  
 *  
 * 
 *  */
class question {
    //put your code here
    public $type;
    public $question_text;
    public $options = array();
    
    public $images = array();
    public $videos = array();
    public $correct_option_number;
    public $answer_text;
    public $exam_id = array();


    public function saveQuestion()
    {
        
    }
    
    public function assignExam()
    {
        
    }
    
    public function deleteQuestion()
    {
        
    }
    
    public function getQuestion()
    {
        return $this;
    }
    
    
}
