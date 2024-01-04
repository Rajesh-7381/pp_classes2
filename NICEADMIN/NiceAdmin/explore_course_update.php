<?php
include("./connection.php");

$courseData = array(
    "course_id" => "",
    "board" => "",
    "grade" => "",
    "program" => "",
    "duration" => "",
    "course_type" => ""
);

if (isset($_GET["id"])) {
    $courseId = $_GET["id"];

    $query = "SELECT * FROM courses WHERE course_id = $courseId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $courseData = mysqli_fetch_assoc($result);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "No course ID provided in the URL.";
}

include("./header.php");
?>

<main id="main" class="main">
    <div class="container">
        <h2>Edit <?php echo ucfirst($courseData['course_type']); ?> Course</h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="course_id" value="<?php echo $courseData['course_id']; ?>">
            <input type="hidden" name="course_type" value="<?php echo $courseData['course_type']; ?>">
            <div class="form-group">
                <label for="board">Board</label>
                <select class="form-control" id="board" name="board">
                    <option value="cbse" <?php echo ($courseData['board'] == 'cbse') ? 'selected' : ''; ?>>CBSE</option>
                    <option value="icse" <?php echo ($courseData['board'] == 'icse') ? 'selected' : ''; ?>>ICSE</option>
                </select>
            </div>
            <div class="form-group">
                <label for="grade">Grade</label>
                <select class="form-control" id="grade" name="grade">
                    <option value="8th" <?php echo ($courseData['grade'] == '8th') ? 'selected' : ''; ?>>8th</option>
                    <option value="9th" <?php echo ($courseData['grade'] == '9th') ? 'selected' : ''; ?>>9th</option>
                    <option value="10th" <?php echo ($courseData['grade'] == '10th') ? 'selected' : ''; ?>>10th</option>
                    <option value="11th" <?php echo ($courseData['grade'] == '11th') ? 'selected' : ''; ?>>11th</option>
                    <option value="12th" <?php echo ($courseData['grade'] == '12th') ? 'selected' : ''; ?>>12th</option>
                </select>
            </div>
            <div class="form-group">
                <label for="program">Program</label>
                <input type="text" class="form-control" id="program" name="program" value="<?php echo $courseData['program']; ?>">
            </div>
            <div class="form-group">
                <label for="duration">Duration</label>
                <input type="text" class="form-control" id="duration" name="duration" value="<?php echo $courseData['duration']; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update Course</button>
        </form>
    </div>
</main>

<?php
include("./footer.php");

if(isset($_POST['submit'])){
    $course_id = $_POST['course_id'];
    $board = $_POST['board'];
    $grade = $_POST['grade'];
    $program = $_POST['program'];
    $duration = $_POST['duration'];
    $course_type = $_POST['course_type'];

    $query = "UPDATE courses SET board=?, grade=?, program=?, duration=? WHERE course_id=?";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "ssssi", $board, $grade, $program, $duration, $course_id);

    if (mysqli_stmt_execute($stmt)) {
        // Redirect based on the course type
        if ($course_type === 'regular') {
            ?>
            <script>window.location.href='ex_regular_course.php'</script>
            <?php
        } elseif ($course_type === 'shortterm') {
            ?>
            <script>window.location.href='explore-shortterm_course.php'</script>
            <?php
          
        } elseif ($course_type === 'crash course') {
            ?>
            <script>window.location.href='explore_crashcourse.php'</script>
            <?php
          
        } else {
            // Handle unknown course type
            echo "Unknown course type";
        }
        exit();
    } else {
        echo "Error updating data: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Cache the board and grade select elements
    var $boardSelect = $('#board');
    var $gradeSelect = $('#grade');

    function updateGradeOptions() {
        var selectedBoard = $boardSelect.val();
        $gradeSelect.find('option').hide();

        if (selectedBoard === 'cbse') {
            $gradeSelect.find('option[value="8th"]').show();
            $gradeSelect.find('option[value="9th"]').show();
            $gradeSelect.find('option[value="10th"]').show();
            $gradeSelect.find('option[value="11th"]').show();
            $gradeSelect.find('option[value="12th"]').show();
        } else if (selectedBoard === 'icse') {
            $gradeSelect.find('option[value="8th"]').show();
            $gradeSelect.find('option[value="9th"]').show();
            $gradeSelect.find('option[value="10th"]').show();
            // default value set for icse
            $gradeSelect.val("8th");
        }
    }

    updateGradeOptions();

    $boardSelect.on('change', function() {
        updateGradeOptions();
    });
});
</script>
