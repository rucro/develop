<?php
/*
quiz.php
quiz.css
config.php
functions.php
Quiz.php
quiz.js
_answer.php
Token.php
autoload.php
*/
require_once(__DIR__ . '/config.php');

$quiz = new MyApp\Quiz();

if(!$quiz->isFinished()) {
    $data = $quiz->getCurrentQuiz();
    shuffle($data['a']);
}



?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>QUIZ</title>
    <link rel="stylesheet" href="quiz.css" type="text/css">
</head>
<body>
    <?php if ($quiz->isFinished()) : ?>
        <div id="container">
            <div id="result">
                Your score
                <div><?= h($quiz->getScore()); ?> %</div>
            </div>
            <a href=""><div id="btn">Replay?</div></a>
        </div>    
        <?php $quiz->reset(); ?>
    <?php else : ?>
     <div id="container">
        <h1>問題 <?= h($data['q']) ?></h1>
        <ul>
            <?php foreach ($data['a'] as $a) : ?>
            <li class="answer"><?= h($a) ?></li>
            <?php endforeach; ?>
        </ul>
        <div id="btn" class="disabled"><?= $quiz->isLast() ? '結果発表' : '次へ'; ?></div>
        <input type="hidden" id="token" value="<?= h($_SESSION['token']); ?>">
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="quiz.js"></script>
    <?php endif; ?>
   
</body>
</html>