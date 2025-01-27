<?php  
session_start();
include('./admin/connection.php');
$data = [];
$sql = "SELECT * FROM lessons";
$res = $con->query($sql);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $data[] = $row;
    }
}
?>

<?php require_once 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Lessons</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
        }

        .search-bar-container {
            width: 100%;
            display: flex;
            justify-content: center;
            margin: 40px 0;
        }

        .search-bar {
            width: 60%;
            position: relative;
        }

        .search-bar input {
            width: 100%;
            padding: 12px 20px;
            border-radius: 50px;
            border: 1px solid black;
            border-color: #007bff;
            font-size: 16px;
            background-color: #fff;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2);
            color: #333;
        }
        .search-bar input:hover{
            border-color: #007bff;
        }

        .search-bar input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2);
        }

        .search-bar input::placeholder {
            color: #aaa;
        }

        .suggestions {
            position: absolute;
            background-color: #fff;
            border-radius: 10px;
            width: 100%;
            z-index: 1000;
            max-height: 200px;
            overflow-y: auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 8px;
            border: 1px solid #ddd;
        }

        .suggestion-item {
            padding: 12px;
            cursor: pointer;
            color: #333;
            transition: background-color 0.3s ease;
        }

        .suggestion-item:hover {
            background-color: #f1f1f1;
            border-radius: 10px;
        }

        .suggestion-item:last-child {
            border-bottom: none;
        }

        .lesson-header h1 {
            text-align: center;
            color: #333;
            font-size: 2rem;
            text-transform: uppercase;
            margin-bottom: 1.5rem;
            font-weight: bold;
        }

        .row {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 25px;
            margin: 12px auto;
            max-width: 92%;
            width: 100%;
        }

        .quotecard {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-align: left;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            gap: 30px;
        }
        .quotecard:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }
    
        .lesson-header h1 {
            font-size: 1.8rem;
            color: black;
            text-align: center;
        }

        .quotecard img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 20px;
        }
        .quotecard-body{
            color: #007bff;
        
        }
        h1 .fa-om {
            color: #ff5722;
            margin: 0 10px;
        }
    </style>
</head>

<body>
<section class="lesson-header">
    <h1><b><i class="fa-solid fa-om"></i> Seeds of Knowledge From Holy Books <i class="fa-solid fa-om"></i></b></h1>
    <div class="search-bar-container">
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search for lessons..." autocomplete="off">
            <div class="suggestions" id="suggestions"></div>
        </div>
    </div>
    <div class="row" id="lessonsContainer">
        <?php foreach ($data as $row): ?>
            <div class="quotecard" data-source="<?php echo $row['source']; ?>">
                <img src="images/black-1.webp" alt="Avatar">"<?php echo $row["quote"]; ?>"
                <div class="quotecard-body">
                    <p>- <?php echo $row["source"]; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php require_once 'footer.php'; ?>

<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    const searchInput = document.getElementById('searchInput');
    const suggestions = document.getElementById('suggestions');
    const lessonsContainer = document.getElementById('lessonsContainer');

    // Trigger to show all sources when the search bar is clicked
    searchInput.addEventListener('focus', () => {
        fetchSuggestions('');  // Empty query to show all sources
    });

    // Trigger to filter suggestions as you type
    searchInput.addEventListener('input', () => {
        const query = searchInput.value.trim();
        fetchSuggestions(query);
    });

    // Trigger to reset and show all lessons when input is cleared
    searchInput.addEventListener('input', () => {
        const query = searchInput.value.trim();
        if (query === '') {
            // Reset the lesson visibility when input is empty
            filterLessonsBySource('');
            suggestions.innerHTML = '';  // Clear the suggestions
        }
    });

    function fetchSuggestions(query) {
        fetch(`fetch_suggestions.php?query=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                suggestions.innerHTML = data.map(item => `
                    <div class="suggestion-item" onclick="selectSuggestion('${item.source}')">
                        ${item.source}
                    </div>
                `).join('');
            });
    }

    function selectSuggestion(source) {
        searchInput.value = source;
        filterLessonsBySource(source);
        suggestions.innerHTML = '';
    }

    function filterLessonsBySource(source) {
        const lessons = lessonsContainer.querySelectorAll('.quotecard');
        lessons.forEach(lesson => {
            if (lesson.getAttribute('data-source') === source || source === '') {
                lesson.style.display = 'flex';  // Show the lesson
            } else {
                lesson.style.display = 'none';  // Hide the lesson
            }
        });
    }
</script>
</body>

</html>
