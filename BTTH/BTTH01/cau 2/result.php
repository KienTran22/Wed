<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kết quả bài tập</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Kết quả bài tập</h2>

        <?php
        $filename = "question.txt";
        if (!file_exists($filename)) {
            echo "<div class='alert alert-danger'>Không tìm thấy file câu hỏi!</div>";
            exit;
        }

        // Đọc file câu hỏi
        $questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Trích xuất câu hỏi và đáp án đúng
        $answers = [];
        $all_questions = [];
        $current_question = [];

        foreach ($questions as $line) {
            if (strpos($line, "Câu") === 0) {
                if (!empty($current_question)) {
                    $all_questions[] = $current_question; // Lưu câu hỏi cũ
                }
                $current_question = []; // Bắt đầu câu hỏi mới
            }
            $current_question[] = $line;

            // Lấy đáp án đúng
            if (strpos($line, "Đáp án:") !== false) {
                $answers[] = trim(substr($line, strpos($line, ":") + 1));
            }
        }
        if (!empty($current_question)) {
            $all_questions[] = $current_question;
        }

        // So sánh câu trả lời của người dùng với đáp án đúng
        $score = 0;
        echo "<table class='table table-bordered'>";
        echo "<thead><tr><th>Câu hỏi</th><th>Đáp án của bạn</th><th>Đáp án đúng</th></tr></thead>";
        echo "<tbody>";

        // Duyệt qua các câu trả lời của người dùng
        foreach ($_POST as $key => $userAnswer) {
            // Lấy số câu hỏi từ key của form (ví dụ: question1, question2)
            if (preg_match('/question(\d+)/', $key, $matches)) {
                $questionNumber = $matches[1] - 1; // Trừ 1 vì mảng bắt đầu từ 0
                $correctAnswer = $answers[$questionNumber] ?? "";
                $questionText = $all_questions[$questionNumber][0] ?? "Câu không xác định";

                // So sánh đáp án
                if ($correctAnswer === $userAnswer) {
                    $score++;
                }

                // Hiển thị kết quả câu hỏi
                echo "<tr>";
                echo "<td>{$questionText}</td>";
                echo "<td>" . ($userAnswer ?: "Không trả lời") . "</td>";
                echo "<td>{$correctAnswer}</td>";
                echo "</tr>";
            }
        }

        echo "</tbody>";
        echo "</table>";

        // Hiển thị điểm
        echo "<div class='alert alert-success text-center'>";
        echo "Bạn trả lời đúng <strong>$score</strong>/" . count($answers) . " câu.";
        echo "</div>";

        // Nút làm lại
        echo "<a href='index.php' class='btn btn-primary'>Làm lại</a>";
        ?>
    </div>
</body>

</html>
