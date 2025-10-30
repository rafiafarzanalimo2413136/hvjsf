<?php
// ===============================================
// 5cs045-task1-2412988.php
// Student: Rafia Farzana Limo (ID: 2413136)
// ===============================================

// Database connection
$mysqli = new mysqli("localhost", "2413136", "Jahanara50@7890", "db2413136");

if ($mysqli->connect_errno) {
    echo "<h2>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "</h2>";
    exit();
}

// Determine what to show based on URL parameters
$page = 'list'; // default page
if (isset($_GET['id'])) {
    $page = 'details';
}
if (isset($_POST['keywords'])) {
    $page = 'search';
}

// ===============================================
// MOVIE DETAILS PAGE
// ===============================================
if ($page === 'details') {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM movies WHERE movie_id = {$id}";
    $result = mysqli_query($mysqli, $sql);
    $movie = mysqli_fetch_assoc($result);
    ?>
    <!doctype html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <title>Movie Details - <?= htmlspecialchars($movie['title']) ?></title>
      </head>
      <body>
        <h1><?= htmlspecialchars($movie['title']) ?></h1>
        <p><strong>Description:</strong> <?= nl2br(htmlspecialchars($movie['description'])) ?></p>
        <p><strong>Release Date:</strong> <?= htmlspecialchars($movie['release_date']) ?></p>
        <p><strong>Rating:</strong> <?= htmlspecialchars($movie['rating']) ?></p>
        <p><a href="5cs045-task1-2412988.php">&lt;&lt; Back to list</a></p>
      </body>
    </html>
    <?php
    exit();
}

// ===============================================
// SEARCH RESULTS PAGE
// ===============================================
if ($page === 'search') {
    $keywords = $mysqli->real_escape_string($_POST['keywords']);
    $sql = "SELECT * FROM movies WHERE title LIKE '%{$keywords}%' ORDER BY release_date";
    $results = mysqli_query($mysqli, $sql);
    ?>
    <!doctype html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <title>Search Results</title>
      </head>
      <body>
        <h1>Search Results for "<?= htmlspecialchars($keywords) ?>"</h1>

        <form action="5cs045-task1-2412988.php" method="post">
          <input type="text" name="keywords" placeholder="Search movies..." />
          <input type="submit" value="Go!" />
        </form>

        <table border="1" cellpadding="6">
          <tr><th>Title</th><th>Rating</th></tr>
          <?php while ($row = mysqli_fetch_assoc($results)): ?>
            <tr>
              <td><a href="5cs045-task1-2412988.php?id=<?= $row['movie_id'] ?>"><?= htmlspecialchars($row['title']) ?></a></td>
              <td><?= htmlspecialchars($row['rating']) ?></td>
            </tr>
          <?php endwhile; ?>
        </table>

        <p><a href="5cs045-task1-2412988.php">&lt;&lt; Back to full list</a></p>
      </body>
    </html>
    <?php
    exit();
}

// ===============================================
// MOVIE LIST PAGE (default)
// ===============================================
$sql = "SELECT * FROM movies ORDER BY release_date";
$results = mysqli_query($mysqli, $sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>List of Movies - Rafia Farzana Limo (2413136)</title>
  </head>
  <body>
    <h1>List of All My Movies</h1>

    <form action="5cs045-task1-2412988.php" method="post">
      <input type="text" name="keywords" placeholder="Search movies..." />
      <input type="submit" value="Go!" />
    </form>

    <table border="1" cellpadding="6">
      <tr><th>Title</th><th>Rating</th></tr>
      <?php while ($row = mysqli_fetch_assoc($results)): ?>
        <tr>
          <td><a href="5cs045-task1-2412988.php?id=<?= $row['movie_id'] ?>"><?= htmlspecialchars($row['title']) ?></a></td>
          <td><?= htmlspecialchars($row['rating']) ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  </body>
</html>
