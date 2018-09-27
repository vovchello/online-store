<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class ArtisanQuiz
 * @package App\Console\Commands
 */
class ArtisanQuiz extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artisan:quiz{question=0} {--answer=}}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Simple artisan quiz';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $quiz = $this->getQuestion();
        $answers = $this->getAnswers();

        $userAnswer = $this->askQuestion($quiz);

        $this->outputQuestions($quiz,$userAnswer,$answers);

    }

    /**
     * Output quiz with user answers
     *
     * @param $questions
     * @param $answers
     * @param $correctAnswers
     */
    private function outputQuestions($questions, $answers, $correctAnswers){

        foreach($questions as $key => $value){
                $this->line('Question: '.$value);   
                $this->line('Correct answer: '.$correctAnswers[$key]);
                $this->line('Your answer: '.$answers[$key]);
                $this->line('');
        }
    }

    /**
     * Ask questions to the user
     *
     * @param $questions
     * @return array
     */
    private function askQuestion($questions){

        $answer = [];

        foreach ($questions as $value){
            $answer[] = $this->ask($value);
        }

        return $answer;
    }


    /**
     * gets array questions from app.php
     *
     * @return \Illuminate\Config\Repository|mixed
     */
    private function getQuestion(){
        return config('app.questions');
    }

    /**
     * gets array correct answers from app.php
     *
     * @return \Illuminate\Config\Repository|mixed
     */
    private function getAnswers(){
        return config('app.answers');
    }
}
